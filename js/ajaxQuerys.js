$('.users .fa-edit').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            url: 'updateUser.php',
            data: { id: this.id },
            success: function(html) {
                $('#login').val(html).trigger("input");
                $('#button1').val('Обновить пароль');
                $('html, body').animate({
                    scrollTop: $("#login").prev().offset().top
                }, 1000);
            }
        });
    }
});

$('.fa-times').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'delete.php',
            data: { id: this.id },
            success: function(html) {
                location.reload(false);
            }
        });
    }
});

$('.fa-plus').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'addColor.php',
            data: { color: $('#addColor').val() },
            success: function(html) {
                location.reload(false);
            }
        });
    }
});

$('#login').on({
    input: function(e) {
        $.ajax({
            type: "POST",
            url: "checkLogin.php",
            data: { login: this.value },
            success: function(html) {
                if (html) {
                    $('#button1').val('Обновить пароль');
                } else {
                    $('#button1').val('Добавить ползователя');
                }
                $('#new_user_form_out').text(html);
            }
        });
    }
});