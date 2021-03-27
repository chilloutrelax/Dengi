import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import AllOverviews from "./queries/AllOverviews";
import Login from "./auth/Login";
import Register from "./auth/Register";
import Account from "./user/Account.vue";

const routes = [
    {
        path: "/",
        component: Overview,
        name: "home"
    },
    {
        path: "/alloverviews",
        component: AllOverviews,
        name: "alloverviews"
    },
    {
        path: "/auth/login",
        component: Login,
        name: "login"
    },
    {
        path: "/auth/register",
        component: Register,
        name: "register"
    },
    {
        path: "/account",
        component: Account,
        name: "account"
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
