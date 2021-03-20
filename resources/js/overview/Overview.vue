<template>
    <div>
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="m-2">
                <div class="row col-12">
                    <div class="row user-data-list"></div>
                    <OverviewUser v-bind="user"></OverviewUser>

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

                <div>
                    <OverviewCurrent></OverviewCurrent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";
import OverviewListCurrent from "./overviewLists/OverviewListCurrent";
import OverviewCurrent from "./overviewLists/OverviewCurrent";

export default {
    components: {
        OverviewUser,
        OverviewListCurrent,
        OverviewCurrent,
        Loading
    },

    data() {
        return {
            overviews: null,
            user: [
                {
                    name: "Riko",
                    age: "30"
                }
            ],

            loading: false
        };
    },
    computed: {},
    methods: {},

    created() {
        this.loading = true;

        axios
            .get("/api/overviews")
            .then(response => {
                this.overviews = response.data.data;
                this.loading = false;
            })
            .catch(error => console.log(error.response.data));

        return this.overviews;
    },
    updated() {}
};
</script>

<style scoped></style>
