import {settings} from "./settings";

export function connectField(field: Element, input: HTMLInputElement) {
    field.addEventListener('click', () => {
        input.focus();
    })
}

export function expandTextArea(textArea: HTMLTextAreaElement) {
    textArea.addEventListener('input', () => {
        textArea.style.height = "";
        textArea.style.height = Math.min(textArea.scrollHeight, settings.field.textArea.maxHeight) + "px";
    });
}


// @ts-ignore
export function dropDown(clickables, content, button) {
    // @ts-ignore
    clickables.forEach((clickable) => {
        clickable.addEventListener('click', () => {
            if (!clickable.classList.contains('opened')) {
                clickable.classList.add('opened');
                content.classList.add('opened');
                button.classList.add('opened');
                content.style.display = "block";
                // content.classList.remove('js--sr-only');
                content.ariaExpanded = "true";
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
                if (content.style.margin) {
                    content.style.margin = null;
                }
            } else {
                clickable.classList.remove('opened');
                content.classList.remove('opened');
                button.classList.remove('opened');
                // content.classList.add('js--sr-only');
                content.ariaExpanded = "false";
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                }
                content.style.margin = "0";
            }
        })
    })
}

export function addParallax(target: HTMLElement, distance: number, baseTranslate = 0) {
    window.addEventListener('scroll', () => {
        target.style.transform = `translate3d(0px, calc(${window.scrollY * distance}px - ${baseTranslate}%), 0px `;
    })
}