import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import Queries from "./queries/Queries.vue";
import LoginComp from "./auth/Login.vue";

const routes = [
    {
        path: "/",
        component: Overview,
        name: "home"
    },
    {
        path: "/queries",
        component: Queries,
        name: "queries"
    },
    {
        path: "/auth/login",
        component: LoginComp,
        name: "login"
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
