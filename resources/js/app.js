/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

window.Vue = require('vue');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const vm = new Vue({
    el: '#app',
    components: {
        'example-component': ExampleComponent,
    },
    data: {
        "name": "dkr"
    }
});
