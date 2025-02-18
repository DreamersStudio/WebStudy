from flask import Flask, request, jsonify
from flask_cors import CORS
import os
import replicate
import requests
from werkzeug.utils import secure_filename
import logging
import sys
from datetime import datetime

app = Flask(__name__)
CORS(app)

logging.basicConfig(
    level=logging.DEBUG,
    format='%(asctime)s [%(levelname)s] %(message)s',
    stream=sys.stdout
)

UPLOAD_FOLDER = 'uploads'
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}

# 正确的模型版本ID
MODEL_VERSION = "3f0457e4619daac51203dedb472816fd4af51f3149fa7a9e0b5ffcf1b8172438"

if not os.path.exists(UPLOAD_FOLDER):
    os.makedirs(UPLOAD_FOLDER)
    app.logger.info(f"Created upload directory: {UPLOAD_FOLDER}")

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024

def allowed_file(filename):
    return filename.lower().endswith(tuple('.' + ext for ext in ALLOWED_EXTENSIONS))

@app.route('/api/generate', methods=['POST'])
def generate_animation():
    app.logger.info('Received generate request')
    
    if 'REPLICATE_API_TOKEN' not in os.environ:
        app.logger.error('REPLICATE_API_TOKEN not set in environment')
        return jsonify({'error': 'API token not configured'}), 500
    
    if 'image' not in request.files:
        app.logger.error('No image file in request')
        return jsonify({'error': 'No image file provided'}), 400
    
    file = request.files['image']
    app.logger.debug(f'Received file: {file.filename}')
    app.logger.debug(f'File content type: {file.content_type}')
    
    if not file.content_type.startswith('image/'):
        app.logger.error(f'Invalid content type: {file.content_type}')
        return jsonify({'error': 'Invalid file type'}), 400

    timestamp = datetime.now().strftime('%Y%m%d_%H%M%S')
    ext = file.content_type.split('/')[-1]
    if ext == 'jpeg':
        ext = 'jpg'
    filename = f'upload_{timestamp}.{ext}'
    
    description = request.form.get('description', '')
    if not description:
        app.logger.error('No description provided')
        return jsonify({'error': 'No description provided'}), 400
    
    app.logger.debug(f'Description: {description}')

    try:
        filepath = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(filepath)
        app.logger.info(f'File saved successfully: {filepath}')

        app.logger.info('Starting Replicate prediction...')
        
        # 使用正确的参数调用 Replicate API
        output = replicate.run(
            f"stability-ai/stable-video-diffusion:{MODEL_VERSION}",
            input={
                "input_image": open(filepath, "rb"),
                "video_length": "14_frames_with_svd",
                "sizing_strategy": "maintain_aspect_ratio",
                "motion_bucket_id": 127,
                "frames_per_second": 6,
                "cond_aug": 0.02,
                "decoding_t": 14
            }
        )
        
        app.logger.info(f'Prediction result: {output}')
        
        # 确保输出是字符串（URL）
        if isinstance(output, list):
            output = output[0]
        
        return jsonify({
            'status': 'success',
            'video_url': output
        })

    except Exception as e:
        app.logger.error(f'Error during processing: {str(e)}')
        return jsonify({'error': str(e)}), 500

    finally:
        # 清理上传的文件
        if os.path.exists(filepath):
            os.remove(filepath)
            app.logger.debug(f'Cleaned up file: {filepath}')

@app.route('/api/health', methods=['GET'])
def health_check():
    token_status = 'REPLICATE_API_TOKEN is set' if 'REPLICATE_API_TOKEN' in os.environ else 'REPLICATE_API_TOKEN is not set'
    upload_dir_status = 'uploads directory exists' if os.path.exists(UPLOAD_FOLDER) else 'uploads directory does not exist'
    return jsonify({
        'status': 'healthy',
        'environment': {
            'token_status': token_status,
            'upload_dir_status': upload_dir_status,
            'version': MODEL_VERSION  # 添加版本信息到健康检查
        }
    })

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
