$(document).ready(function () {

    // Подтверждение при выходе из админки
    $('#exitBtn').confirm({
        title: ' Подтверждение',
        content: 'Покинуть панель управления?',
        buttons: {
            confirmed: {
                text:'Да',
                action:function() {
                    location.href = this.$target.attr('href');
                }
            },

            unconfirmed: {
                text: 'Отмена',
                action: function () {}
            }
        }
    });

    // Подтверждение при удалении элементов из таблицы
    $('.actionTools.delete').confirm({
        title: ' Подтверждение',
        content: 'Вы точно хотите удалить этот элемент?',
        buttons: {
            confirmed: {
                text:'Да',
                action:function() {
                    location.href = this.$target.attr('href');
                }
            },

            unconfirmed: {
                text: 'Отмена',
                action: function () {}
            }
        }
    });

    // Подтверждение при одобрении коммента
    $('.actionTools.success').confirm({
        title: ' Подтверждение',
        content: 'Вы точно хотите одобрить этот комментарий?',
        buttons: {
            confirmed: {
                text:'Да',
                action:function() {
                    location.href = this.$target.attr('href');
                }
            },

            unconfirmed: {
                text: 'Отмена',
                action: function () {}
            }
        }
    });

});
