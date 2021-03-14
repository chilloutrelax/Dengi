<template>
    <div>
        Rows is : {{ rows }}
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="m-2">
                <div class="row col-12">
                    <div class="row user-data-list"></div>
                    <OverviewUser
                        :username="user.username"
                        v-for="(user, index) in users"
                        :key="index"
                    ></OverviewUser>

                    <div
                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-12 mb-5"
                    >
                        <div class="d-flex col justify-content-end">
                            <div class="col-6"></div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <router-link
                                    class="btn btn-warning btn-block"
                                    :to="{ name: 'insert' }"
                                    >Lisa uus</router-link
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overview-list col-12">
                    <OverviewHeaders></OverviewHeaders>
                </div>
                <div
                    class="overview-list-fetch col-12"
                    v-for="column in columns"
                    :key="'column' + column"
                >
                    <div
                        class="row"
                        v-for="(overview, row) in overviews.slice(
                            (columns - 1) * rows,
                            column * rows
                        )"
                        :key="'row' + row + column"
                    >
                        <OverviewItem
                            :date="overview.date"
                            :money="overview.money"
                            :type="overview.type"
                            :comment="overview.comment"
                        ></OverviewItem>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OverviewItem from "./OverviewItem";
import OverviewHeaders from "./OverviewHeaders";
import OverviewUser from "./OverviewUser";
import Loading from "../shared/loading/Loading";

export default {
    components: {
        OverviewHeaders,
        OverviewItem,
        OverviewUser,
        Loading
    },

    data() {
        return {
            overviews: null,
            users: null,
            columns: 1,

            loading: false
        };
    },
    computed: {
        rows() {
            return this.overviews == null
                ? 0
                : Math.ceil(this.overviews.length / this.columns);
        }
    },
    methods: {},
    created() {
        this.loading = true;
        setTimeout(() => {
            this.overviews = [
                {
                    date: "2021-05-10",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli koju"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                },
                {
                    date: "2021-05-15",
                    money: 200,
                    type: "Sissetulek",
                    comment: "Raha tuli teist korda"
                }
            ];
            this.users = [
                {
                    username: "Riko M",
                    created_at: "2021-04-16"
                }
            ];
            this.loading = false;
        }, 2000);
    }
};
</script>

<style scoped></style>
