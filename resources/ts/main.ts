import {MouseCanvas} from "./MouseCanvas";
import {settings} from "./settings";
import {addParallax, connectField, dropDown, expandTextArea} from "./functions";
import {Star} from "./star";
import {Canvas} from "./canvas-framework/Canvas";
import {contactForm} from "./contact-form";

function main() {
    document.body.classList.add('js');

    const canvas = new MouseCanvas(
        document.getElementById('mouse-canvas') as HTMLCanvasElement
    );


    Object.values(settings.field.selectors).forEach((selector) => {
        const field = document.querySelector(selector[0]);
        const input = document.querySelector(selector[1]) as HTMLInputElement;
        connectField(field, input);
    })

    const faqs = {
        questions: [document.querySelectorAll(`.drop-down--${settings.dropDown.faq[0]}`)],
        answers: [document.querySelectorAll(`.drop-down--${settings.dropDown.faq[1]}`)],
        buttons: [document.querySelectorAll(`.drop-down--${settings.dropDown.faq[2]}`)],
    }

    expandTextArea(document.getElementById('message') as HTMLTextAreaElement);

    faqs.questions[0].forEach((v, index) => {
        `§`
        dropDown([faqs.questions[0][index], faqs.buttons[0][index], faqs.answers[0][index]], faqs.answers[0][index])
    })

    addParallax(document.querySelector(settings.planet.planet), -0.4, 50);

    const bgCanvas = new Canvas(document.querySelector('#canvas-bg'));

    // addParallax(document.querySelector('#canvas-bg'), 1);
    //
    // for (let i = 0; i < window.innerHeight/50; i++) {
    //     const star = new Star(bgCanvas, 'white');
    //     star.draw();
    // }

    contactForm();

}

main();