<template>
    <div>
        <div class="invalid" v-for="(error, index) in errors" :key="key(index)">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            errors: null
        };
    },

    methods: {
        key(index) {
            return `errorid_${index}_${Math.random()}`;
        }
    }
};
</script>
