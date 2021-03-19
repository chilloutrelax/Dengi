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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="thisMonth-tab"
                                data-toggle="tab"
                                href="#thisMonth"
                                role="tab"
                                aria-controls="thisMonth"
                                aria-selected="true"
                            >
                                <h6>Käesolev kuu</h6></a
                            >
                        </li>
                    </ul>
                    <div class="tab-content" id="overviews">
                        <div
                            class="tab-pane fade show active"
                            id="thisMonth"
                            role="tabpanel"
                            aria-labelledby="thisMonth-tab"
                        >
                            <OverviewListCurrent
                                :bind="overviews"
                            ></OverviewListCurrent>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";
import OverviewListCurrent from "./overviewLists/OverviewListCurrent";

export default {
    components: {
        OverviewUser,
        OverviewListCurrent,
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

<style scoped>
button.page-link {
    display: inline-block;
}
button.page-link {
    font-size: 20px;
    color: #29b3ed;
    font-weight: 500;
}
</style>
