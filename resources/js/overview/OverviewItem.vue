<template>
    <div
        class="row col-12 item-top-border"
        :class="[this.type === 'Sissetulek' ? 'green' : 'red']"
    >
        <div class="row col-10">
            <div class="col-2">
                {{ created_at }}
            </div>
            <div class="col-2">
                {{ money }}
            </div>
            <div class="col-2">
                {{ type }}
            </div>
            <div class="col-4">
                {{ comment }}
            </div>
        </div>
        <div class="row ml-auto col-2">
            <div class="col text-right">
                <router-link :to="{ name: 'edit', params: { id } }"
                    ><i class="far fa-edit pr-1" title="Muuda kirjet"></i
                ></router-link>
                <i
                    class="fas fa-trash"
                    @click="isHidden = !isHidden"
                    title="Kustuta kirje"
                ></i>

                <div v-show="!isHidden" class="card confirm-modal">
                    <div class="card-body">
                        <h6
                            class="text-muted text-uppercase font-weight-bold text-center"
                        >
                            Soovite kustutada kirje:
                        </h6>
                        <p><b>Kuupäev</b>: {{ created_at }}</p>
                        <p><b>Summa</b>: {{ money }}</p>
                        <p><b>Tüüp</b>: {{ type }}</p>
                        <p><b>Kommentaar</b>: {{ comment }}</p>

                        <hr />

                        <div class="row">
                            <div class="col">
                                <button
                                    class="btn btn-secondary btn-block"
                                    @click="isHidden = !isHidden"
                                >
                                    Tühista
                                </button>
                            </div>
                            <div class="col">
                                <button
                                    class="btn btn-danger btn-block"
                                    @click="deleteData(id)"
                                >
                                    Kustuta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isHidden: true
        };
    },
    props: {
        id: Number,
        created_at: String,
        money: Number,
        type: String,
        comment: String
    },
    methods: {
        deleteData(id) {
            axios.delete("/api/overviews/" + this.id).then(response => {
                this.splice(id, 1);
                console.log(this.overview);
            });
            this.$router.go();
        }
    }
};
</script>

<style scoped>
.list-fetch {
    padding-top: 10px;
}
.list-fetch ul {
    list-style: none;
}

.list-fetch li {
    display: inline;
}

.item-top-border {
    border-bottom: 1px dashed #031c1f;
}

a {
    text-decoration: none;
}

.fa-edit {
    color: rgb(20, 136, 20);
    font-size: 15px;
}

.fa-trash {
    color: rgb(179, 29, 29);
    font-size: 15px;
}

.confirm-modal {
    position: fixed; /* or absolute */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: start;
    z-index: 200;
    width: 420px;
    height: 300px;
}
.red {
    background-color: rgba(241, 216, 216, 0.151);
}

.green {
    background-color: rgba(191, 247, 191, 0.116);
}
</style>
