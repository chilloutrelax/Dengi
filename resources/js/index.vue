<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand">
            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }">
                <img
                    :src="'images/' + 'Logog.png'"
                    class="card-img-top"
                    alt=""
                />
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
                <li>
                    <router-link
                        class="nav-link disabled"
                        :to="{ name: 'home' }"
                    >
                        Seaded
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        class="nav-link disabled"
                        :to="{ name: 'home' }"
                    >
                        Päringud
                    </router-link>
                </li>
                <li class="nav-item">
                    <a
                        href="#"
                        class="btn btn-sm btn-warning"
                        @click.prevent="logout"
                        >Logi välja <i class="fas fa-sign-out-alt"></i
                    ></a>
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
.card-img-top {
    width: 120px;
}

.btn-warning {
    background-color: #ffa571;
    border-color: #ffa571;
    font-size: 0.7875rem;
    line-height: 1.5;
    font-size: 0.9rem;
    line-height: 1.6;
    font-weight: 500;
}
</style>
