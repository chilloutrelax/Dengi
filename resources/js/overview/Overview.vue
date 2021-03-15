<template>
    <div>
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="m-2">
                <div class="row col-12">
                    <div class="row user-data-list"></div>
                    <OverviewUser username="Riko M"></OverviewUser>

                    <div
                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-12 mb-5"
                    >
                        <div class="d-flex col justify-content-end">
                            <div class="col-6"></div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <router-link
                                    class="btn btn-warning btn-block"
                                    :to="{
                                        name: 'insert'
                                    }"
                                    >Lisa uus</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>

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
            users: null,
            columns: 1,

            loading: false
        };
    },
    computed: {
        rows() {
            return this.overviews == null
                ? 0
                : Math.ceil(this.overviews.length / this.columns);
        },
        totalIncome() {}
    },
    methods: {
        overviewsInColumn(column) {
            return this.overviews.slice(
                (column - 1) * this.rows,
                column * this.rows
            );
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
    }
};
</script>

<style scoped></style>
