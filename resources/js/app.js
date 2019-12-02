/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('./bootstrap');

import Vue from 'vue';

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

Vue.component('Example', require('./components/Example.vue').default);

const vm = new Vue({
    el: '#app',
    data: {
        "name": "dkr"
    },
    components: {
        Example: Example
    },
    mounted() {
        console.log(this);
    }

});
