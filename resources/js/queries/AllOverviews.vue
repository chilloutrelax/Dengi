<template>
    <div>
        <div v-if="isLoggedIn">
            <div>
                <div v-if="loading">
                    <Loading></Loading>
                </div>
                <div v-else>
                    <div>
                        <div>
                            <AllOverviewsList
                                class="mt-2 pr-3 pl-3"
                            ></AllOverviewsList>
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
import AllOverviewUser from "./AllOverviewsUser";
import AllOverviewsList from "./AllOverviewsList/AllOverviewsList";
import Loading from "./../shared/loading/Loading";

import { mapState } from "vuex";

export default {
    components: {
        Loading,
        AllOverviewsList,
        AllOverviewUser
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
