//ulRoll
var ulRoll = function(id, dir, vt) {
    var ScrollBox = document.getElementById(id); //滚动外层遮挡框架
    if (!ScrollBox) return false;
    var OldContent = ScrollBox.getElementsByTagName("ul")[0]; //UL index=0;
    if (!OldContent) return false;
    var domeOne = ScrollBox.getElementsByTagName("li"); // li
    if (!domeOne.length) return false;
    var domeOneLen = domeOne.length;
    var OldLong = 0; //旧总长
    var NewLong = 0; //新总长-外层框架长度
    var NewContent = OldContent.innerHTML;
    if (dir == "1") {
        for (var i = 0; i < domeOneLen; i++) {
            OldLong += domeOne[i].offsetWidth;
        }
        while (NewLong < (ScrollBox.offsetWidth)) {
            NewContent += OldContent.innerHTML;
            NewLong += OldLong;
        }
    } else if (dir == "2") {
        for (var i = 0; i < domeOneLen; i++) {
            OldLong += domeOne[i].offsetHeight;
        }
        while (NewLong < (ScrollBox.offsetHeight)) {
            NewContent += OldContent.innerHTML;
            NewLong += OldLong;
        }
    } //判断新UL的总长
    OldContent.innerHTML = NewContent; //生成新的Ul
    var domeTwo = ScrollBox.getElementsByTagName("li")[domeOneLen]; //滚动结束位置
    var myRoll = function() {
        if (dir == "1") {
            if (ScrollBox.scrollLeft == domeTwo.offsetLeft) {
                ScrollBox.scrollLeft = 0;
            } else {
                ScrollBox.scrollLeft++;
            }
        } else if (dir == "2") {
            if (ScrollBox.scrollTop >= domeTwo.offsetTop) {
                ScrollBox.scrollTop = 0;
            } else {
                ScrollBox.scrollTop++;
            }
        } else if (dir == "3") {
            if (ScrollBox.scrollLeft == domeTwo.offsetLeft) {
                ScrollBox.scrollLeft = 0;
            } else {
                ScrollBox.scrollLeft--;
            }
        }
    } //滚动
    var timer = setInterval(myRoll, vt); //周期性调用滚动
    ScrollBox.onmouseover = function() { clearInterval(timer) }
    ScrollBox.onmouseout = function() { timer = setInterval(myRoll, vt) }
} // id=最外层遮挡框架id ,滚动方式dir=1，2 分别对应左 上,vt滚动速度；

$(document).ready(function($){
    var $showPic =$('#bannerList li');
    var $btonBox=$('#bannerBton');
    var _n=0;
    var _vt=3000;
    var _vf=1000;
    var timer;
    //生成角标
    for(i=1;i<=$showPic.length;i++){
        $btonBox.append('<li>'+i+'</li>');
    }

    var $btonList=$btonBox.children('li');
    //鼠标事件
    $btonList.each(function(e){
        $(this).hover(function(){
            clearInterval(timer);
            showImg(e);
            _n=e;
        },function(){
            timer = setInterval(auto,_vt);
        });
    });
    //图片轮换
    var showImg= function(n){
        $showPic.stop(true,true).eq(n).fadeIn(_vf).siblings().fadeOut(_vf);
        $btonList.eq(n).addClass('up').siblings().removeClass('up');
    }
    //自动播放
    var auto=function(){
        showImg(_n);
        _n++
        if(_n == $showPic.length){_n=0;}
    }
    timer = setInterval(auto,_vt);
    showImg(_n);
    _n++;
});