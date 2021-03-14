<template>
    <div class="w-50 m-auto">
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="card card-body">
                <div class="insert-header">
                    <h5 class="text-muted text-uppercase text-center">
                        Sisetatud kirje muutmine
                    </h5>
                </div>
                <form>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="">Summa</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="overviewEdit.money"
                            />
                        </div>
                        <div class="form-group col-6">
                            <label for="">Sisestuse tüüp</label>
                            <select class="form-control">
                                <option :bind="overviewEdit.type"
                                    >Väljaminek</option
                                >
                                <option :bind="overviewEdit.type"
                                    >Sissetulek</option
                                >
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="">Kommentaar</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Lühike kommentaar antud kande kohta."
                                v-model="overviewEdit.comment"
                            />
                        </div>
                    </div>

                    <hr />

                    <button
                        type="submit"
                        class="btn btn-warning btn-lg btn-block"
                        @click.prevent=""
                    >
                        Uuenda
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from "../shared/loading/Loading";

export default {
    props: {
        id: Number,
        created_at: String,
        money: Number,
        type: String,
        comment: String
    },
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            overviewEdit: null
        };
    },
    created() {
        this.loading = true;

        axios.get(`/api/overviews/${this.$route.params.id}`).then(response => {
            this.overviewEdit = response.data;
            this.loading = false;
        });
    }
};
</script>
