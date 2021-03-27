<template>
    <div>
        <div>
            <div v-if="!loading">
                <b-button
                    class="mb-2 col col-sm-12 col-md-3 col-lg-3 col-xl-2 btn btn-sm btn-block btn-warning ml-auto"
                    @click="createViewInsert"
                    ><b>Lisa <i class="far fa-calendar-plus"></i></b>
                </b-button>

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
                    thead-class="orange-bg bg-light text-black"
                >
                    <template #cell(actions)="data">
                        <b-button
                            @click="editViewitem(data.item)"
                            variant="primary"
                            size="sm"
                            ><i
                                class="far fa-edit pr-1"
                                title="Muuda kirjet"
                            ></i
                        ></b-button>
                        <b-button
                            @click="deleteViewitem(data.item)"
                            variant="danger"
                            size="sm"
                            ><i class="fas fa-trash" title="Kustuta kirje"></i
                        ></b-button>
                    </template>
                </b-table>
                <div class="mt-3">
                    <b-pagination
                        class="c"
                        center
                        pills
                        size="md"
                        v-model="currentPage"
                        :total-rows="rows"
                        :per-page="perPage"
                        aria-controls="overviews"
                        align="center"
                    ></b-pagination>
                </div>

                <b-modal v-model="modalShow" :title="computedTitle" hide-footer>
                    <b-form @submit.prevent="saveEditOrInsert">
                        <slot :formdata="editedOverview" name="overview-inputs">
                        </slot>

                        <b-button @click="closeModal">
                            Tühista
                        </b-button>

                        <b-button type="submit" variant="success">
                            Salvesta
                        </b-button>
                    </b-form>
                </b-modal>

                <b-modal
                    v-model="modalShow2"
                    :title="computedTitle"
                    hide-footer
                >
                    <!--  -->
                    <b-form @submit.prevent="deleteOverview">
                        <slot :formdata="editedOverview" name="overview-delete">
                        </slot>

                        <b-button type="submit" variant="danger">
                            Kustuta
                        </b-button>
                    </b-form>
                </b-modal>
            </div>
            <LoadingOverviews v-else></LoadingOverviews>
        </div>
    </div>
</template>

<script>
import LoadingOverviews from "./../../shared/loading/LoadingOverviews";
import errorCatcher from "./../../shared/errors/errorCatcher";

export default {
    props: ["endpoint", "columns", "formFields"],
    components: {
        LoadingOverviews
    },
    mixins: [errorCatcher],

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
            status: null,
            errors: null,

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
            setTimeout(() => {
                this.editedOverview = Object.assign({}, this.formFields);
                this.indexEdit = 1;
            }, 300);
        },
        closeModal2() {
            this.modalShow2 = false;
            setTimeout(() => {
                this.editedOverview = Object.assign({}, this.formFields);
                this.indexEdit = -1;
            }, 300);
        },
        createViewInsert() {
            this.modalShow = true;
            this.editedOverview = Object.assign({}, this.formFields);
            this.indexEdit = -1;
        },
        editViewitem(item) {
            this.indexEdit = null;
            this.modalShow = true;
            this.itemIndex = this.overviews.indexOf(item);
            this.editedOverview = Object.assign({}, item);
        },
        deleteViewitem(item) {
            this.modalShow2 = true;
            this.itemIndex = this.overviews.indexOf(item);
            this.editedOverview = Object.assign({}, item);
        },
        deleteOverview() {
            axios.put("/api/overviews/" + this.editedOverview.id + "/delete", {
                _method: "put"
            });

            this.closeModal2();

            location.reload();
        },
        saveEditOrInsert() {
            let stateUser2 = this.$store.state.user.id;
            if (this.indexEdit > -1) {
                Object.assign([this.indexEdit], this.editedOverview);
                axios
                    .put(
                        "/api/overviews/" + this.editedOverview.id,
                        this.editedOverview
                    )
                    .catch(error => {
                        if (422 === error.response.status) {
                            this.errors = error.response.data.errors;
                        }
                        this.status = error.response.status;
                    });

                location.reload();
            } else {
                this.overviews.push(this.editedOverview);
                axios
                    .post("/api/overviews/" + stateUser2, this.editedOverview)
                    .then(response => {
                        this.status = response.status;
                    })
                    .catch(error => {
                        if (422 === error.response.status) {
                            this.errors = error.response.data.errors;
                        }
                        this.status = error.response.status;
                    });

                location.reload();
            }

            this.closeModal();
            // location.reload();
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

<style scoped>
.btn-danger {
    color: #fff;
    background-color: #e3352fcb;
    border-color: #e3352fcb;
}

.btn-primary {
    color: #fff;
    background-color: #46a720cb;
    border-color: #46a720cb;
}
</style>
