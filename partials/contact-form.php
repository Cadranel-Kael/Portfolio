<?php

$error_messages = [
    'empty' => 'This field can\'t be empty',
    'wrong_email_format' => 'Wrong format in field, format needed: example@mail.com',
];


if (isset($_POST['contact_form'])) {
    $errors = [];

    // Sanitize the data
    $name = isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validation
    if (strlen($name) === 0) {
        $errors['full_name'] = $error_messages['empty'];
    }

    if (!is_email($email)) {
        $errors['email'] = $error_messages['wrong_email_format'];
    }

    if (strlen($email) === 0) {
        $errors['email'] = $error_messages['empty'];
    }

    if (strlen($message) === 0) {
        $errors['message'] = $error_messages['empty'];
    }

    // Send email to the WordPress administrator if there are no validation errors
    if (empty($errors)) {
        $mail = get_option('admin_email');
        $subject = 'New message from ' . $name;
        $mail_message = 'Name: ' . $name . '\r\n';
        $mail_message .= 'Email: ' . $email . '\r\n';
        $mail_message .= 'Phone: ' . $phone . '\r\n';
        $mail_message .= 'Company: ' . $company . '\r\n';
        $mail_message .= $message;

        wp_mail($mail, $subject, $mail_message);

        $_SESSION['flash'] = 'Your message has been successfully sent.';
        $_POST = '';
    }
}

// Display the success message
?>
<span class="contact__success"><?= $_SESSION['flash'] ?? '' ?></span>
<?php $_SESSION['flash'] = '' ?>
<form id="contact" class="contact__form form" method="POST" action="<?= $_SERVER['REQUEST_URI'] . '#contact'; ?>">

    <input type="hidden" name="contact_form">
    <div class="form__field">
        <div class="form__field__container clickable" id="name_field">
            <label class="form__field__label" for="full_name"><?= $name_label ?></label>
            <input class="form__field__input" type="text" id="full_name" name="full_name"
                   placeholder="<?= $name_placeholder ?>" value="<?= $_POST['full_name'] ?? '' ?>">
        </div>
        <span class="form__field__error"><?= $errors['full_name'] ?? '' ?></span>
    </div>
    <div class="form__field">
        <div class="form__field__container clickable" id="email_field">
            <label class="form__field__label" for="email"><?= $email_label ?></label>
            <input class="form__field__input" type="text" id="email" name="email"
                   placeholder="<?= $email_placeholder ?>" value="<?= $_POST['email'] ?? '' ?>">
        </div>
        <span class="form__field__error"><?= $errors['email'] ?? '' ?></span>
    </div>
    <div class="form__field">
        <div class="form__field__container clickable" id="phone_field">
            <label class="form__field__label" for="phone"><?= $phone_label ?></label>
            <input class="form__field__input" type="text" id="phone" name="phone"
                   placeholder="<?= $phone_placeholder ?>" value="<?= $_POST['phone'] ?? '' ?>">
        </div>
        <span class="form__field__error"><?= $errors['phone'] ?? '' ?></span>
    </div>
    <div class="form__field">
        <div class="form__field__container clickable" id="company_field">
            <label class="form__field__label" for="company"><?= $company_label ?></label>
            <input class="form__field__input" type="text" id="company" name="company"
                   placeholder="<?= $company_placeholder ?>" value="<?= $_POST['company'] ?? '' ?>">
        </div>
        <span class="form__field__error"><?= $errors['company'] ?? '' ?></span>
    </div>
    <div class="form__field form__field--message">
        <div class="form__field__container form__field__container--message clickable">
            <label class="form__field__label form__field__label--message"
                   for="message"><?= $message_label ?></label>
            <textarea class="form__field__textarea" name="message" id="message" rows="1" cols="4"
                      placeholder="<?= $message_placeholder ?>"><?= $_POST['message'] ?? '' ?></textarea>
        </div>
        <span class="form__field__error"><?= $errors['message'] ?? '' ?></span>
    </div>
    <button class="form__field__submit" type="submit">
        Send it off
        <svg class="project__arrow" role="img" width="37" height="28">
            <use stroke="#fff" stroke-width="3px"
                 xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#arrow"' ?>"/>
        </svg>
    </button>
</form>