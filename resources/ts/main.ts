import {MouseCanvas} from "./MouseCanvas";
import {settings} from "./settings";
import {connectField, dropDown, expandTextArea} from "./field";

function main() {
    document.body.classList.add('js');

    const canvas = new MouseCanvas(
        document.getElementById('mouse-canvas') as HTMLCanvasElement
    );

    settings.field.selectors.forEach((selector) => {
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

    faqs.questions[0].forEach((v, index)=> {`§`
        dropDown([faqs.questions[0][index], faqs.buttons[0][index], faqs.answers[0][index]], faqs.answers[0][index])
    })
}

main();