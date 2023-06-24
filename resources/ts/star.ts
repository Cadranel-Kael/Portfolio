import {Shape} from "./canvas-framework/Shapes/Shape";
import {Canvas} from "./canvas-framework/Canvas";
import {Rgb} from "./canvas-framework/Colors/Rgb";
import {Hsl} from "./canvas-framework/Colors/Hsl";
import {Random} from "./canvas-framework/Helpers/Random";

export class Star extends Shape {
    private side: number;

    constructor(canvas: Canvas, color: Rgb | Hsl | string) {
        super({
            canvas: canvas,
            color: color,
            position: {
                x: 0,
                y: 0
            }
        });
        this.position.x = new Random(0, innerWidth).nextInt();
        this.position.y = new Random(0, innerHeight).nextInt();

        this.side = new Random(10, 100).nextInt();
    }

    draw() {
        this.ctx.beginPath();
        this.ctx.fillStyle = `${this.color}`;
        this.ctx.moveTo(this.position.x, this.position.y + this.side*0.5)
        this.ctx.lineTo(this.position.x + this.side*0.36, this.position.y + this.side*0.36);
        this.ctx.lineTo(this.position.x + this.side*0.5, this.position.y);
        this.ctx.lineTo(this.position.x + this.side*0.64, this.position.y + this.side*0.36);
        this.ctx.lineTo(this.position.x + this.side, this.position.y + this.side*0.5);
        this.ctx.lineTo(this.position.x + this.side*0.64, this.position.y + this.side*0.64);
        this.ctx.lineTo(this.position.x + this.side*0.5, this.position.y + this.side);
        this.ctx.lineTo(this.position.x + this.side*0.5, this.position.y + this.side);
        this.ctx.lineTo(this.position.x + this.side*0.36, this.position.y + this.side*0.64);
        this.ctx.closePath();
        this.ctx.fill();
    }
}