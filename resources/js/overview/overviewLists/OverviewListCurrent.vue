<template>
    <div>
        <div class="overflow-auto" v-if="!loading && this.overviews !== null">
            <b-table
                hover
                id="overviews"
                :items="overviews"
                :per-page="perPage"
                :current-page="currentPage"
                :fields="columns"
                small
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >
                <template #cell(index)="data">
                    {{ data.index + 1 }}
                </template>
                <template #cell(actions)="">
                    <div>
                        <span class="mr-3"
                            >Muuda &nbsp;<i
                                class="far fa-edit pr-1"
                                title="Muuda kirjet"
                            ></i
                        ></span>

                        <span></span>
                    </div>
                </template>
            </b-table>
            <div class="mt-3">
                <b-pagination
                    class="colorPagination"
                    center
                    pills
                    size="sm"
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                    aria-controls="overviews"
                    align="center"
                ></b-pagination>
            </div>
        </div>
        <LoadingOverviews v-else></LoadingOverviews>
    </div>
</template>

<script>
import LoadingOverviews from "./../../shared/loading/LoadingOverviews";

export default {
    components: {
        LoadingOverviews
    },
    data() {
        return {
            overviews: [],
            sortBy: "created_at",
            sortDesc: true,
            fields: [
                { key: "id", thClass: "d-none", tdClass: "d-none" },
                {
                    index: "Number"
                },
                {
                    label: "Kuupäev",
                    key: "date_added",
                    sortable: true
                },
                {
                    label: "Summa",
                    key: "money",
                    sortable: true
                },
                {
                    label: "Tüüp",
                    key: "type",
                    sortable: true
                },
                {
                    label: "Kommentaar",
                    key: "comment",
                    sortable: true
                },
                {
                    label: "Tegevused",
                    key: "actions"
                }
            ],
            page: 1,
            columns: 1,
            perPage: 12,
            currentPage: 1,
            loading: false,
            userPosts: this.$store.state.user.name
        };
    },
    methods: {},
    computed: {
        rows() {
            return this.overviews == null
                ? 0
                : Math.ceil(this.overviews.length / this.columns);
        },
        mySortCompare(a, b, key) {
            if (key === "date_added") {
                // Assuming the date field is a `Date` object, subtraction
                // works on the date serial number (epoch value)
                return a[key] - b[key];
            } else {
                // Let b-table handle sorting other fields (other than `date` field)
                return false;
            }
        }
    }
};
</script>
