$(document).ready(function(){
    jQuery.fn.edit = function(){
        $('input').each(function(){
            $(this).prop('disabled',false);
        });
    };

    $('#edit').click(function(){
        $('.form-control-plaintext').each(function(){
            $(this).prop('readonly',false);
            $(this).removeClass('form-control-plaintext');
            $(this).addClass('form-control');
        });
    });
    $('.carousel-item:first').addClass('active');
});
