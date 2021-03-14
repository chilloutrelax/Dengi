<template>
    <div>
        <nav class="navbar navbar-expand border-bottom">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }"
                >Dengi</router-link
            >
            <router-link class="btn nav-button" :to="{ name: 'insert' }"
                >Logi sisse</router-link
            >
        </nav>

        <div class="mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.navbar-brand {
    color: black;
}
</style>
