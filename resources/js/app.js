require("./bootstrap");

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import Index from "./index";
import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import vuexStore from "./store";

window.Vue = require("vue").default;
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(BootstrapVue);

const store = new Vuex.Store(vuexStore);

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        index: Index
    },

    async beforeCreate() {
        this.$store.dispatch("storageLoading");
    }
});
