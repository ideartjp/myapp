$(function() {

    // 宿泊代表者用のフォームslideDown
    $('input[name="actually"]').change(function() {
        var prop = $('#repCheckbox').prop('checked');
        if (!prop) {
            $('#repForm').slideDown(500);
        } else {
            $('#repForm').slideUp(500);
        }
    });

    // textareaの文字数カウント(countUp ver.)
    $('textarea').bind('keydown keyup keypress change',function(){
        var thisValueLength = $(this).val().length;
        $('#countUp').html(thisValueLength);
    });

});
