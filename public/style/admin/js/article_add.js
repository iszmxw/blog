var $summernote;
$(document).ready(function () {
    $summernote = $('.summernote').summernote({
        height: 600,
        minHeight: null,
        maxHeight: null,
        focus: true,
        prettifyHtml:true,
        callbacks: {//上传base64图片特殊上传处理
            onImageUpload: function(files) {
                sendFile(files);
            }
        }
    });
});

//发送图片文件给服务器端
function sendFile(files) {
    var imageData = new FormData();
    var _token = $("#_token").val();
    var url = $("#article_image_upload").val();
    imageData.append("_token", _token);
    imageData.append("imageData", files[0]);
    $.ajax({
        url: url, // 图片上传url
        type: 'POST',
        data: imageData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',     // 以json的形式接收返回的数据
        // 图片上传成功
        success: function ($result) {
            var imgNode = document.createElement("img");
            imgNode.src = 'http://blog.54zm.com'+$result.img;
            //将图片信息存储起来
            var filename = files[0].name;
            var filesize = files[0].size;
            var mimetype = files[0].type;
            var filepath = '..'+$result.img;
            var filedata = 'filename='+filename+'&filesize='+filesize+'&mimetype='+mimetype+'&filepath='+filepath;
            $("#filedata").val(filedata);
            $summernote.summernote('insertNode', imgNode);
            toastr.success($result.msg);
        },
        // 图片上传失败
        error: function () {
            toastr.error('图片上传失败');
        }
    });
}

$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    console.log(a);
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};



function add_data(){
    var target = $("#post_url");
    var url = target.attr("action");
    var data = target.serializeObject();
    console.log(data);
    data.content = $(".summernote").summernote('code');
    $.post(url, data, function (json) {
        if (json.status == -1) {
            window.location.reload();
        } else if(json.status == 1) {
            toastr.success(json.data);
            setInterval(function(){
                window.location.reload();
            },3000);
            return false;
        }else{
            toastr.error(json.data);
            setInterval(function(){
                window.location.reload();
            },3000);
        }
    });
}