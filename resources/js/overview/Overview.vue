<template>
    <div class="">
        <div v-if="isLoggedIn">
            <div v-if="loading">
                <Loading></Loading>
            </div>
            <div v-else>
                <div class="w-100 padding-none">
                    <div class="container pb-3">
                        <OverviewUser></OverviewUser>
                    </div>
                </div>
                <div>
                    <div class="mt-4 pr-3 pl-3">
                        <OverviewCurrent></OverviewCurrent>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="!isLoggedIn">
            <Welcome></Welcome>
        </div>
    </div>
</template>

<script>
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";
import OverviewCurrent from "./overviewLists/OverviewCurrent";
import Welcome from "./welcome/Welcome";
import { mapState } from "vuex";

export default {
    components: {
        OverviewUser,
        OverviewCurrent,
        Loading,
        Welcome
    },

    data() {
        return {
            loading: false
        };
    },
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn"
        })
    },
    methods: {},

    created() {
        this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>

<style scoped>
.padding-none {
    padding: 20px 0 20px 0;
    /* background: #e7ce88;
    background: -webkit-linear-gradient(top, #e7ce88, #fcfcfc);
    background: -moz-linear-gradient(top, #e7ce88, #fcfcfc);
    background: linear-gradient(to bottom, #e7ce88, #fcfcfc); */

    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
}
</style>
