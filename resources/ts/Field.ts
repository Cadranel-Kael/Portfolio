export class Field {
    private field: HTMLInputElement | HTMLTextAreaElement;
    private errorContainer: HTMLElement;
    private emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    private empty = false;
    private email = false;

    constructor(field: HTMLInputElement | HTMLTextAreaElement, errorContainer: HTMLElement) {
        this.field = field;
        this.errorContainer = errorContainer;
        this.field.addEventListener('focusout', () => {
            this.errorContainer.innerText = '';
            if (this.email) {
                if (!this.emailRegex.test(this.field.value)) {
                    this.errorContainer.innerText = 'Wrong format in field, format needed: example@mail.com';
                }
            }
            if (this.empty) {
                if (this.field.value.trim().length === 0) {
                    this.errorContainer.innerText = 'This field can\'t be empty';
                }
            }
        })
    }

    checkEmpty () {
        this.empty = true;
    }

    checkEmail() {
        this.email = true;
    }
}