<?php require 'inc/core.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.imgur.com/RN71qf6.png">
    <title><?php echo translateAndSave('Register'); ?> - <?php echo $name; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=<?php echo $language; ?>&lang=<?php echo $language; ?>" async defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="h-screen bg-gray-100 dark:bg-gray-800">

    <!-- Selector de idioma -->
    <div class="fixed top-4 left-4 z-50">
        <form id="language-form" action="change-language" method="POST">
            <select name="language" id="language" class="border border-gray-300 rounded-md">
                <option value="es"><?php echo ucfirst(translateAndSave('Spanish')); ?></option>
                <option value="en"><?php echo ucfirst(translateAndSave('English')); ?></option>
                <option value="fr"><?php echo ucfirst(translateAndSave('French')); ?></option>
                <option value="de"><?php echo ucfirst(translateAndSave('German')); ?></option>
                <option value="it"><?php echo ucfirst(translateAndSave('Italian')); ?></option>
                <option value="pt"><?php echo ucfirst(translateAndSave('Portuguese')); ?></option>
                <option value="ru"><?php echo ucfirst(translateAndSave('Russian')); ?></option>
                <option value="tr"><?php echo ucfirst(translateAndSave('Turkish')); ?></option>
                <option value="zh"><?php echo ucfirst(translateAndSave('Chinese')); ?></option>
                <option value="ja"><?php echo ucfirst(translateAndSave('Japanese')); ?></option>
                <option value="ko"><?php echo ucfirst(translateAndSave('Korean')); ?></option>
                <option value="ar"><?php echo ucfirst(translateAndSave('Arabic')); ?></option>
                <option value="hi"><?php echo ucfirst(translateAndSave('Hindi')); ?></option>
            </select>
        </form>
        <div id="response"></div>
    </div>

    <div class="flex min-h-full flex-col justify-center py-12 px-8">
        <header class="sm:mx-auto sm:w-full sm:max-w-md">
            <h1 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100"><?php echo $name; ?></h1>
            <span class="block text-center text-gray-500 dark:text-gray-300 italic text-sm"><?php echo translateAndSave('Register account'); ?></span>
        </header>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[800px]">
            <div class="sm:rounded-lg bg-orange-200 p-4 shadow">
                <div class="flex">
                    <div class="shrink-0">
                        <svg class="size-5 text-orange-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm text-orange-700"><?php echo translateAndSave('It is a temporarily enabled registry.'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <form id="register-user" class="space-y-6" method="POST" action="/register">
            <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-[800px]">
                <div class="bg-white dark:bg-gray-900 px-8 py-8 shadow sm:rounded-lg">
                    <h2 class="text-2xl/9 font-bold tracking-tight text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Account'); ?></h2>

                    <div class="mt-2">
                        <label for="username" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Username'); ?></label>
                        <p class="text-xs text-gray-500 mt-1"><?php echo translateAndSave('The username must be alphanumeric, with a minimum of 8 and a maximum of 12 characters.'); ?></p>
                        <div class="mt-2">
                            <input type="text" name="username" id="username" required
                                class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Email'); ?></label>
                        <p class="text-xs text-gray-500 mt-1"><?php echo translateAndSave('You cannot change your email later. Please provice your correct email address.'); ?></p>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" required
                                class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Password'); ?></label>
                        <p class="text-xs text-gray-500 mt-1"><?php echo translateAndSave('The password must be between 8 and 12 characters maximum.'); ?></p>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" required
                                class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="passwordConfirmation" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Confirm password'); ?></label>
                        <p class="text-xs text-gray-500 mt-1"><?php echo translateAndSave('The password must be between 8 and 12 characters maximum.'); ?></p>
                        <div class="mt-2">
                            <input type="password" name="passwordConfirmation" id="passwordConfirmation" required
                                class="block w-full rounded-md bg-white dark:bg-gray-900 px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-sky-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="social_id" class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100"><?php echo translateAndSave('Character deletion'); ?></label>
                        <p class="text-xs text-gray-500 mt-1"><?php echo translateAndSave('Enter 6 digits to delete your character.'); ?></p>
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
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center"><?php echo translateAndSave('Security'); ?></h2>
                    <div class="mt-4">
                        <label for="ad-target" class="block text-sm font-medium text-gray-900 dark:text-gray-100 mb-2 text-center"><?php echo translateAndSave('Captcha'); ?></label>
                        <fieldset id="ad-target" class="relative rounded-md bg-white dark:bg-gray-900">
                            <div class="flex justify-center">
                                <div class="g-recaptcha" data-sitekey="<?php echo $google_public; ?>" data-lang="<?php echo $language; ?>"></div>
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
                            class="flex w-full justify-center rounded-md bg-sky-600 px-3 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600"><?php echo translateAndSave('Sign up'); ?></button>
                    </div>
                </div>
            </div>
        </form>


        <footer class="text-gray-800 dark:text-gray-100 py-8 mt-8">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $name; ?>, <?php echo translateAndSave('All rights reserved'); ?>.<br><small><?php echo translateAndSave('Developed with &hearts; by'); ?> <a href="https://github.com/ZeroCrazy" target="_blank">ZeroCrazy</a></small></p>
                <div class="mt-4">
                    <div class="flex justify-center space-x-4 pt-6">
                        <a href="https://www.elitepvpers.com/forum/members/8637411-zerocrazy_dev.html" aria-label="" target="_blank"><img src="https://i.imgur.com/NPNNqfD.png" alt="Elitepvpers" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                        <a href="https://metin2.dev/profile/47534-zerocrazyv2/" aria-label="" target="_blank"><img src="https://i.imgur.com/4udmcoR.png" alt="Metin2Dev" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                        <a href="https://www.inforge.net/forum/members/zerocrazy.295842/" aria-label="" target="_blank"><img src="https://i.imgur.com/PksPM44.png" alt="Inforge" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                        <a href="https://codetech.es" aria-label="" target="_blank"><img src="https://i.imgur.com/AEjsAj3.png" alt="Codetech" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                        <a href="https://metin2zone.net/index.php?/profile/1061-zerocrazy/" aria-label="" target="_blank"><img src="https://i.imgur.com/03wkpMn.png" alt="Metin2Zone" class="h-12 mx-2 filter contrast-50 hover:drop-shadow-[0px_0px_2px_rgba(0,0,0,0.65)] transition-all duration-300"></a>
                    </div>
                </div>
            </div>
        </footer>


    </div>

    <script>
        const actualLanguage = "<?php echo $language; ?>";

        $(document).ready(function() {

            // Seleccionar automáticamente la opción correspondiente
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
                        if(response.error) {
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '<?php echo translateAndSave('Accept'); ?>',
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
                                confirmButtonText: '<?php echo translateAndSave('Accept'); ?>',
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

            // Idioma
            $('#language').change(function () {
                var formData = $('#language-form').serialize();

                $.ajax({
                    url: $('#language-form').attr('action'),
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (response.error) {
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '<?php echo translateAndSave('Accept'); ?>',
                                customClass: {
                                    confirmButton: "flex w-full justify-center rounded-md bg-red-600 px-12 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600",
                                },
                                buttonsStyling: false
                            });
                        } else {
                            Swal.fire({
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: '<?php echo translateAndSave('Accept'); ?>',
                                customClass: {
                                    confirmButton: "flex w-full justify-center rounded-md bg-green-600 px-12 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600",
                                },
                                buttonsStyling: false
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function () {
                        $('#response').html('<p style="color: red;">An error occurred while processing the request.</p>');
                    }
                });
            });

            
            
        });

        // Detectar el modo oscuro del sistema
        const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

        // Si el sistema prefiere un tema oscuro, añadir la clase dark a <body>
        if (prefersDarkScheme) {
        document.body.classList.add("dark");
            console.log("Sistema prefiere tema oscuro");
        } else {
            console.log("Sistema prefiere tema claro");
        }


    </script>

</body>

</html>