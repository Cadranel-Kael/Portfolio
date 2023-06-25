import {Field} from "./Field";
import {settings} from "./settings";

export function contactForm() {
    const name = new Field(document.querySelector(settings.field.selectors.name[1]) as HTMLInputElement, document.querySelector(settings.field.selectors.name[2]) as HTMLElement)
    name.checkEmpty();

    const email = new Field(document.querySelector(settings.field.selectors.email[1]) as HTMLInputElement, document.querySelector(settings.field.selectors.email[2]) as HTMLElement)
    email.checkEmail();
    email.checkEmpty();
}