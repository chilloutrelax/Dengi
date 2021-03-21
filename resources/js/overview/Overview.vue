<template>
    <div>
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="m-2">
                <div class="row col-12">
                    <OverviewUser v-bind="user"></OverviewUser>
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
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>

<style scoped></style>
