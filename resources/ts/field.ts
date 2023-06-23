export function connectField(field: Element, input: HTMLInputElement) {
    field.addEventListener('click', () => {
        input.focus();
    })
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