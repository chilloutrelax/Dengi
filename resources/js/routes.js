import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import Queries from "./queries/Queries";
import Login from "./auth/Login";
import Register from "./auth/Register";

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
        component: Login,
        name: "login"
    },
    {
        path: "/auth/register",
        component: Register,
        name: "register"
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
