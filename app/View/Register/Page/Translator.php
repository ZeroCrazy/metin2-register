<?php
use Metin2Register\Model\Translator;
?>
<div class="fixed top-4 left-4 z-50">
    <form id="language-form" method="POST">
        <select name="language" id="language" class="border border-gray-300 rounded-md">
            <option value="es"><?= ucfirst(Translator::translate('Spanish')); ?></option>
            <option value="en"><?= ucfirst(Translator::translate('English')); ?></option>
            <option value="fr"><?= ucfirst(Translator::translate('French')); ?></option>
            <option value="de"><?= ucfirst(Translator::translate('German')); ?></option>
            <option value="it"><?= ucfirst(Translator::translate('Italian')); ?></option>
            <option value="pt"><?= ucfirst(Translator::translate('Portuguese')); ?></option>
            <option value="ru"><?= ucfirst(Translator::translate('Russian')); ?></option>
            <option value="tr"><?= ucfirst(Translator::translate('Turkish')); ?></option>
            <option value="zh"><?= ucfirst(Translator::translate('Chinese')); ?></option>
            <option value="ja"><?= ucfirst(Translator::translate('Japanese')); ?></option>
            <option value="ko"><?= ucfirst(Translator::translate('Korean')); ?></option>
            <option value="ar"><?= ucfirst(Translator::translate('Arabic')); ?></option>
            <option value="hi"><?= ucfirst(Translator::translate('Hindi')); ?></option>
        </select>
    </form>
    <div id="response"></div>
</div>

<script>
    $('#language').change(function() {
        var formData = $('#language-form').serialize();

        $.ajax({
            url: $('#language-form').attr('action'),
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
                } else {
                    Swal.fire({
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: '<?= Translator::translate('Accept'); ?>',
                        customClass: {
                            confirmButton: "flex w-full justify-center rounded-md bg-green-600 px-12 py-3 text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600",
                        },
                        buttonsStyling: false
                    }).then(() => {
                        location.reload();
                    });
                }
            },
            error: function(response) {
                console.log(response)
                $('#response').html('<p style="color: red;">An error occurred while processing the request.</p>');
            }
        });
    });
</script>