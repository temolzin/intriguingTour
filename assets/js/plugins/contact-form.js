/**
 *
 * -----------------------------------------------------------------------------
 *
 * Template : Fluxi HTML TEMPLATE
 * Author : reacthemes
 * Author URI : https://reactheme.com/ 
 *
 * -----------------------------------------------------------------------------
 *
 **/

(function ($) {
    'use strict';

    var form = $('#contact-form');
    if (!form.length) return;

    var formMessages = $('#form-messages');
    if (!formMessages.length) {
        form.after('<div id="form-messages" class="form-messages"></div>');
        formMessages = $('#form-messages');
    }

    var submitBtn = form.find('button[type="submit"]');
    var isSubmitting = false;

    form.on('submit', function (e) {
        e.preventDefault();

        if (isSubmitting) return; // evita envíos dobles
        isSubmitting = true;
        var originalText = submitBtn.text();
        submitBtn.prop('disabled', true).text('Enviando...');

        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData
        }).done(function (response) {
            formMessages.removeClass('error').addClass('success');
            formMessages.text(response || '¡Mensaje enviado!');

            if (window.Swal) {
                Swal.fire({
                    icon: 'success',
                    title: 'Enviado',
                    text: response || 'Hemos recibido tu mensaje.',
                    confirmButtonText: 'Aceptar'
                });
            }
        }).fail(function (data) {
            formMessages.removeClass('success').addClass('error');
            if (data.responseText) {
                formMessages.text(data.responseText);
            } else {
                formMessages.text('Oops! Ocurrió un error y tu mensaje no pudo enviarse.');
            }

            if (window.Swal) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.responseText || 'No pudimos enviar tu mensaje. Intenta más tarde.',
                    confirmButtonText: 'Aceptar'
                });
            }
        }).always(function () {
            isSubmitting = false;
            submitBtn.prop('disabled', false).text(originalText);
        });
    });

})(jQuery);
