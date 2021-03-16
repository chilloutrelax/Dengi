require("./bootstrap");

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import Index from "./index";
import Vue from "vue";
import Pagination from "vue-pagination-2";

window.Vue = require("vue").default;
Vue.use(VueRouter);
Vue.use(Vuex);

Vue.component("pagination", Pagination);

const app = new Vue({
    el: "#app",
    router,
    components: {
        index: Index
    }
});
