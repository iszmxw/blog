(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-20b8a9d4"],{"0a49":function(t,e,n){var r=n("9b43"),o=n("626a"),i=n("4bf8"),a=n("9def"),c=n("cd1c");t.exports=function(t,e){var n=1==t,s=2==t,l=3==t,u=4==t,d=6==t,f=5==t||d,h=e||c;return function(e,c,p){for(var m,g,v=i(e),b=o(v),w=r(c,p,3),y=a(b.length),_=0,j=n?h(e,y):s?h(e,0):void 0;y>_;_++)if((f||_ in b)&&(m=b[_],g=w(m,_,v),t))if(n)j[_]=g;else if(g)switch(t){case 3:return!0;case 5:return m;case 6:return _;case 2:j.push(m)}else if(u)return!1;return d?-1:l||u?u:j}}},1169:function(t,e,n){var r=n("2d95");t.exports=Array.isArray||function(t){return"Array"==r(t)}},"18ea":function(t,e,n){},"386d":function(t,e,n){"use strict";var r=n("cb7c"),o=n("83a1"),i=n("5f1b");n("214f")("search",1,(function(t,e,n,a){return[function(n){var r=t(this),o=void 0==n?void 0:n[e];return void 0!==o?o.call(n,r):new RegExp(n)[e](String(r))},function(t){var e=a(n,t,this);if(e.done)return e.value;var c=r(t),s=String(this),l=c.lastIndex;o(l,0)||(c.lastIndex=0);var u=i(c,s);return o(c.lastIndex,l)||(c.lastIndex=l),null===u?-1:u.index}]}))},"54bf":function(t,e,n){},7514:function(t,e,n){"use strict";var r=n("5ca1"),o=n("0a49")(5),i="find",a=!0;i in[]&&Array(1)[i]((function(){a=!1})),r(r.P+r.F*a,"Array",{find:function(t){return o(this,t,arguments.length>1?arguments[1]:void 0)}}),n("9c6c")(i)},"83a1":function(t,e){t.exports=Object.is||function(t,e){return t===e?0!==t||1/t===1/e:t!=t&&e!=e}},8691:function(t,e,n){"use strict";n.d(e,"a",(function(){return o})),n.d(e,"b",(function(){return i})),n.d(e,"c",(function(){return a})),n.d(e,"d",(function(){return c})),n.d(e,"e",(function(){return s}));var r=n("b775");function o(t){return Object(r["a"])({url:"/article/article_add",method:"post",data:t})}function i(t){return Object(r["a"])({url:"/article/article_delete",method:"post",data:t})}function a(t){return Object(r["a"])({url:"/article/article_edit",method:"post",data:t})}function c(t){return Object(r["a"])({url:"/article/article_list",method:"post",data:t})}function s(t){return Object(r["a"])({url:"/article/article_one",method:"post",data:t})}},"97d8":function(t,e,n){"use strict";var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"main-editor",attrs:{id:t.id}},[n("link",{attrs:{href:"editor.md/css/editormd.css",rel:"stylesheet"}}),t._v(" "),n("link",{attrs:{href:"prism/prism.css",rel:"stylesheet"}}),t._v(" "),n("textarea",{staticStyle:{display:"none"},domProps:{innerHTML:t._s(t.content)}}),t._v(" "),t.showImg?n("BigImg",{attrs:{"img-src":t.imgSrc},on:{clickit:function(e){t.showImg=!1}}}):t._e()],1)},o=[],i=(n("28a5"),n("386d"),n("a481"),n("6b54"),n("7514"),n("a23c")),a=n.n(i),c=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("transition",{attrs:{name:"fade"}},[n("div",{staticClass:"img-view",on:{click:t.bigImg}},[n("div",{staticClass:"img-layer"}),t._v(" "),n("div",{staticClass:"img"},[n("img",{attrs:{src:t.imgSrc}})])])])},s=[],l={props:["imgSrc"],methods:{bigImg:function(){this.$emit("clickit")}}},u=l,d=(n("a7f1"),n("2877")),f=Object(d["a"])(u,c,s,!1,null,"4c56e19e",null),h=f.exports,p={name:"Editor",components:{BigImg:h},props:{content:{type:String,default:"###初始化成功"},type:{type:String,default:"editor"},keyword:{type:String,default:""},id:{type:String,default:"editor-md"},editorConfig:{type:Object,default:function(){var t=this;return{path:"editor.md/lib/",placeholder:"请使用 Markdown 语法",lineNumbers:!0,previewCodeHighlight:!1,height:1e3,taskList:!0,tex:!0,flowChart:!0,sequenceDiagram:!0,syncScrolling:"single",htmlDecode:!0,imageUpload:!0,imageFormats:["jpg","jpeg","gif","png","bmp","webp","JPG","JPEG","GIF","PNG","BMP","WEBP"],imageUploadURL:"/api/page/uploadImg",onload:function(){console.log("onload")},toolbarIcons:function(){return["undo","redo","|","bold","del","italic","quote","|","toc","flow","h1","h2","h3","h4","h5","h6","|","list-ul","list-ol","hr","center","|","link","reference-link","image","video","code","code-block","table","datetime","html-entities","pagebreak","|","watch","preview","fullscreen","clear","search","|","help","info"]},toolbarIconsClass:{toc:"fa-bars ",flow:"fa-sitemap ",video:"fa-file-video-o",center:"fa-align-center"},toolbarHandlers:{toc:function(t){t.setCursor(0,0),t.replaceSelection("[TOC]\r\n\r\n")},video:function(t,e,n,r){t.replaceSelection('\r\n<video src="http://your-site.com/your.mp4" style="width: 100%; height: 100%;" controls="controls"></video>\r\n'),""===r&&t.setCursor(n.line,n.ch+1)},flow:function(t,e,n,r){var o="\n```flow\nst=>start: 用户登陆\nop=>operation: 登陆操作\ncond=>condition: 登陆成功 Yes or No?\ne=>end: 进入后台\n\nst->op->cond\ncond(yes)->e\ncond(no)->op\n```\n                          ";t.replaceSelection(o),""===r&&t.setCursor(n.line,n.ch+1)},center:function(t,e,n,r){t.replaceSelection("<center>"+r+"</center>"),""===r&&t.setCursor(n.line,n.ch+1)}},lang:{toolbar:{toc:"在最开头插入TOC，自动生成标题目录",flow:"插入思维导图",video:"插入视频",center:"居中"}},onchange:function(){t.deal_with_content()}}}}},data:function(){return{instance:null,showImg:!1,imgSrc:""}},computed:{},mounted:function(){var t=this;a()(["js/jquery.min.js","prism/prism.js","editor.md/lib/raphael.min.js","editor.md/lib/flowchart.min.js"],(function(){a()(["js/xss.min.js","editor.md/lib/marked.min.js","editor.md/lib/prettify.min.js","editor.md/lib/underscore.min.js","editor.md/lib/sequence-diagram.min.js","editor.md/lib/jquery.flowchart.min.js"],(function(){a()("editor.md/editormd.js",(function(){t.initEditor()}))}))}))},beforeDestroy:function(){for(var t=1;t<999;t++)window.clearInterval(t)},methods:{initEditor:function(){var t=this;this.$nextTick((function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:window.editormd;e&&("editor"==t.type?t.instance=e(t.id,t.editorConfig):t.instance=e.markdownToHTML(t.id,t.editorConfig),t.deal_with_content())}))},insertValue:function(t){this.instance.insertValue(this.html_decode(t))},setCursor:function(t,e){this.instance.setCursor(t,e)},getMarkdown:function(){return this.instance.getMarkdown()},editor_unwatch:function(){return this.instance.unwatch()},editor_watch:function(){return this.instance.watch()},clear:function(){return this.instance.clear()},draft:function(){var t=this;setInterval((function(){localStorage.page_content=t.getMarkdown()}),6e4);var e=localStorage.page_content;e&&e.length>0&&(localStorage.removeItem("page_content"),t.$confirm(t.$t("draft_tips"),"",{showClose:!1}).then((function(){t.clear(),t.insertValue(e),localStorage.removeItem("page_content")})).catch((function(){localStorage.removeItem("page_content")})))},beforeunloadHandler:function(t){return t=t||window.event,t&&(t.returnValue="提示"),"提示"},deal_with_content:function(){var t=this;$.each($("#"+this.id+" table"),(function(){$(this).prop("outerHTML",'<div style="width: 100%;overflow-x: auto;">'+$(this).prop("outerHTML")+"</div>")})),$("#"+this.id+' a[href^="http"]').click((function(){var e=$(this).attr("href"),n=t.parseURL(e);return window.location.hostname==n.hostname&&window.location.pathname==n.pathname?(window.location.href=e,n.hash&&window.location.reload()):window.open(e),!1}));var e=$("#"+this.id+" p").width();e=e||722,$("#"+this.id+" table").each((function(){var t=$(this).get(0),n=t.rows.item(0).cells.length,r=Math.floor(e/n)-2;n<=5&&$(this).find("th").css("width",r.toString()+"px")})),$("#"+this.id+" img").click((function(){var e=$(this).attr("src");t.showImg=!0,t.imgSrc=e})),this.keyword&&$("#"+this.id).mark(this.keyword),Prism.highlightAll()},html_decode:function(t){var e="";return 0==t.length?"":(e=t.replace(/&gt;/g,"&"),e=e.replace(/&lt;/g,"<"),e=e.replace(/&gt;/g,">"),e=e.replace(/&nbsp;/g," "),e=e.replace(/&#39;/g,"'"),e=e.replace(/&quot;/g,'"'),e)},parseURL:function(t){var e=document.createElement("a");return e.href=t,{source:t,protocol:e.protocol.replace(":",""),host:e.hostname,hostname:e.hostname,port:e.port,query:e.search,params:function(){for(var t,n={},r=e.search.replace(/^\?/,"").split("&"),o=r.length,i=0;i<o;i++)r[i]&&(t=r[i].split("="),n[t[0]]=t[1]);return n}(),hash:e.hash.replace("#",""),path:e.pathname.replace(/^([^\/])/,"/$1"),pathname:e.pathname.replace(/^([^\/])/,"/$1")}}}},m=p,g=Object(d["a"])(m,r,o,!1,null,null,null);e["a"]=g.exports},a23c:function(t,e,n){var r,o;
/*!
  * $script.js JS loader & dependency manager
  * https://github.com/ded/script.js
  * (c) Dustin Diaz 2014 | License MIT
  */(function(i,a){t.exports?t.exports=a():(r=a,o="function"===typeof r?r.call(e,n,e,t):r,void 0===o||(t.exports=o))})(0,(function(){var t,e,n=document,r=n.getElementsByTagName("head")[0],o=!1,i="push",a="readyState",c="onreadystatechange",s={},l={},u={},d={};function f(t,e){for(var n=0,r=t.length;n<r;++n)if(!e(t[n]))return o;return 1}function h(t,e){f(t,(function(t){return e(t),1}))}function p(e,n,r){e=e[i]?e:[e];var o=n&&n.call,a=o?n:r,c=o?e.join(""):n,g=e.length;function v(t){return t.call?t():s[t]}function b(){if(!--g)for(var t in s[c]=1,a&&a(),u)f(t.split("|"),v)&&!h(u[t],v)&&(u[t]=[])}return setTimeout((function(){h(e,(function e(n,r){return null===n?b():(r||/^https?:\/\//.test(n)||!t||(n=-1===n.indexOf(".js")?t+n+".js":t+n),d[n]?(c&&(l[c]=1),2==d[n]?b():setTimeout((function(){e(n,!0)}),0)):(d[n]=1,c&&(l[c]=1),void m(n,b)))}))}),0),p}function m(t,o){var i,s=n.createElement("script");s.onload=s.onerror=s[c]=function(){s[a]&&!/^c|loade/.test(s[a])||i||(s.onload=s[c]=null,i=1,d[t]=2,o())},s.async=1,s.src=e?t+(-1===t.indexOf("?")?"?":"&")+e:t,r.insertBefore(s,r.lastChild)}return p.get=m,p.order=function(t,e,n){(function r(o){o=t.shift(),t.length?p(o,r):p(o,e,n)})()},p.path=function(e){t=e},p.urlArgs=function(t){e=t},p.ready=function(t,e,n){t=t[i]?t:[t];var r=[];return!h(t,(function(t){s[t]||r[i](t)}))&&f(t,(function(t){return s[t]}))?e():function(t){u[t]=u[t]||[],u[t][i](e),n&&n(r)}(t.join("|")),p},p.done=function(t){p([null],t)},p}))},a7f1:function(t,e,n){"use strict";n("54bf")},c405:function(t,e,n){"use strict";n.d(e,"d",(function(){return o})),n.d(e,"a",(function(){return i})),n.d(e,"b",(function(){return a})),n.d(e,"c",(function(){return c}));var r=n("b775");function o(t){return Object(r["a"])({url:"/category/category_list",method:"post",params:t})}function i(t){return Object(r["a"])({url:"/category/category_add",method:"post",data:t})}function a(t){return Object(r["a"])({url:"/category/category_delete",method:"post",data:t})}function c(t){return Object(r["a"])({url:"/category/category_edit",method:"post",data:t})}},cd1c:function(t,e,n){var r=n("e853");t.exports=function(t,e){return new(r(t))(e)}},e853:function(t,e,n){var r=n("d3f4"),o=n("1169"),i=n("2b4c")("species");t.exports=function(t){var e;return o(t)&&(e=t.constructor,"function"!=typeof e||e!==Array&&!o(e.prototype)||(e=void 0),r(e)&&(e=e[i],null===e&&(e=void 0))),void 0===e?Array:e}},e8aa:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"mixin-components-container"},[n("el-row",[n("el-card",{staticClass:"box-card"},[n("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[n("span",{staticStyle:{float:"left"}},[t._v("添加文档")]),t._v(" "),n("span",{staticStyle:{float:"right"}},[n("router-link",{attrs:{to:"/articles/list"}},[n("el-button",{attrs:{type:"primary"}},[t._v("返回列表")])],1)],1)]),t._v(" "),n("div",{staticStyle:{"margin-bottom":"50px"}},[n("div",{staticClass:"createPost-container"},[n("el-form",{ref:"postForm",staticClass:"form-container",attrs:{model:t.postForm}},[n("el-form-item",{staticStyle:{"margin-bottom":"30px"},attrs:{prop:"content"}},[n("el-input",{attrs:{placeholder:"请输入标题"},model:{value:t.postForm.title,callback:function(e){t.$set(t.postForm,"title",e)},expression:"postForm.title"}})],1),t._v(" "),n("el-form-item",[n("el-select",{staticStyle:{width:"100%"},attrs:{placeholder:"请选择栏目分类"},model:{value:t.postForm.category_id,callback:function(e){t.$set(t.postForm,"category_id",e)},expression:"postForm.category_id"}},t._l(t.category_list,(function(t){return n("el-option",{key:t.id,attrs:{label:t.name,value:t.id}})})),1)],1),t._v(" "),n("el-form-item",{staticStyle:{"margin-bottom":"30px"},attrs:{prop:"content"}},[n("Editormd",{ref:"Editormd",attrs:{content:t.postForm.content,type:"editor",height:400}})],1),t._v(" "),n("el-form-item",{staticStyle:{"text-align":"center"}},[n("el-button",{attrs:{type:"warning"},on:{click:function(e){return t.handlecreate(0)}}},[t._v("保存草稿")]),t._v(" "),n("el-button",{attrs:{type:"primary"},on:{click:function(e){return t.handlecreate(1)}}},[t._v("立即发布")])],1)],1)],1)])])],1)],1)},o=[],i=n("c80c"),a=(n("96cf"),n("3b8d")),c=n("97d8"),s=n("8691"),l=n("c405"),u={components:{Editormd:c["a"]},data:function(){return{category_list:[],postForm:{title:"",category_id:"",content:"",status:""}}},mounted:function(){this.getData()},methods:{getData:function(){var t=this;Object(l["d"])().then((function(e){200===e.code&&(t.category_list=e.data.data,t.tableData=e.data.data)}))},handlecreate:function(t){var e,n=this;this.postForm.status=t,e=1===t?"确定要发布该文档吗?":"确定保存为草稿吗?",this.$confirm(e,"温馨提示",{confirmButtonText:"OK",cancelButtonText:"取消",type:"warning"}).then(Object(a["a"])(Object(i["a"])().mark((function t(){var e,r;return Object(i["a"])().wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e=n.$refs.Editormd,n.postForm.content=e.getMarkdown(),t.next=4,Object(s["a"])(n.postForm);case 4:r=t.sent,200===r.code&&(n.$message({type:"success",message:r.message}),n.$router.push("/articles/list"));case 6:case"end":return t.stop()}}),t)})))).catch((function(t){console.error(t)}))}}},d=u,f=(n("fd53"),n("2877")),h=Object(f["a"])(d,r,o,!1,null,"50b63be5",null);e["default"]=h.exports},fd53:function(t,e,n){"use strict";n("18ea")}}]);