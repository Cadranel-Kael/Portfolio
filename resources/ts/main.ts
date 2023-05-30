import {MouseCanvas} from "./MouseCanvas";

function main() {
    const canvas = new MouseCanvas(
        document.getElementById('mouse-canvas') as HTMLCanvasElement,
        {width: innerWidth, height: innerHeight
    });

}

main();