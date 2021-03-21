<template>
    <div>
        <div v-if="!loading">
            <b-button class="mb-2" @click="createViewInsert">Lisa uus</b-button>

            <b-table
                striped
                hover
                :items="overviews"
                :fields="fields"
                :per-page="perPage"
                :current-page="currentPage"
                small
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >
                <template #cell(actions)="data">
                    <b-button
                        @click="editViewitem(data.item)"
                        variant="primary"
                        size="sm"
                        ><i class="far fa-edit pr-1" title="Muuda kirjet"></i
                    ></b-button>
                    <b-button
                        @click="deleteOverview(data.item)"
                        variant="danger"
                        size="sm"
                        ><i class="fas fa-trash" title="Kustuta kirje"></i
                    ></b-button>
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

            <b-modal v-model="modalShow" :title="computedTitle" hide-footer>
                <b-form @submit.prevent="save">
                    <slot :formdata="editedOverview" name="overview-inputs">
                    </slot>

                    <b-button @click="closeModal">
                        Tühista
                    </b-button>

                    <b-button variant="success">
                        Salvesta
                    </b-button>
                </b-form>
            </b-modal>

            <b-modal v-model="modalShow2" :title="computedTitle" hide-footer>
                <b-form>
                    <slot :formdata="editedOverview" name="overview-delete">
                    </slot>

                    <b-button variant="danger">
                        Kustuta
                    </b-button>
                </b-form>
            </b-modal>
        </div>
        <LoadingOverviews v-else></LoadingOverviews>
    </div>
</template>

<script>
import LoadingOverviews from "./../../shared/loading/LoadingOverviews";

export default {
    props: ["endpoint", "columns", "formFields"],
    components: {
        LoadingOverviews
    },

    data() {
        return {
            editedOverview: this.formFields,
            modalShow: false,
            modalShow2: false,
            indexEdit: -1,
            overviews: [],

            sortBy: "date_added",
            sortDesc: true,
            page: 1,
            columnsData: 1,
            perPage: 12,
            currentPage: 1,

            loading: false,

            fields: [
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
            ]
        };
    },
    computed: {
        rows() {
            return this.overviews == null
                ? 0
                : Math.ceil(this.overviews.length / this.columnsData);
        },
        computedTitle() {
            return this.indexEdit === -1
                ? "Sisestage uus kirje"
                : "Kirje muutmine";
        }
    },
    methods: {
        closeModal() {
            this.modalShow = false;
        },
        createViewInsert() {
            this.modalShow = true;
            this.editedOverview = Object.assign({}, this.formFields);
            this.indexEdit = -1;
        },
        editViewitem(overview) {
            this.modalShow = true;
            this.itemIndex = this.overviews.indexOf(overview);
            this.editedOverview = Object.assign({}, overview);
        },
        deleteOverview(overview) {
            // Andmebaasi id peab = overviedId
            // const overviewId = this.overviews.indexOf(overview);
            this.modalShow2 = true;
            this.itemIndex = this.overviews.indexOf(overview);
            this.editedOverview = Object.assign({}, overview);
        }
    },
    created() {
        this.loading = true;

        axios(this.endpoint).then(
            response => (this.overviews = response.data.data)
        );

        this.loading = false;
    }
};
</script>
