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
                            <LastMonthList></LastMonthList>
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
import LastMonthList from "./QueriesList/LastMonthList";
import Loading from "../shared/loading/Loading";

import { mapState } from "vuex";

export default {
    components: {
        Loading,
        LastMonthList
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
