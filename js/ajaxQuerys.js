$('.users .fa-edit').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            url: 'application/service/updateUser.php',
            data: { id: this.id },
            success: function(html) {
                $('#login').val(html).trigger("input");
                $('#button1').val('Обновить пароль');
                $('html, body').animate({
                    scrollTop: $("#login").prev().offset().top
                }, 1000);
                $('#password').focus();
            }
        });
    }
});

$('.fa-times').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'application/service/delete.php',
            data: { id: this.id },
            success: function(html) {
                console.log(html);
                location.reload(false);
            }
        });
    }
});

$('.add_new_color').on({
    click: function(e) {
        $('#addColorBlock').toggleClass('d-block');
        $('#addColor').focus();
    }
});

$('#addColor_button').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'application/service/addColor.php',
            data: { color: $('#addColor').val() },
            success: function(html) {
                $('#addColorBlock').toggleClass('d-none');
                location.reload(false);
            }
        });
    }
});

$('.users #login').on({
    input: function(e) {
        $.ajax({
            type: "POST",
            url: "application/service/checkLogin.php",
            data: { login: this.value },
            success: function(html) {
                if (html) {
                    hint('Такой пользователь есть. Будет обновлен пароль. Если Вы оставите пароль пустым, то для пользователя останется его предыдущий пароль', $('#login'));
                    $('#button1').val('Обновить пароль');
                } else {
                    $('#button1').val('Добавить пользователя');
                    hintOut();
                }
                // $('#new_user_form_out').text(html);
            }
        });
    },

});

$('#area, #q_lamp, #q_chandelier, #q_pipe, #q_corner, #factura1, #factura2, input[id*="color"]').on({
    input: function(e) {
        calc(this.id, this.value);
    }
});

function calc(this_id, this_value) {
    if ($('#factura1').prop('checked')) {
        factura = 1;
    } else {
        factura = 2;
    }
    $.ajax({
        type: "POST",
        url: "application/service/calculator.php",
        data: {
            area: $('#area').val(),
            q_lamp: $('#q_lamp').val(),
            q_chandelier: $('#q_chandelier').val(),
            q_pipe: $('#q_pipe').val(),
            q_corner: $('#q_corner').val(),
            factura: factura,
            id: this_id,
            value: this_value
        },
        success: function(html) {
            $('#total_price>span').text(html);
        }
    });
}

$('#button1').on({
    click: function(e) {
        if ($('#password').val().length >= 4) {
            $.ajax({
                type: "POST",
                url: "application/service/createUser.php",
                data: {
                    login: $('#login').val(),
                    password: $('#password').val()
                },
                success: function(html) {
                    location.reload(false);
                }
            });
        } else {
            hint('Пароль должен иметь длину не менее 4-х символов!', $('#password'));
        }
    }
});

$(() => {
    calc($('#area').id, $('#area').val());
});

$('#password').on({
    click: function(e) {
        hintOut();
    }
});

$('#button2').on({
    click: function(e) {
        $.ajax({
            type: "POST",
            url: "application/service/saveSettings.php",
            data: {
                price_ceiling: $('#price_area').val(),
                price_lamp: $('#price_lamp').val(),
                price_chandelier: $('#price_chandelier').val(),
                price_pipe: $('#price_pipe').val(),
                price_corner: $('#price_corner').val(),
                price_glossy_texture: $('#price_glossy').val(),
                price_matte_texture: $('#price_matt').val()
            },
            success: function(html) {
                // console.log(html);
            }
        });
    }
});

$(() => {
    console.log($('.auth .message').text().length);
    if ($('.auth .message').text()) {
        hint("Неправильный логин или пароль! Попробуйте еще...", $('.auth .popup h1'));

    }
});


$('.auth #login').on({
    click: function(e) {
        hintOut();
    }
});