<template>
    <div>
        <nav class="navbar navbar-expand border-bottom">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }"
                >Dengi</router-link
            >
            <router-link :to="{ name: 'queries' }"
                ><div class="btn nav-button">Päringud</div></router-link
            >
            <router-link :to="{ name: 'login' }">
                <div class="btn nav-button">Logi sisse</div>
            </router-link>
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
