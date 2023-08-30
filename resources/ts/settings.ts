export const settings = {
    mouse: {
        size: 12,
        resize: 1.7,
        numberOfTrail: 25,
        length: 0.06,
        clickables: ['a', 'button', '.clickable'],
    },
    field: {
        selectors: {
            'name': ['#name_field', '#full_name', '#full_name-error'],
            'email': ['#email_field', '#email', '#email-error'],
            'phone': ['#phone_field', '#phone', '#phone-error'],
            'company': ['#company_field', '#company', '#company-error'],
            'message': ['#message_field', '#message', '#message-error'],
        },
        textArea: {
            maxHeight: 140,
        }
    },
    dropDown: {
        faq: [
            'question',
            'answer',
            'button'
        ]
    },
    planet: {
        planet: '#planet',
        bg: '.planet_clouds',
    }
}