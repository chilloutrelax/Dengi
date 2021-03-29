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
            <div class="backie">
                <div class="container">
                    <div class="row padding-tops">
                        <div class="col text-center fa-proov poopadi">
                            <i class="fas fa-exclamation-circle"></i>
                            <h6
                                class="text-uppercase text-muted font-weight-bold"
                            >
                                Lehe nägemiseks logige palun sisse! <br />
                                Vajutage siia, et minna
                                <a href="/">esilehele</a>.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AllOverviewsList from "./AllOverviewsList/AllOverviewsList";
import Loading from "./../shared/loading/Loading";

import { mapState } from "vuex";

export default {
    components: {
        Loading,
        AllOverviewsList
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
.fa-exclamation-circle {
    color: rgb(173, 21, 21);
    font-size: 80px;
    margin-bottom: 20px;
}

.fa-proov {
    font-size: 15px;
}

.backie {
    width: 100vw;
    height: 100vh;
    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
}
</style>
