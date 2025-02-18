# AI Animation Generator

## 1. 项目说明

### 开发目的
基于Replicate的Stable Video Diffusion模型，开发一个将静态图片转换为视频动画的Web应用。用户通过简单的界面上传图片并描述动画效果，即可获得AI生成的视频动画。

### 当前实现
- 基于Vue3的前端上传界面
- 基于Flask的后端文件处理服务
- Replicate API集成（未完成-付费限制）

## 2. 具体功能实现

### 前端实现 (`frontend/src/App.vue`)
```vue
- 文件上传组件
  - 拖拽上传区域
  - 文件类型验证 (.jpg, .png, .gif)
  - 文件大小限制 (16MB)
  - 实时预览功能
- 动画描述输入
  - 文本输入框
  - 字数限制提示
- 状态反馈
  - 上传进度提示
  - 错误消息显示
```

### 后端实现 (`backend/server.py`)
```python
- Flask RESTful API
  - /api/health：健康检查
  - /api/generate：文件处理
- 文件处理系统
  - 自动创建上传目录
  - 安全的文件名处理
  - 文件类型验证
  - 自动清理机制
- 日志系统
  - 详细的操作记录
  - 错误追踪
```

## 3. 技术栈

### 前端
- Vue.js 3.0
  - Composition API
  - `ref`, `reactive` 状态管理
- Vite 构建工具
- TailwindCSS 样式框架
- Axios HTTP客户端

### 后端
- Python 3.7+
- Flask Web框架
- Flask-CORS 跨域支持
- Werkzeug 工具库

## 4. 安装说明

### 系统要求
- macOS 10.13.6 (已验证)
- Node.js 16+
- Python 3.7+
- npm/yarn
- pip/conda

### 后端设置
```bash
cd backend
python -m venv venv
source venv/bin/activate  # Windows使用 venv\Scripts\activate

pip install flask
pip install flask-cors
pip install python-dotenv
pip install requests
```

### 前端设置
```bash
cd frontend
npm install
```

## 5. 配置说明

### 后端配置 (.env)
```env
REPLICATE_API_TOKEN=your_token_here
FLASK_ENV=development
MAX_CONTENT_LENGTH=16777216
UPLOAD_FOLDER=uploads
```

### 前端配置 (config.js)
```javascript
{
  apiBaseUrl: 'http://localhost:5000',  // 后端API地址
  maxFileSize: 16 * 1024 * 1024,
  allowedTypes: ['image/jpeg', 'image/png', 'image/gif']
}
```

### 端口配置 (vite.config.js)
```javascript
{
  server: {
    port: 8000  // 前端服务器端口
  }
}
```

## 6. 使用方法

### 启动服务
```bash
# 后端启动
cd backend
python server.py  # 运行在 5000 端口

# 前端启动
cd frontend
npm run dev      # 运行在 8000 端口
```

### 基本操作流程
1. 访问 http://localhost:8000
2. 拖拽或点击上传图片
3. 输入期望的动画效果描述
4. 点击"生成"按钮
5. 等待处理结果

## 7. 重要注意事项

### 已知问题
1. Replicate API 需要付费订阅，当前无法使用
2. 仅支持特定图片格式（JPG/PNG/GIF）
3. 文件大小限制为16MB

### 安全考虑
- 上传文件会在处理后自动删除
- 实施了文件类型验证
- 实现了文件大小限制

## 8. 开发计划

### 近期待解决
1. 寻找替代的视频生成服务
2. 优化文件处理逻辑
3. 添加进度提示功能
4. 完善错误处理机制

### 后续规划
1. 添加视频预览功能
2. 实现结果下载功能
3. 添加历史记录功能
4. 优化用户界面交互

## 9. 版本记录

### [0.1.0] - 2025-02-18 01:49:27
- 完成基础前端界面
- 实现后端文件处理
- 集成 Replicate API（待解决付费问题）

## 项目信息
- 开发者: DreamersStudio
- 开始时间: 2025-02-18
- 许可证: MIT

## 问题反馈
如发现问题请提交Issue至项目仓库