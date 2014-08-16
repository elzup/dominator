var $ta;
var $submit;
!function ($) {
    $(function() {


        // checking form
        $submit = $('button[type=submit]');
        $ta = $('.check-input');
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
        if (!$ta.length) {
            console.log("skip");
            return;
        }
        if (!$ta.val()) {
            $submit.attr('disabled', '');
        }
        else {
            $submit.removeAttr('disabled');
        }
    }

    var data = $("#form").serialize(); //送信されたデータ
    $.ajax({
        type: "POST",
        url: "02/03.php", //PHPを呼び出す
        data: data, //記入されたデータを渡す
        success: function(xml){
            $(xml).find("item").each(function(){
                var name = $(this).find("fullname").text();
                if(name){
                    $("#str").html('あなたのフルネームは : '+name);
                }else{
                    $("#str").html('記入していませんね？');
                }
            });
        },
        error:function(){
            $("#str").html('処理に失敗しました');
        }
    });

}(window.jQuery)
