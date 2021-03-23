<template>
    <div>
        <nav class="navbar navbar-expand border-bottom">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }"
                >Dengi
            </router-link>

            <ul class="navbar-nav" v-if="!isLoggedIn">
                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link class="nav-link" :to="{ name: 'login' }">
                        Logi sisse
                    </router-link>
                </li>

                <li class="nav-item" v-if="!isLoggedIn">
                    <router-link class="nav-link" :to="{ name: 'register' }">
                        Registreeri
                    </router-link>
                </li>
            </ul>
            <ul class="navbar-nav" v-if="isLoggedIn">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'queries' }">
                        Päringud
                    </router-link>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" @click.prevent="logout"
                        >Logi välja</a
                    >
                </li>
            </ul>
        </nav>

        <div class="mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";

export default {
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn"
        })
    },
    methods: {
        async logout() {
            try {
                axios.post("logout");
                this.$store.dispatch("logout");
            } catch {
                this.$store.dispatch("logout");
            }
        }
    }
};
</script>

<style scoped>
.navbar-brand {
    color: black;
}
</style>
