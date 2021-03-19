<template>
    <div>
        <div class="overflow-auto" v-if="!loading">
            <b-table
                hover
                id="overviews"
                :items="overviews"
                :per-page="perPage"
                :current-page="currentPage"
                :fields="fields"
                small
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >
                <template #cell(index)="data">
                    {{ data.index + 1 }}
                </template>
                <template #cell(actions)="">
                    <div class="">
                        <span class="mr-3"
                            >Muuda &nbsp;<i
                                class="far fa-edit pr-1"
                                title="Muuda kirjet"
                            ></i
                        ></span>

                        <span
                            >Kustuta &nbsp;<i
                                class="fas fa-trash"
                                title="Kustuta kirje"
                            ></i
                        ></span>
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
import moment from "moment";

export default {
    components: {
        LoadingOverviews
    },
    data() {
        return {
            sortBy: "created_at",
            sortDesc: true,
            fields: [
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
            loading: false
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
    },
    created() {
        this.loading = true;
        axios
            .get("/api/overviews/1/current")
            .then(response => {
                this.overviews = response.data.data;
                this.loading = false;
            })
            .catch(error => console.log(error.response.data));
    }
};
</script>
