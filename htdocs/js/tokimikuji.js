$(function() {
    $('button.btn-draw').click(drawing);
    $('[id^=result]').hide();
    $('#tweet-button-div').hide();
    $('#rank-discription-div').hide();
	setTimeout("timer()", getTimeFix());
});

function getTimeFix (){
    return 1000 - new Date().getMilliseconds() + 2;
}

//var total = 0;
var c = 0;
var wr = "";
var mr = "";
var lr = "";
var wrt = 0;
var mrt = 0;
var lrt = 0;
function drawing() {
    c++;
    var type = $(this).attr('typed');
    var msec = new Date().getMilliseconds().toString().substr(0, 2);
    console.log(new Date().getMilliseconds());
    console.log(type + ":" + msec);
//    var msec = Math.round(new Date().getMilliseconds() % 1000 / 10);
    var mspan = $('#timer-m-span');
    var resultDiv = $('div#result-' + type + '-div');
    resultDiv.slideDown('slow');
    var resultP = resultDiv.children(".panel-body").children('p');
    var timeField = resultP.children('span.msec');
    var rankField = resultP.children('span.rank');
    var msec_str = ('00'+msec).slice(-2);
    timeField.html("." + msec_str);
    mspan.html("." + msec_str);
    mspan.show().fadeOut(2000);

//    $(this).hide();
    // ----------------- rank calc start ----------------- //
    var luckeyNum = [0,1,8,99,77];
    var rank = ((luckeyNum.indexOf(msec) >= 0 )? "大大吉" :
            ((msec % 10 == 0) ? "　大吉" :
            ((msec % 3 == 0) ? "　　吉" :
            ((msec % 2 == 0) ? "　中吉" :
            ((msec < 50) ? "　小吉" : "　末吉" )))));

    // ----------------- rank calc end ----------------- //
//    if (total == 2 && rank != "大大吉") rank = "大吉";
//    if (rank == "小吉" || rank == "末吉")total++;

    if (type == "w") {
        wrt = msec_str;
        wr  = rank;
    }
    if (type == "m") {
        mrt = msec_str;
        mr  = rank;
    }
    if (type == "l") {
        lrt = msec_str;
        lr  = rank;
    }
    rankField.html(rank);
    $(this).attr('disabled', true);

    if (c == 3) setTweetButton();
}

var enc_jikuu = "tokimiuji";
var enc_ken = "%0d%0a%8c%92%8dN%89%5e";
var enc_oka = "%0d%0a%8b%e0%89%5e";
var enc_ren = "%0d%0a%97%f6%88%a4%89%5e";

var url = "https://twitter.com/intent/tweet?hashtags=" + enc_jikuu + "&source=tweetbutton&text="
var site_url = "http://app.elzup.com/tk";

//"http://elzzup.yuta-ri.net/happy/day/20140101newyear/"

function setTweetButton(){
    var text = url + "時みくじ"+ "\n";
//    text += "健康運[." + wrt + "]: " + wr + "\n";
//    text += "金運　[." + mrt + "]: " + mr + "\n";
//    text += "恋愛運[." + lrt + "]: " + lr + "\n";
    var col1 = wr.split("");
    var col2 = mr.split("");
    var col3 = lr.split("");
    console.log(col1);
    console.log(col2);
    console.log(col3);
    text += "健康運 金運 恋愛運\n";
    text += "┏━┓┏━┓┏━┓\n";
    text += "┃" + col1[0] + "┃┃" + col2[0] + "┃┃" + col3[0] + "┃\n";
    text += "┃" + col1[1] + "┃┃" + col2[1] + "┃┃" + col3[1] + "┃\n";
    text += "┃" + col1[2] + "┃┃" + col2[2] + "┃┃" + col3[2] + "┃\n";
    text += "┗━┛┗━┛┗━┛\n";

    text += site_url;
    var text_url = encodeURI(text); 
    console.log(text_url);

    var tweetbuttonDiv = $('#tweet-button-div').fadeIn();
    $('#rank-discription-div').fadeIn('slow');
    var tweetbutton = $('button#tweet-button');
    tweetbutton.click(function () {
        window.open(text_url, "");
    });
}


function timer(){
	var now = new Date();

	var time = 
        ("00" + now.getHours()).slice(-2) + ":" + 
        ("00" + now.getMinutes()).slice(-2) + ":" + 
        ("00" + now.getSeconds()).slice(-2) ;

    $('#timer-span').html(time);

	setTimeout("timer()", 1000);
}

