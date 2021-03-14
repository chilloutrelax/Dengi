import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import Insert from "./insertion/Insert";
import OverviewEdit from "./edit/OverviewEdit";

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
    },
    {
        path: "/edit/:id",
        component: OverviewEdit,
        name: "edit"
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
