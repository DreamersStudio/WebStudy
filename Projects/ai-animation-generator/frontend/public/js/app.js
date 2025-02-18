function App() {
    const [animation, setAnimation] = React.useState(null);
    const [loading, setLoading] = React.useState(false);
    const [error, setError] = React.useState(null);
    const [snackbar, setSnackbar] = React.useState({ 
        open: false, 
        message: '', 
        severity: 'info' 
    });

    const handleSubmit = async (formData) => {
        setLoading(true);
        setError(null);
        
        try {
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            setAnimation({
                ...formData,
                id: Date.now()
            });
            
            setSnackbar({
                open: true,
                message: '动画生成成功！',
                severity: 'success'
            });
        } catch (error) {
            console.error('生成动画失败:', error);
            setError('生成动画时发生错误，请重试');
            setSnackbar({
                open: true,
                message: '生成动画失败，请重试',
                severity: 'error'
            });
        } finally {
            setLoading(false);
        }
    };

    const handleExport = () => {
        if (!animation) return;

        const animData = PRESET_ANIMATIONS[animation.style];
        const blob = new Blob(
            [JSON.stringify(animData, null, 2)],
            { type: 'application/json' }
        );
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `animation-${animation.id}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    };

    return (
        <Container className="container">
            <Paper style={{ padding: '20px' }}>
                <Typography variant="h4" gutterBottom>
                    AI 动画生成器
                </Typography>
                
                {error && (
                    <Typography color="error" gutterBottom>
                        {error}
                    </Typography>
                )}
                
                <AnimationForm onSubmit={handleSubmit} />
                <PreviewArea animation={animation} loading={loading} />
                
                {animation && (
                    <div className="button-group">
                        <Button
                            variant="contained"
                            color="primary"
                            onClick={handleExport}
                        >
                            导出动画
                        </Button>
                    </div>
                )}
            </Paper>

            <Snackbar
                open={snackbar.open}
                autoHideDuration={6000}
                onClose={() => setSnackbar(prev => ({ ...prev, open: false }))}
            >
                <Alert severity={snackbar.severity}>
                    {snackbar.message}
                </Alert>
            </Snackbar>
        </Container>
    );
}

// 启动应用
ReactDOM.render(
    <App />,
    document.getElementById('root')
);
