$('.users .fa-edit').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            url: 'updateUser.php',
            data: { id: this.id },
            success: function(html) {
                $('#login').val(html);
                $('#button1').val('Обновить пароль');
                $('html, body').animate({
                    scrollTop: $("#login").prev().offset().top
                }, 1000);
            }
        });
    }
});

$('.users .fa-times').on({
    click: function(e) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'deleteUser.php',
            data: { id: this.id },
            success: function(html) {
                location.reload(false);
            }
        });
    }
});