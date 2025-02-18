// ... (保持之前的所有导入和样式不变)

function LoadingOverlay({ message }) {
    return (
        <div className="loading-overlay">
            <div className="loading-content">
                <CircularProgress />
                <Typography style={{ marginTop: '10px' }}>
                    {message || '正在生成动画...'}
                </Typography>
            </div>
        </div>
    );
}

// ... (保持之前的 PreviewArea 组件代码不变)

function App() {
    const classes = useStyles();
    const [animation, setAnimation] = React.useState(null);
    const [loading, setLoading] = React.useState(false);
    const [error, setError] = React.useState(null);

    const handleGenerate = async (formData) => {
        setLoading(true);
        setError(null);
        
        try {
            // 模拟API调用
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            setAnimation({
                ...formData,
                id: Date.now()
            });
        } catch (error) {
            console.error('生成动画失败:', error);
            setError('生成动画时发生错误，请重试');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div>
            {loading && <LoadingOverlay />}
            
            <AppBar position="fixed">
                <Toolbar>
                    <Typography variant="h6" className={classes.title}>
                        AI 动画生成器
                    </Typography>
                </Toolbar>
            </AppBar>
            
            <Container className={classes.root}>
                <Grid container spacing={3}>
                    <Grid item xs={12}>
                        <Paper className={classes.paper}>
                            <Typography variant="h4" gutterBottom>
                                创建你的 AI 动画
                            </Typography>
                            
                            {error && (
                                <Typography color="error" gutterBottom>
                                    {error}
                                </Typography>
                            )}
                            
                            <AnimationForm onGenerate={handleGenerate} />
                            <PreviewArea animation={animation} />
                        </Paper>
                    </Grid>
                </Grid>
            </Container>
        </div>
    );
}

// ... (保持其他组件代码不变)

ReactDOM.render(
    <App />,
    document.getElementById('root')
);
