<template>
    <div>
        <div class="row list-fetch">
            <div class="col-10">
                <div class="row">
                    <div class="col">
                        {{ date }}
                    </div>
                    <div class="col">
                        {{ money }}
                    </div>
                    <div class="col">
                        {{ type }}
                    </div>
                    <div class="col">
                        {{ comment }}
                    </div>
                </div>  
            </div>
            <div class="col-2 ml-auto text-right">
                <i class="far fa-edit"></i>
                <i class="fas fa-trash"></i>
            </div>
            
        </div>
    </div>
    
</template>

<script>
export default {
    props: {
        "date": String,
        "money": Number,
        "type": String,
        "comment": String
    }
}
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
</style>