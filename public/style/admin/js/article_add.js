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
            toastr.success("祝贺你添加成功了！");
            setInterval(function(){
                window.location.reload();
            },300);
            return false;
        }else{
            toastr.error("添加失败请稍后再试！");
            setInterval(function(){
                window.location.reload();
            },300);
        }
    });
}