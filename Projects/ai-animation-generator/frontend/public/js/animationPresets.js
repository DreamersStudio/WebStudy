const PRESET_ANIMATIONS = {
    cartoon: {
        v: "5.7.4",
        fr: 30,
        ip: 0,
        op: 60,
        w: 300,
        h: 300,
        layers: [{
            ddd: 0,
            ind: 1,
            ty: 4,
            nm: "Shape Layer",
            sr: 1,
            ks: {
                o: { a: 0, k: 100 },
                p: {
                    a: 1,
                    k: [
                        { t: 0, s: [150, 150], e: [150, 50], i: { x: 0.5, y: 0 }, o: { x: 0.5, y: 1 } },
                        { t: 30, s: [150, 50], e: [150, 150], i: { x: 0.5, y: 0 }, o: { x: 0.5, y: 1 } },
                        { t: 60 }
                    ]
                },
                a: { a: 0, k: [0, 0, 0] },
                s: { a: 0, k: [100, 100, 100] }
            },
            shapes: [{
                ty: "rc",
                d: 1,
                s: { a: 0, k: [50, 50] },
                p: { a: 0, k: [0, 0] },
                r: { a: 0, k: 0 },
                nm: "Rectangle",
                c: { a: 0, k: [1, 0, 0, 1] }
            }]
        }]
    }
};

// 基于 cartoon 创建其他样式
PRESET_ANIMATIONS.realistic = {
    ...PRESET_ANIMATIONS.cartoon,
    layers: [{
        ...PRESET_ANIMATIONS.cartoon.layers[0],
        shapes: [{
            ...PRESET_ANIMATIONS.cartoon.layers[0].shapes[0],
            c: { a: 0, k: [0, 0, 1, 1] }
        }]
    }]
};

PRESET_ANIMATIONS.anime = {
    ...PRESET_ANIMATIONS.cartoon,
    layers: [{
        ...PRESET_ANIMATIONS.cartoon.layers[0],
        shapes: [{
            ...PRESET_ANIMATIONS.cartoon.layers[0].shapes[0],
            c: { a: 0, k: [1, 0.8, 0.9, 1] }
        }]
    }]
};

PRESET_ANIMATIONS.abstract = {
    ...PRESET_ANIMATIONS.cartoon,
    layers: [{
        ...PRESET_ANIMATIONS.cartoon.layers[0],
        shapes: [{
            ...PRESET_ANIMATIONS.cartoon.layers[0].shapes[0],
            c: { a: 0, k: [0.5, 0, 1, 1] }
        }]
    }]
};
