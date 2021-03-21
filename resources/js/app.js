require("./bootstrap");

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import Index from "./index";
import Vue from "vue";
import BootstrapVue from "bootstrap-vue";

window.Vue = require("vue").default;
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(BootstrapVue);

const store = new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        increment(state) {
            state.count++;
            console.log(state);
            state.count++;
        }
    }
});

store.commit("increment");

console.log(store.state.count);

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        index: Index
    }
});
