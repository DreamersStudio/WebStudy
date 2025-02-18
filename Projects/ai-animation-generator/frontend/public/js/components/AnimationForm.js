function AnimationForm({ onSubmit }) {
    const [formData, setFormData] = React.useState({
        description: '',
        style: 'cartoon',
        duration: 5,
        complexity: 50
    });

    const handleChange = (event) => {
        const { name, value } = event.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(formData);
    };

    return (
        <form onSubmit={handleSubmit}>
            <FormControl className="form-control">
                <TextField
                    label="动画描述"
                    name="description"
                    multiline
                    rows={4}
                    value={formData.description}
                    onChange={handleChange}
                    variant="outlined"
                    required
                    fullWidth
                />
            </FormControl>

            <FormControl className="form-control" variant="outlined" fullWidth>
                <InputLabel>动画风格</InputLabel>
                <Select
                    name="style"
                    value={formData.style}
                    onChange={handleChange}
                    label="动画风格"
                >
                    <MenuItem value="cartoon">卡通风格</MenuItem>
                    <MenuItem value="realistic">写实风格</MenuItem>
                    <MenuItem value="anime">动漫风格</MenuItem>
                    <MenuItem value="abstract">抽象风格</MenuItem>
                </Select>
            </FormControl>

            <Box mb={3}>
                <Typography gutterBottom>
                    动画时长: {formData.duration} 秒
                </Typography>
                <Slider
                    name="duration"
                    value={formData.duration}
                    onChange={(_, value) => handleChange({ target: { name: 'duration', value }})}
                    min={1}
                    max={30}
                    valueLabelDisplay="auto"
                />
            </Box>

            <Box mb={3}>
                <Typography gutterBottom>
                    复杂度: {formData.complexity}%
                </Typography>
                <Slider
                    name="complexity"
                    value={formData.complexity}
                    onChange={(_, value) => handleChange({ target: { name: 'complexity', value }})}
                    valueLabelDisplay="auto"
                />
            </Box>

            <Button
                type="submit"
                variant="contained"
                color="primary"
                size="large"
                fullWidth
            >
                生成动画
            </Button>
        </form>
    );
}
