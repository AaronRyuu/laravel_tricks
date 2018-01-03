//插件的配置
var opts = {
    url: "/photos",
    type: "POST",

    //上传之前
    beforeSend: function () {
        $("#loading").attr("class", "am-icon-spinner am-icon-pulse");
    },

    //上传成功后
    success: function (result, status, xhr) {
        $("input[name='avatar']").val(result.data);
        $("#photo_show").attr('src', result.data);
        $("#loading").attr("class", "am-icon-cloud-upload");
    },

    //上传失败
    error: function (result, status, errorThrown) {
        alert(result.responseJSON.message)
        $("#loading").attr("class", "am-icon-cloud-upload");
    }
}

//启动
$('#photo_upload').fileUpload(opts);