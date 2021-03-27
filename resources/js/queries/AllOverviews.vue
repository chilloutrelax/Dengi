<template>
    <div>
        <div v-if="isLoggedIn">
            <div>
                <div v-if="loading">
                    <Loading></Loading>
                </div>
                <div v-else>
                    <div>
                        <div class="col-12">
                            <h6
                                class="text-muted text-uppercase text-center font-weight-bold mb-5"
                            >
                                KÕIK SISESTATUD ANDMED
                            </h6>
                        </div>
                    </div>
                    <div>
                        <div>
                            <AllOverviewsList></AllOverviewsList>
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
