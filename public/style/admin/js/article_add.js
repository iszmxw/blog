$(document).ready(function () {
    $('.summernote').summernote({
        height: 600,
        minHeight: null,
        maxHeight: null,
        focus: true
    });
});

function add_data(){
    var target = $("#post_url");
    var url = target.attr("action");
    var data = target.serialize();
    var summernote = $(".summernote").summernote('code');
    data = data +'&'+'content='+summernote;
    $.post(url, data, function (json) {
        if (json.status == -1) {
            window.location.reload();
        } else if(json.status == 1) {
            Command: toastr[success]("嗨，欢迎来到网豫游戏。我是演示。");
            // swal({
            //     title: "提示信息",
            //     text: json.data,
            //     confirmButtonColor: "#DD6B55",
            //     confirmButtonText: "确定",
            // },function(){
            //     window.location.reload();
            // });
        }else{
            // swal({
            //     title: "提示信息",
            //     text: json.data,
            //     confirmButtonColor: "#DD6B55",
            //     confirmButtonText: "确定"
            // });
        }
    });
}