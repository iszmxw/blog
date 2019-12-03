/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import Vue from 'vue';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import navbarList from './components/navbarList.vue';

Vue.use(ElementUI);


window.Vue = new Vue({
    el: '#app',
    data: {},
    components: {
        navbarList: navbarList
    },
    mounted() {
        console.log(this);
    }

});
