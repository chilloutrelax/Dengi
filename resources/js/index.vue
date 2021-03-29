<template>
    <div class="">
        <div class="header-sticky pt-1">
            <nav class="navbar navbar-expand">
                <h6 class="mr-auto versioon">Versioon:a0.1.41</h6>
                <router-link
                    class="navbar-brand mr-auto"
                    :to="{ name: 'home' }"
                >
                    <img
                        :src="'images/' + 'Logog.png'"
                        class="card-img-top"
                        alt=""
                    />
                </router-link>

                <ul class="navbar-nav" v-if="!isLoggedIn">
                    <li class="nav-item" v-if="!isLoggedIn">
                        <router-link
                            class="nav-link text-uppercase text-muted font-weight-bold"
                            :to="{ name: 'login' }"
                        >
                            <button class="btn btn-success btn-sm btn-block">
                                Logi sisse
                            </button>
                        </router-link>
                    </li>

                    <li class="nav-item" v-if="!isLoggedIn">
                        <router-link
                            class="nav-link text-uppercase text-muted font-weight-bold"
                            :to="{ name: 'register' }"
                        >
                            <button class="btn btn-info btn-sm btn-block">
                                Registreeri
                            </button>
                        </router-link>
                    </li>
                </ul>
                <ul class="navbar-nav" v-if="isLoggedIn">
                    <li class="nav-item mr-1">
                        <router-link
                            class="nav-link text-uppercase text-muted font-weight-bold "
                            :to="{ name: 'home' }"
                        >
                            KÄESOLEV
                        </router-link>
                    </li>
                    <li class="nav-item mr-1">
                        <router-link
                            class="nav-link text-uppercase text-muted font-weight-bold"
                            :to="{ name: 'alloverviews' }"
                            >Päringud
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            class="nav-link mr-1 text-uppercase text-muted font-weight-bold"
                            :to="{ name: 'account' }"
                        >
                            Konto
                        </router-link>
                    </li>
                    <li class="nav-item mt-1">
                        <a
                            class="btn btn-sm btn-warning"
                            @click.prevent="logout"
                            >Logi välja <i class="fas fa-sign-out-alt"></i
                        ></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="">
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
    background-color: #da7d47;
    border: none;
    font-size: 0.7875rem;
    line-height: 1.5;
    font-size: 0.9rem;
    line-height: 1.6;
    font-weight: 500;
    color: rgb(255, 255, 255);
    text-shadow: -1px 0 rgb(122, 119, 119), 0 1px rgb(129, 124, 124),
        1px 0 rgb(168, 158, 158), 0 -1px rgb(146, 132, 132);
}

.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active {
    background-color: #ff8d4b;
    color: rgb(0, 0, 0);
    /* text-shadow: -1px 0 rgb(167, 166, 166), 0 1px rgb(133, 133, 133),
        1px 0 rgb(170, 170, 170), 0 -1px rgb(148, 148, 148); */
}

.router-link-exact-active {
    color: #d46829 !important;
}
.versioon {
    position: absolute;
    bottom: 0px;
    left: 55px;
    font-size: 10px;
    color: rgb(235, 186, 141);
}

@media only screen and (max-width: 527px) {
    .navbar-expand .navbar-nav .nav-link {
        display: flex;
    }
}
</style>
