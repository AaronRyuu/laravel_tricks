hljs.initHighlightingOnLoad();
$(function () {
    $("#store-comment").click(function () {
        $.post("/comments", $("form").serialize(), function (data) {
            $(".am-comments-list").append(data);
            $("textarea").val('');
            $('pre > code').each(function () {
                hljs.highlightBlock(this);
            });
        })

        return false;
    })

    //atwho
    var commenter_exist = [];
    $('.am-comment-author').each(function() {
        if($.inArray($(this).text(), commenter_exist) < 0) {
            commenter_exist.push($(this).text());
        }
    });
    $('textarea').atwho({ at: "@", 'data': commenter_exist });


    //hotkeys
    $("textarea").keydown(function (e) {
        if ((e.ctrlKey || e.metaKey) && e.keyCode == 13) {
            $("#store-comment").click()
        }
    });
})