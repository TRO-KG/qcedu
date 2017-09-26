//弹出框
function dialogbox(clickid, elemid, closeElem) {
    $(clickid).on("click", function (ev) {
        var ev = ev || window.event;
        var $apos = $(this).offset().top;
        var $window_w = $(window).width();
        var $dialog_w = $(".dialog").width();
        var $document_h = $(document).height();
        var toppos = $apos - ev.clientY+80;
        if ($document_h > $(window).height()) {
            var h = $document_h;
        } else {
            var h = $(window).height();
        }
        if ($(document).scrollTop() == 0) {
            toppos = 30;
        }
        $(elemid).css({ "position": "absolute", "top": toppos, "left": ($window_w - $dialog_w) / 2});
        $("body").append("<div id='backdrop' style='position:absolute; top:0; left:0;filter:alpha(opacity=80);opacity:0.8; background-color:#000; display:block; z-index:2000; width:100%; height:" + h + "px;'></div>");
        $(elemid).show();
    })
    $(closeElem).on("click", function () {
        $(elemid).hide();
        $("#backdrop").remove();
    })
}

