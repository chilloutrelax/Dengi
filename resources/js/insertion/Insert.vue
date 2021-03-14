<template>
    <div class="w-50 m-auto">
        <div v-if="loading">
            <Loading></Loading>
        </div>
        <div v-else>
            <div class="card card-body">
                <div class="insert-header">
                    <h5 class="text-muted text-uppercase text-center">
                        Lisage uus sisestus
                    </h5>
                </div>
                <form>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="">Summa</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="form-group col-6">
                            <label for="">Sisestuse tüüp</label>
                            <select class="form-control">
                                <option>Väljaminek</option>
                                <option>Sissetulek</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="">Kommentaar</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Lühike kommentaar antud kande kohta."
                            />
                        </div>
                    </div>

                    <hr />

                    <button
                        type="submit"
                        class="btn btn-warning btn-lg btn-block"
                        @click.prevent=""
                    >
                        Sisesta
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from "../shared/loading/Loading";

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false
        };
    },
    created() {
        this.loading = true;

        setTimeout(() => {
            this.loading = false;
        }, 2000);
    }
};
</script>
