$(function () {
    $('pre code').each(function () {
        $(this).before("<a href='javascript:;' class='copyCodeBtn'>复制</a>")
    })
    $('#articleContent').on('mouseenter', 'pre', function () {
        $(this).children(".copyCodeBtn").show();
    });
    $('#articleContent').on('mouseleave', 'pre', function () {
        $(this).children(".copyCodeBtn").hide();
    });
    $('#articleContent').on('click', '.copyCodeBtn', function () {
        var content = $(this).siblings("code").text();
        new Clipboard('.copyCodeBtn', {
            text: function () {
                return content;
            }
        });
        lay_notice.success('复制成功');
    });
    // toc导航
    var toc = $("#toc").tocify({
        context: "article",
        selectors: "h2,h3",
        extendPage: false
    });
    var tocHtml = toc[0];
    if (tocHtml.getElementsByTagName("li").length > 0) {
        $("#toxBox").show();
    } else {
        $("#toxBox").hide();
    }
    //初始化layui相关
    layui.config({
        base: window.location.origin + '/style/web/iszmxw_simple_pro/static/plugins/laynotice/'
    });
    layui.use(['layedit', 'form', 'jquery', 'notice'], function () {
        var layedit = layui.layedit, form = layui.form, $ = layui.jquery, lay_notice = layui.notice;
        //建立编辑器
        var edit = layedit.build('revert', {
            height: 120,
            tool: ['strong', 'italic', 'underline', 'del', 'link', 'face']
        });
        //利用表单验证将编辑器值赋予textarea
        form.verify({
            content: function (value, item) {
                layedit.sync(edit);
            }
        });
        var pRevertContent, pRevertAuthor, pRevertCreated, pRevertAvatar;
        // 监听回复按钮点击事件
        $('.p-article-revert-container').on('click', '.p-revert-btn', function () {
            $('#revertPid').val($(this).attr('data-cid'));
            $('#revert').val('回复 @' + $(this).attr('data-author') + " ：");
            edit = layedit.build('revert', {
                tool: ['strong', 'italic', 'underline', 'del', 'link', 'face'],
                height: 120
            });
            //记录父级评论内容
            pRevertContent = $(this).siblings(".p-revert-content").text();
            pRevertAuthor = $(this).siblings(".p-revert-user").children(".p-article-revert-container-right").children(".p-revert-user-name").text();
            pRevertCreated = $(this).siblings(".p-revert-user").children(".p-article-revert-container-right").children(".p-revert-time").text();
            pRevertAvatar = $(this).siblings(".p-revert-user").children("img").attr("src");
            $('#revert').focus();
        });
        //监听form提交
        form.on('submit(comment)', function (data) {
            var content = layedit.getContent(edit);
            if (content == null || content == "" || content == undefined) {
                lay_notice.error('请填写评论内容');
                return false;
            }
            var captcha = $(".captcha").val();
            var str = '回复 @' + pRevertAuthor + " ：";
            var revertContent = $("#revert").val();
            //判断回复是否存在
            if (!new RegExp(str).test(revertContent)) {
                $('#revertPid').val('');
            } else {
                revertContent = revertContent.replace(str, '');
            }
            $.ajax({
                type: "post",
                url: "/blog/api/comment",
                data: {
                    articleId: $("#articleId").val(),
                    pid: $('#revertPid').val(),
                    content: revertContent,
                    captcha: captcha
                },
                success: function (result) {
                    console.log(result);
                    console.log(data);
                    if (result.status === 1) {
                        var avatarUrl;
                        var author;
                        if (result.user != null) {
                            avatarUrl = result.user.avatar;
                            author = result.comment.author;
                        } else {
                            avatarUrl = "/templates/jpress-perfree-simple/static/img/user.jpeg";
                            author = "匿名用户";
                        }
                        //清空编辑器
                        layedit.clearContent(edit);
                        var pid = $("#revertPid").val();
                        var html = '<div class="p-article-revert-box">' +
                            '                <div class="p-article-revert-container layui-clear">' +
                            '                    <div class="p-revert-user layui-clear">' +
                            '                        <img src="' + avatarUrl + '" alt="" class="p-user-img">' +
                            '                        <div class="p-article-revert-container-right">' +
                            '                            <span class="p-revert-user-name">' + author + '</span>' +
                            '                            <span class="p-revert-time">' + result.comment.created + '</span>' +
                            '                        </div>' +
                            '                    </div>' +
                            '                    <div class="p-revert-content">' + result.comment.text + '</div>' +
                            '                    <a href="javascript:;" data-cid="' + result.comment.id + '" data-author="' + author + '" class="p-revert-btn">回复</a>' +
                            '                </div>';
                        if (pid != '') {
                            html += '<div class="p-article-revert-container p-revert-child layui-clear">' +
                                '                    <div class="p-revert-user layui-clear">' +
                                '                        <img src="' + pRevertAvatar + '" alt="" class="p-user-img">' +
                                '                        <div class="p-article-revert-container-right">' +
                                '                            <span class="p-revert-user-name">' + pRevertAuthor + '</span>' +
                                '                            <span class="p-revert-time">' + pRevertCreated + '</span>' +
                                '                        </div>' +
                                '                    </div>' +
                                '                    <div class="p-revert-content">' + pRevertContent + '</div>' +
                                '                    <a href="javascript:;" data-cid="' + result.comment.id + '" data-author="' + author + '" class="p-revert-btn">回复</a>' +
                                '                </div>';
                        }
                        html += '</div>';
                        lay_notice.success("评论成功");
                        $("#allComment").prepend(html);
                        $(".captcha").val("");
                        $(".comment-verify").attr("src", '/commons/captcha?d=' + Math.random());
                    } else {
                        lay_notice.error('评论失败:' + result.data + '，点击右上角进行登录');
                        $(".captcha").val("");
                        $(".comment-verify").attr("src", '/commons/captcha?d=' + Math.random());
                        if (result.status === 0) {
                            location.href = '/wall/register';
                        }
                    }
                    return false;
                },
                error: function () {
                    lay_notice.error('网络错误，请稍后重试');
                    $(".captcha").val("");
                    $(".comment-verify").attr("src", '/commons/captcha?d=' + Math.random());
                    return false;
                }
            });
            return false;
        });
    });

    layer.photos({
        photos: '#articleContent',
        anim: 5
    });
})