$.AMUI.progress.start();

$(window).on("load", function () {
    $.AMUI.progress.done();
})

//发送ajax请求时，带上csrf token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * 4秒钟后，自动隐藏flash信息
 */
var hideFlash = function () {
    $(".am-alert").fadeOut("slow");
}
setTimeout(hideFlash, 4000);
