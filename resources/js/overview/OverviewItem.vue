<template>
    <div
        class="row col-12 item-top-border"
        :class="[this.type === 'Sissetulek' ? 'green' : 'red']"
    >
        <div class="row col-10">
            <div class="col-2">
                {{ created_at }}
            </div>
            <div class="col-2">{{ money }} €</div>
            <div class="col-2">
                {{ type }}
            </div>
            <div class="col-4">
                {{ comment }}
            </div>
        </div>
        <div class="row ml-auto col-2">
            <div class="col text-right"></div>
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
