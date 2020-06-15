(function($){
    var common = function(){}
    common.prototype = {
        getRandomColor:function(){
            return "rgb(" + Math.round(Math.random() * 255) + "," + Math.round(Math.random() * 255) + ',' + Math.round(Math.random() * 10) + ')';
        }
    }
    window.common = new common();
})(window.jQuery);