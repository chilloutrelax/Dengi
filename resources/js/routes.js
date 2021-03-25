import VueRouter from "vue-router";
import Overview from "./overview/Overview";
// import LastMonth from "./queries/lastMonth";
import Login from "./auth/Login";
import Register from "./auth/Register";

const routes = [
    {
        path: "/",
        component: Overview,
        name: "home"
    },
    // {
    //     path: "/lastMonth",
    //     component: LastMonth,
    //     name: "lastMonth"
    // },
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
    mode: "hash",
    routes
});

export default router;
