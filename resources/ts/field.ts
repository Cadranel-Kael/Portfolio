import {settings} from "./settings";

export function connectField(field: Element, input: HTMLInputElement) {
    field.addEventListener('click', () => {
        input.focus();
    })
}

export function expandTextArea(textArea: HTMLTextAreaElement) {
    textArea.addEventListener('input', () => {
        textArea.style.height = Math.min(textArea.scrollHeight, settings.field.textArea.maxHeight) + "px";
    })
    // textArea.addEventListener('focus', () => {
    //     textArea.rows = 4;
    // })
    // textArea.addEventListener('focusout', () => {
    //     if (textArea.value.length >= 30) {
    //         textArea.rows = 4;
    //     } else {
    //         textArea.rows = 1;
    //     }
    // })
}


// @ts-ignore
export function dropDown(clickables, content) {
    console.log(clickables)
    // @ts-ignore
    clickables.forEach((clickable) => {
        clickable.addEventListener('click', () => {

            if (!clickable.classList.contains('opened')) {
                clickable.classList.add('opened');
                content.classList.add('opened');
                content.classList.remove('js--sr-only');
                content.ariaExpanded = "true";
            } else {
                clickable.classList.remove('opened');
                content.classList.remove('opened');
                content.classList.add('js--sr-only');
                content.ariaExpanded = "false";
            }
        })

    })
}