<template>
    <div class="row col-12 item-top-border">
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
                    @click="deleteData($id)"
                    title="Kustuta kirje"
                ></i>
            </div>
        </div>
    </div>
</template>

<script>
export default {
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

            alert(
                `Kustutasite kirje nr. ${this.id} kommentaariga ${this.comment}`
            );

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
    color: rgb(44, 153, 44);
    font-size: 15px;
}

.fa-trash {
    color: rgb(167, 43, 43);
    font-size: 15px;
}
</style>
