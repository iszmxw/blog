(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-146fd17f"],{"26be":function(e,t,r){"use strict";r("4812")},4812:function(e,t,r){},"576c":function(e,t,r){"use strict";r.d(t,"a",(function(){return n})),r.d(t,"b",(function(){return l})),r.d(t,"c",(function(){return i})),r.d(t,"d",(function(){return a})),r.d(t,"e",(function(){return s}));var o=r("b775");function n(e){return Object(o["a"])({url:"/serve/link/link_add",method:"post",data:e})}function l(e){return Object(o["a"])({url:"/serve/link/link_delete",method:"post",data:e})}function i(e){return Object(o["a"])({url:"/serve/link/link_edit",method:"post",data:e})}function a(e){return Object(o["a"])({url:"/serve/link/link_list",method:"post",data:e})}function s(e){return Object(o["a"])({url:"/serve/link/link_one",method:"post",data:e})}},b38a:function(e,t,r){"use strict";r.r(t);var o=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("el-main",[r("el-card",{staticClass:"box-card"},[r("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[r("span",[e._v("添加友链")])]),e._v(" "),r("el-form",{ref:"form",staticClass:"form",attrs:{model:e.form,"label-width":"120px"}},[r("el-form-item",{attrs:{label:"友链标题："}},[r("el-input",{model:{value:e.form.sitename,callback:function(t){e.$set(e.form,"sitename",t)},expression:"form.sitename"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"友链描述："}},[r("el-input",{attrs:{type:"textarea",rows:"10"},model:{value:e.form.description,callback:function(t){e.$set(e.form,"description",t)},expression:"form.description"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"隐藏："}},[r("el-select",{attrs:{placeholder:"请设置"},model:{value:e.form.hide,callback:function(t){e.$set(e.form,"hide",t)},expression:"form.hide"}},[r("el-option",{attrs:{label:"隐藏",value:"y"}}),e._v(" "),r("el-option",{attrs:{label:"显示",value:"n"}})],1)],1),e._v(" "),r("el-form-item",{attrs:{label:"网站地址："}},[r("el-input",{model:{value:e.form.siteurl,callback:function(t){e.$set(e.form,"siteurl",t)},expression:"form.siteurl"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"网站LOGO："}},[r("el-input",{model:{value:e.form.logo,callback:function(t){e.$set(e.form,"logo",t)},expression:"form.logo"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"备案号"}},[r("el-input",{model:{value:e.form.icp,callback:function(t){e.$set(e.form,"icp",t)},expression:"form.icp"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"排序"}},[r("el-input",{model:{value:e.form.order,callback:function(t){e.$set(e.form,"order",t)},expression:"form.order"}})],1),e._v(" "),r("el-form-item",[r("el-button",{attrs:{type:"primary"},on:{click:e.onSubmit}},[e._v("保存更改")])],1)],1)],1)],1)},n=[],l=r("576c"),i={data:function(){return{form:{}}},mounted:function(){this.getData({id:this.$route.query.link_id})},methods:{getData:function(e){var t=this;Object(l["e"])(e).then((function(e){200===e.code&&(t.form=e.data)}))},onSubmit:function(){var e=this;Object(l["c"])(this.form).then((function(t){200===t.code&&(e.$notify({title:"提示",message:t.message,type:"success"}),e.$router.push("/serve/link/link_list"))}))}}},a=i,s=(r("26be"),r("2877")),c=Object(s["a"])(a,o,n,!1,null,"6cdfda88",null);t["default"]=c.exports}}]);