<template>
    <div>
        <div v-if="isLoggedIn">
            <div>
                <div v-if="loading">
                    <Loading></Loading>
                </div>
                <div v-else>
                    <div class="m-2">
                        <div class="row col-12">
                            <OverviewUser></OverviewUser>
                        </div>

                        <div>
                            <OverviewCurrent></OverviewCurrent>
                        </div>
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
import OverviewListCurrent from "./overviewLists/OverviewListCurrent";
import OverviewCurrent from "./overviewLists/OverviewCurrent";
import { mapState } from "vuex";

export default {
    components: {
        OverviewUser,
        OverviewListCurrent,
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
