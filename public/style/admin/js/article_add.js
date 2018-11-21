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
        console.log(data);
        console.log(json);
        // if (json.status == -1) {
        //     window.location.reload();
        // } else if(json.status == 1) {
        //     console.log(data);
        //     console.log(json);
        //     toastr.success(json.data);
        //     // setInterval(function(){
        //     //     window.location.reload();
        //     // },3000);
        //     return false;
        // }else{
        //     // toastr.error(json.data);
        //     // setInterval(function(){
        //     //     window.location.reload();
        //     // },3000);
        // }
    });
}