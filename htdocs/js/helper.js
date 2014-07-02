var $ta;
var $submit;
!function ($) {
    $(function() {


        // checking form
        $submit = $('button[type=submit]');
        $ta = $('#textArea');
        checkEmpty();

//        $ta.change(function () {
//            checkEmpty();
//        });
        $ta.on('keyup', checkEmpty);

        // slider
        $('input.slider#yoi-level').slider().on('slide', function(ev) {
            $('#yoi-num').html($('.tooltip-inner').html());
        });

    });

    function checkEmpty() {
        if (!$ta.val()) {
            $submit.attr('disabled', '');
        }
        else {
            $submit.removeAttr('disabled');
        }
    }

}(window.jQuery)
