import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import Insert from "./insertion/Insert";


const routes = [
    {
        path: "/",
        component: Overview,
        name: "home"
    },
    {
        path: "/insert",
        component: Insert,
        name: "insert"
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;