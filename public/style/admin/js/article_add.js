$(document).ready(function () {
    $('.summernote').summernote({
        height: 600,
        minHeight: null,
        maxHeight: null,
        focus: true
    });
});

//成功提示绑定

$("#success").click(function(){

    toastr.success("祝贺你成功了");

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
            toastr.success('没有任何选择','简单的通知!');
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