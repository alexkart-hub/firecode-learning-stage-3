//--------- Кастомизированный ввод даты (datapicker)
$(function() {
    $("#datepicker").datepicker({

        changeMonth: true,
        changeYear: true,
        yearRange: "1920:2050",
        firstDay: 1,

        showAnim: "drop"
            // showAnim: "fold"
            // showAnim: "slideDown"
            // showAnim: "bounce"
            // showAnim: "clip"
            // showAnim: "slide"
    });
    $("#datepicker").datepicker("option", "dateFormat", 'dd-mm-yy');
});




// - Кастомизированный select для выбора города
// - (js/jquery.nice-select.js)
$(document).ready(function() {
    $('select').niceSelect();
});
// - Маска для ввода номера телефона
// - (js/jquery.maskedinput.js)
$(function() {
    $("#telephone").mask("+7(999)999-99-99");
});
// - Валидация текстовых полей ввода калькулятора
$(".input_calc").on({
    "keydown": function(e) {
        e.key == 0 ||
            e.key == 1 ||
            e.key == 2 ||
            e.key == 3 ||
            e.key == 4 ||
            e.key == 5 ||
            e.key == 6 ||
            e.key == 7 ||
            e.key == 8 ||
            e.key == 9 ||
            e.key == "." ||
            e.key == "Tab" ||
            e.key == "Backspace" ||
            e.key == "Delete" ||
            e.key == "ArrowLeft" ||
            e.key == "ArrowRight" ||
            e.key == "Escape" ||
            e.key == "Enter" ||
            e.preventDefault();
        // console.log(e.key);
    }
});
// - Сгруппированные чекбоксы работают как радиокнопки
//------
// - 1 группировка
$('#group1 input:checkbox').click(function() {
    if ($(this).is(':checked')) {
        $('#group1 input:checkbox').not(this).prop('checked', false);
    }
});
// - 2 группировка
$('#group2 input:checkbox').click(function() {
    if ($(this).is(':checked')) {
        $('#group2 input:checkbox').not(this).prop('checked', false);
    }
});

function textRequest() {
    let text = [];
    if ($('#area').val()) { text.push(['Площадь потолков: ', $('#area').val()]); }
    if ($('#q_lamp').val()) { text.push(['Светильников: ', $('#q_lamp').val()]); }
    if ($('#q_chandelier').val()) { text.push(['Люстр: ', $('#q_chandelier').val()]); }
    if ($('#q_pipe').val()) { text.push(['Труб: ', $('#q_pipe').val()]); }
    if ($('#q_corner').val()) { text.push(['Углов: ', $('#q_corner').val()]); }
    if ($('#factura1').is(':checked')) { text.push(['Фактура:', $('#factura1').val()]); } else { text.push(['Фактура:', $('#factura2').val()]); }
    for (let value of $('#group2 input:checkbox')) {
        if (value.checked) {
            text.push(['Цвет: ', value.value]);
        }
    }
    text.push(['Итоговая сумма: ', $('#total_price>span').text()]);
    console.log(text);
    return text;
}

// - при нажатии кнопки ОСТАВИТЬ ЗАЯВКУ (id="submit")
//   проверяется наличие введенного номера телефона
//   и установка флажка обработки персональных данных
$("#submit").on({
    "click": function(e) {
        let check_box = $('#personal_data');
        let phone = $('#telephone');
        if (check_box.is(':checked') && phone.val() != '') { // если все условия выполнены,
            $.ajax({ // то делается Ajax-запрос...
                type: 'POST',
                url: 'application/service/saveRequest.php',
                cache: false,
                data: {
                    city: $('#town').val(),
                    date_birth: $('#datepicker').val(),
                    phone: $('#telephone').val(),
                    text: textRequest(),
                    user_ip: 'user_ip'
                },
                success: function(html) { // в случае успешного прохождения запроса
                    $('.popup-fade').fadeIn(); // открывается модальное окно
                    console.log(html);
                }
            });
        } else { // ...иначе выскакивает напоминалка
            let msg = '';
            if (!check_box.is(':checked')) {
                msg = 'Необходимо согласиться на обработку персональных данных!';
                hint(msg, check_box);
            }
            if (phone.val() == '') {
                if (!check_box.is(':checked')) {
                    msg = 'Необходимо ввести телефон и согласиться на обработку персональных данных!';
                } else {
                    msg = 'Необходимо ввести телефон!';
                }
                hint(msg, phone);
            }
        }
    },
});
// отсюда начинается код анимации напоминалки, которая выскакивает
// если не введен номер телефона или не установлен чекбокс обработки
// персональных данных

// создаю div с напоминалкой
var img = $('<div class="hint"><p></p></div>');

// задаю ее начальные координаты и устанавливаю видимость на 0
let start = {
    'top': 0,
    'left': 0,
    'width': 50,
    'height': 10,
    'opacity': 0
};

// добавляю css-свойства к блоку напоминалки...
img.css({
        'top': start.top,
        'left': start.left,
        'width': start.width,
        'height': start.height,
        'opacity': start.opacity
    })
    .prependTo('body'); // ...и помещаю ее в DOM

// когда напоминалка видима, клик по ней убирает её с экрана
img.on({
    'click': function(e) {
        hintOut($(this));
    }
});

// так-же напоминалка улетучивается, когда пользователь
// начинает вводить номер телефона или ставит галочку
$('#personal_data, #telephone').on({
    'click': function() {
        hintOut();
    }
});
// данная функция осуществляет анимацию напоминалки
//когда пользователь нажимает кнопку, напоминалка:
// - выскакивает, если её нет;
// - прячется, если она уже на экране.
function hint(massage, obj) {
    document.querySelector('.hint>p').innerHTML = massage;
    if (img.css('width') == '50px') {
        img.animate({
                'opacity': .9,
                'top': obj.offset().top + 40,
                'left': (window.innerWidth - 300) / 2,
            }, {
                duration: 300,
                queue: false,
                specialEasing: {
                    height: 'swing',
                    width: 'swing'
                }
            })
            .animate({
                'width': 310,
                'height': 120
            }, {
                duration: 300,
                queue: true,
                specialEasing: {
                    height: 'swing',
                    width: 'swing'
                },
                complele: function(e) {
                    obj.on({
                        click: function() {
                            hintOut();
                        }
                    });
                }
            });
    }
}
// Функция hintOut() реализует обратную анимацию,
// то есть возвращение напоминалки на стартовую позицию
// и opacity = 0
function hintOut() {
    img
        .animate({
            'top': start.top,
            'width': start.width,
            'opacity': start.opacity
        }, {
            duration: 800,
            queue: false,
            specialEasing: {
                height: 'swing',
                width: 'swing'
            }
        })
        .animate({
            'left': start.left,
            'height': start.height
        }, {
            duration: 500,
            queue: true,
            specialEasing: {
                height: 'swing',
                width: 'swing'
            },
            complite: function() {
                document.querySelector('.hint>p').innerHTML = '';
            }
        });
}
// ------------------ конец блока напоминалки

// -- закрытие модального окна
// -- (открытие происходит после успешного Ajax-запроса) 

// Закрыть модальное окно крестом
$('.popup-close').click(function() {
    $(this).parents('.popup-fade').fadeOut();
    return false;
});

// Закрытие по клавише Esc.
$(document).keydown(function(e) {
    if (e.keyCode === 27) {
        e.stopPropagation();
        $('.popup-fade').fadeOut();
    }
});

// Клик по фону, но не по окну.
$('.popup-fade').click(function(e) {
    if ($(e.target).closest('.popup').length == 0) {
        $(this).fadeOut();
    }
});