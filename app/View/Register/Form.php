<?php

use Metin2Register\Model\Language;
use Metin2Register\Model\Translator;
$language = Language::getCurrentLanguage();
?>
<form id="register-user" class="space-y-6" method="POST" action="/create-account">
    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-[800px]">
        <div class="bg-white dark:bg-gray-900 px-8 py-8 shadow sm:rounded-lg">
            <h2 class="text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100"><?= Translator::translate('Account'); ?></h2>

            <div class="mt-2">
                <label for="username" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?= Translator::translate('Username'); ?></label>
                <p class="text-xs text-gray-500 mt-1"><?= Translator::translate('The username must be alphanumeric, with a minimum of 8 and a maximum of 12 characters.'); ?></p>
                <div class="mt-2">
                    <input type="text" name="username" id="username" required
                        class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                </div>
            </div>

            <div class="mt-2">
                <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?= Translator::translate('Email'); ?></label>
                <p class="text-xs text-gray-500 mt-1"><?= Translator::translate('You cannot change your email later. Please provice your correct email address.'); ?></p>
                <div class="mt-2">
                    <input type="email" name="email" id="email" required
                        class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                </div>
            </div>

            <div class="mt-2">
                <label for="password" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?= Translator::translate('Password'); ?></label>
                <p class="text-xs text-gray-500 mt-1"><?= Translator::translate('The password must be between 8 and 12 characters maximum.'); ?></p>
                <div class="mt-2">
                    <input type="password" name="password" id="password" required
                        class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                </div>
            </div>

            <div class="mt-2">
                <label for="passwordConfirmation" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?= Translator::translate('Confirm password'); ?></label>
                <p class="text-xs text-gray-500 mt-1"><?= Translator::translate('The password must be between 8 and 12 characters maximum.'); ?></p>
                <div class="mt-2">
                    <input type="password" name="passwordConfirmation" id="passwordConfirmation" required
                        class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                </div>
            </div>

            <div class="mt-2">
                <label for="social_id" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?= Translator::translate('Character deletion'); ?></label>
                <p class="text-xs text-gray-500 mt-1"><?= Translator::translate('Enter 6 digits to delete your character.'); ?></p>
                <div class="mt-2">
                    <input type="text" name="social_id" id="social_id" required
                        class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                </div>
            </div>


        </div>
    </div>

    <?php if (isset($google_secret)) { ?>
        <div class="mt-6 flex justify-center">
            <div class="bg-white dark:bg-gray-900 px-8 py-8 shadow sm:rounded-lg w-full max-w-[800px]">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center"><?= Translator::translate('Security'); ?></h2>
                <div class="mt-4">
                    <label for="ad-target" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2 text-center"><?= Translator::translate('Captcha'); ?></label>
                    <fieldset id="ad-target" class="relative rounded-md bg-white dark:bg-gray-900">
                        <div class="flex justify-center">
                            <div class="g-recaptcha" data-sitekey="<?= $google_public; ?>" data-lang="<?= $language; ?>"></div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-[800px]">
        <div class="shadow sm:rounded-lg">
            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-sky-600 px-3 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600"><?= Translator::translate('Sign up'); ?></button>
            </div>
        </div>
    </div>
</form>

<script>
    const actualLanguage = "<?= $language; ?>";

    $(document).ready(function() {

        $('#language').val(actualLanguage);


        $('#register-user').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        Swal.fire({
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: '<?= Translator::translate('Accept'); ?>',
                            customClass: {
                                confirmButton: "flex w-full justify-center rounded-md bg-red-600 px-12 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600",
                            },
                            buttonsStyling: false
                        });
                        grecaptcha.reset();
                    } else {
                        Swal.fire({
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: '<?= Translator::translate('Accept'); ?>',
                            customClass: {
                                confirmButton: "flex w-full justify-center rounded-md bg-green-600 px-12 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600",
                            },
                            buttonsStyling: false
                        });
                    }
                },
                error: function() {
                    $('#response').html('<p style="color: red;">An error occurred while processing the request.</p>');
                }
            });
        });

    })
</script>