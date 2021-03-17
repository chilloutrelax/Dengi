require("./bootstrap");

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import Index from "./index";
import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

window.Vue = require("vue").default;
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.component("pagination", require("laravel-vue-pagination"));

const app = new Vue({
    el: "#app",
    router,
    components: {
        index: Index
    }
});
