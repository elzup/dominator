!function ($) {
    $(function() {
        // 念射の開始
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
                url: "../nensya", //PHPを呼び出す
                data: data, //記入されたデータを渡す
                success: function(xml){
                    $(xml).find("item").each(function(){
                        var text = $(this).find("text").text();
                        var id = $(this).find("id").text();
                        if(text){
                            var label = $('label[for=' + id + ']');
                            label.html(label.html().replace('念写中', '念写結果'));
                            $('div[for=' + id + ']').hide();
                            var textDiv = $('#' + id);
                            textDiv.html(text.split(",").join("<br />"));
                            textDiv.fadeIn();
                            if (id == 'result') {
                                // シェアボタンの生成
                                var share_btn = $('#share-btn-main');
                                share_btn.show();
                                var after_href = share_btn.attr('href').replace(encodeURI('{text}'), encodeURI(text.split(",").join("\n")));
                                share_btn.attr('href', after_href);
                            }
                        }
                    });
                },
                error:function(){
                    $('[for=' + id + ']').html('念写失敗しました');
                }
            });
        });

        // カスタムボタン
        $("#custom-nensya").click(function() {
            var url =  '../tx/' + $(this).attr('sn') + "/" + $('#custom-nensya-num').val();
            window.open(url);
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
