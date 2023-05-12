import {Dimension} from "../Types/Dimension";

export class Canvas {
    private height: number;
    private width: number;
    public canvasElement: HTMLCanvasElement;
    public readonly ctx: CanvasRenderingContext2D;
    private readonly autoDimension: boolean;

    constructor(canvasElement: HTMLCanvasElement, dimension?: Dimension) {
        this.canvasElement = canvasElement;
        if (dimension !== undefined) {
            this.height = dimension.height;
            this.width = dimension.width;
            this.autoDimension = false;
        } else {
            this.autoDimension = true;
            this.width = innerWidth;
            this.height = window.innerHeight;
        }

        this.ctx = this.canvasElement.getContext('2d') as CanvasRenderingContext2D;

        if (this.autoDimension) {
            window.addEventListener('resize', () => {
                if (this.autoDimension) {
                    this.width = innerWidth;
                    this.height = innerHeight;
                }
            })
        }
    }

}