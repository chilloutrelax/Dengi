<template>
    <div>Tule registreeruma</div>
</template>

<script>
export default {
    created() {
        this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>
