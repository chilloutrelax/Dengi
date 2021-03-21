import VueRouter from "vue-router";
import Overview from "./overview/Overview";
import Insert from "./insertion/Insert";
import OverviewEdit from "./edit/OverviewEdit";
import Queries from "./queries/Queries.vue";

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
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
