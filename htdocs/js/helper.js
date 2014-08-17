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

    $('.nensya').each(function (){
        var id = $(this).attr('id');
        var size = $(this).attr('size');
        var datums = {
            url: encodeURI($(this).attr('url')),
            id: id,
            size: size
        };
        var data = EncodeQueryData(datums);
        console.log(data);
        $.ajax({
            type: "POST",
            url: "http://localhost/app.elzup/htdocs/nn/nensya", //PHPを呼び出す
            data: data, //記入されたデータを渡す
            success: function(xml){
                $(xml).find("item").each(function(){
                    var text = $(this).find("text").text();
                    var id = $(this).find("id").text();
                    if(text){
                        var label = $('label[for=' + id + ']');
                        label.html(label.html().replace('念写中', '念写結果'));
                        $('div[for=' + id + ']').fadeOut();
                        var textDiv = $('#' + id);
                        textDiv.html(text.split(",").join("<br />"));
                        textDiv.fadeIn();
                    }
                });
            },
            error:function(){
                $('[for=' + id + ']').html('念写失敗しました');
            }
        });
    });

}(window.jQuery)

function EncodeQueryData(data)
{
   var ret = [];
   for (var d in data)
      ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
   return ret.join("&");
}
