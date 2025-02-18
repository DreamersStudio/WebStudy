function PreviewArea({ animation, loading }) {
    const containerRef = React.useRef(null);
    const [animInstance, setAnimInstance] = React.useState(null);

    React.useEffect(() => {
        if (animation && !loading) {
            if (animInstance) {
                animInstance.destroy();
            }

            const animData = PRESET_ANIMATIONS[animation.style] || PRESET_ANIMATIONS.cartoon;
            
            const modifiedAnimData = {
                ...animData,
                fr: Math.floor(30 / animation.duration * 5),
                op: Math.floor(animation.duration * 30)
            };

            const anim = lottie.loadAnimation({
                container: document.getElementById('animation-container'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                animationData: modifiedAnimData
            });

            setAnimInstance(anim);
        }

        return () => {
            if (animInstance) {
                animInstance.destroy();
            }
        };
    }, [animation, loading]);

    return (
        <div className="preview-area">
            {loading ? (
                <CircularProgress />
            ) : animation ? (
                <div id="animation-container" ref={containerRef}></div>
            ) : (
                <Typography color="textSecondary">
                    在这里预览生成的动画
                </Typography>
            )}
        </div>
    );
}
