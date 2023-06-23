import {Canvas} from "./canvas-framework/Canvas";
import {Dimension} from "./canvas-framework/Types/Dimension";
import {Circle} from "./canvas-framework/Shapes/Circle";
import {Animate} from "./canvas-framework/Animate";
import {Animatable} from "./canvas-framework/Types/Animatable";
import {settings} from "./settings";

export class MouseCanvas extends Canvas implements Animatable {
    private animation: Animate;
    private circles: Circle[];
    private mouseX: number;
    private mouseY: number;

    constructor(canvasElement: HTMLCanvasElement, dimension?: Dimension) {
        super(canvasElement, dimension);
        this.circles = [];
        this.mouseY = 0;
        this.mouseX = 0;
        for (let i = 0; i < settings.mouse.numberOfTrail; i++) {
            this.createCircles(i)
        }
        this.animation = new Animate({start: true});
        this.animation.registerForAnimation(this);
        this.addEventListeners();
        this.animation.start();
    }

    draw(): void {
        this.circles.forEach((circle) => {
            circle.draw();
        });
    }

    update(): void {
        this.circles[0].position.x = this.mouseX;
        this.circles[0].position.y = this.mouseY;
        let x = this.mouseX;
        let y = this.mouseY;
        this.circles.forEach((circle, index) => {
            if (index !== 0) {
                circle.position.x = x;
                circle.position.y = y;
                const nextCircle = this.circles[index + 1] || this.circles[0];
                x += (nextCircle.position.x - this.mouseX) * settings.mouse.length;
                y += (nextCircle.position.y - this.mouseY) * settings.mouse.length;
            }
        })
    }

    createCircles(index: number) {
        this.circles.push(new Circle({
            canvas: this,
            color: 'white',
            direction: 0,
            position: {x: this.mouseX, y: this.mouseY},
            radius: (settings.mouse.numberOfTrail - index) * settings.mouse.size / settings.mouse.numberOfTrail,
        }))
    }

    addEventListeners() {
        window.addEventListener('mousemove', (e) => {
            this.mouseX = e.x;
            this.mouseY = e.y;
        })
        window.addEventListener('mouseleave', (e) => {
            this.mouseX = e.x;
            this.mouseY = e.y;
        })
        this.refreshClickables();
    }

    refreshClickables() {
        for (const clickable of settings.mouse.clickables) {
            document.querySelectorAll(clickable).forEach((element) => {
                element.addEventListener('mouseenter', () => {
                    this.resizeCircles(settings.mouse.resize);
                })
                element.addEventListener('mouseleave', () => {
                    this.resizeCircles(1 / settings.mouse.resize);
                })
            })
        }
    }

    resetRadius() {
        this.circles.forEach((circle, index) => {
            circle.radius = (settings.mouse.numberOfTrail - index) * settings.mouse.size / settings.mouse.numberOfTrail;
        })
    }

    resizeCircles(number: number) {
        this.circles.forEach((circle) => {
            circle.radius *= number;
        })
    }
}