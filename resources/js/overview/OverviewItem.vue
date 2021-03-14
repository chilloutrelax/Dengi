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
                <router-link :to="{ name: 'edit', params: { id: id } }"
                    ><i class="far fa-edit"></i
                ></router-link>
                <i class="fas fa-trash"></i>
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
    created() {}
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
</style>
