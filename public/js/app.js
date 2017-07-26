$(document).ready(function(){

    $('a.method-link').click(function(event){
        event.preventDefault();

        let method = $(this).data('method') ? $(this).data('method') : 'GET';
        let token = $('meta[name="_token"]').attr('content');

        $form = $("<form method='POST'></form>");
        $form.attr('action', `${$(this).attr('href')}`);
        $form.append(`<input type='hidden' name='_method' value='${method}'>`);
        $form.append(`<input type='hidden' name='_token' value='${token}'>`);

        $(document.body).append($form);
        $form.submit();

    });

    $('.slider-dot').click(function() {
        let val = $(this).index() * 100;

        $('.slider-images')[0].style.transform = `translateX(-${val}%)`;
    });

});
