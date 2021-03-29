<template>
    <div class="backie">
        <div class="d-flex justify-content-center m-auto">
            <div
                class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 card card-body mt-5"
            >
                <h5 class="text-uppercase text-muted text-center">
                    Sisselogimine
                </h5>
                <form>
                    <div class="form-group">
                        <label for="Email">E-mail</label>
                        <input
                            type="email"
                            name="email"
                            placeholder="Sisetage kasutajanimi"
                            class="form-control"
                            v-model="email"
                            :class="[
                                {
                                    'is-invalid': this.errors !== null
                                }
                            ]"
                        />
                    </div>
                    <div class="form-group">
                        <label for="password">Parool</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Sisetage parool"
                            class="form-control"
                            v-model="password"
                            :class="[{ 'is-invalid': this.errors }]"
                        />
                        <!-- <ErrorComponent
                        :errors="errorFor('password')"
                    ></ErrorComponent> -->
                    </div>

                    <button
                        class="btn btn-warning btn-md btn-block"
                        :disabled="loading"
                        type="submit"
                        @click.prevent="login"
                    >
                        Logi sisse
                    </button>

                    <div class="mt-4">
                        Pole veel kasutaja?
                        <router-link :to="{ name: 'register' }"
                            ><b>Registreeri</b></router-link
                        >
                    </div>

                    <div class="mt-4 mr-auto">
                        <b class="text-primary ">Unustasid parooli?</b>
                        <div>
                            Parooli saamiseks saatke e-mail (dengi@riko.ee),
                            koos enda nime ja kasutajanimega.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
// import errorCatcher from "./../shared/errors/errorCatcher";
import { logIn } from "../shared/utils/auth";

export default {
    // mixins: [errorCatcher],
    data() {
        return {
            email: null,
            password: null,
            loading: false,
            errors: null,
            status: null
        };
    },
    methods: {
        async login() {
            this.loading = true;
            this.errors = null;

            try {
                await axios.get("/sanctum/csrf-cookie");
                await axios.post("/login", {
                    email: this.email,
                    password: this.password
                });

                logIn();

                this.$store.dispatch("loadUser");
                this.$router.push({ name: "home" });
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
            }

            this.loading = false;
        }
    },
    computed: {},
    created() {
        this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>

<style scoped>
.backie {
    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
    height: 100vh;
}
</style>
