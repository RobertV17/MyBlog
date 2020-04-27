$(document).ready(function () {
    $('#sendComment').click(function () {
        let articleId = $(this).attr('data-article');
        let author = $('#author').val();
        let email = $('#email').val();
        let comment = $('#comment').val();
        let sendCommentUrl = $(this).attr('data-url');

        $.ajax({
            type: "POST",
            url: sendCommentUrl,
            data: {
                'art_id' : articleId,
                'author' : author,
                'email' : email,
                'comment' : comment
            },
            success: function(data){
                $('#author').val('');
                $('#email').val('');
                $('#comment').val('');

                var alertErrorsMsg = `<div class="alert alert-success fade show" role="alert" data-type="alert">
                                             Спасибо за комментарий, он поступил на модерацию
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>`;

                $('#writeComment').prepend(alertErrorsMsg);
            },
            error: function (data) {
                if (data.responseJSON.errors) {
                    let errorsObj = data.responseJSON.errors;
                    var errorMsgStr = '';

                    for (let input in errorsObj) {
                        errorMsgStr +=  errorsObj[input].join('<br>') + '<br>';
                    }
                } else {
                    var errorMsgStr = 'Неизвестная ошибка';
                }

                var alertErrorsMsg = `<div class="alert alert-danger alert-dismissible fade show" role="alert" data-type="alert">
                                             ` + errorMsgStr + `
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>`;

                $('#writeComment').prepend(alertErrorsMsg);
            }
        });
    });
});
