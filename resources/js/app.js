require("./bootstrap");

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import Index from "./index";
import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import vuexStore from "./store";

import moment from "moment";

window.Vue = require("vue").default;
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(BootstrapVue);

Vue.filter("formatDate", function(value) {
    if (value) {
        return moment(String(value)).format("DD/MM/YYYY - hh:mm");
    }
});

const store = new Vuex.Store(vuexStore);

window.axios.interceptors.response.use(
    response => response,
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }

        return Promise.reject(error);
    }
);

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        index: Index
    },

    async beforeCreate() {
        this.$store.dispatch("headerFix");
        this.$store.dispatch("loadUser");
    }
});
