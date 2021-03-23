<template>
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a
                    class="nav-link active"
                    id="home-tab"
                    data-toggle="tab"
                    href="#home"
                    role="tab"
                    aria-controls="home"
                    aria-selected="true"
                    @click="overview"
                    >Käesolev kuu</a
                >
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    id="profile-tab"
                    data-toggle="tab"
                    href="#profile"
                    role="tab"
                    aria-controls="profile"
                    aria-selected="false"
                    @click="lastMonth"
                    >Eelmine kuu</a
                >
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    id="contact-tab"
                    data-toggle="tab"
                    href="#contact"
                    role="tab"
                    aria-controls="contact"
                    aria-selected="false"
                    >Aasta</a
                >
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
            ></div>
            <div
                class="tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
            >
                <div class="overview-list col-12">
                    <OverviewHeaders></OverviewHeaders>
                </div>
                <div
                    class="overview-list-fetch col-12"
                    v-for="column in columns"
                    :key="'column' + column"
                >
                    <div
                        class="d-flex align-items-stretch row"
                        v-for="(overview, row) in overviewsInColumn(column)"
                        :key="'row' + row + column"
                    >
                        <OverviewItem v-bind="overview"></OverviewItem>
                    </div>
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="contact"
                role="tabpanel"
                aria-labelledby="contact-tab"
            >
                ...
            </div>
        </div>
    </div>
</template>

<script>
import OverviewItem from "./OverviewItem";
import OverviewHeaders from "./OverviewHeaders";
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";

export default {
    components: {
        OverviewHeaders,
        OverviewItem,
        OverviewUser,
        Loading
    },
    data() {
        return {
            overviews: null,
            columns: 1,
            page: 1,

            loading: false
        };
    },
    computed: {
        rows() {
            return this.overviews == null
                ? 0
                : Math.ceil(this.overviews.length / this.columns);
        }
    },
    methods: {
        overviewsInColumn(column) {
            return this.overviews.slice(
                (column - 1) * this.rows,
                column * this.rows
            );
        },
        lastMonth() {
            this.loading = true;

            axios
                .get("/api/overviews")
                .then(response => {
                    this.overviews = response.data.data;
                    this.loading = false;
                })
                .catch(error => console.log(error.response.data));
        }
    },

    created() {
        this.loading = true;

        axios
            .get("/api/overviews")
            .then(response => {
                this.overviews = response.data.data;
                this.loading = false;
            })
            .catch(error => console.log(error.response.data));
    },
    mounted() {}
};
</script>
