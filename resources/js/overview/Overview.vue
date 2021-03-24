<template>
    <div class="">
        <div v-if="isLoggedIn">
            <div v-if="loading">
                <Loading></Loading>
            </div>
            <div v-else>
                <div class="container">
                    <div class="">
                        <OverviewUser></OverviewUser>
                    </div>
                </div>
                <div>
                    <div>
                        <OverviewCurrent></OverviewCurrent>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="!isLoggedIn">
            <div class="card">
                <div class="card-body">
                    Sa ei ole sisse logitud.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";
import OverviewCurrent from "./overviewLists/OverviewCurrent";
import { mapState } from "vuex";

export default {
    components: {
        OverviewUser,
        OverviewCurrent,
        Loading
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

<style scoped></style>
