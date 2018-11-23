$(document).ready(function () {
    $('.summernote').summernote({
        height: 600,
        minHeight: null,
        maxHeight: null,
        focus: true,
        prettifyHtml:true
    });
});

$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
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