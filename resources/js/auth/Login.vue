<template>
    <div class="w-50 m-auto">
        <div class="card card-body">
            <h5 class="text-uppercase text-muted text-center">
                Sisselogimine
            </h5>
            <form>
                <div class="form-group">
                    <label for="username">Kasutajanimi</label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Sisetage kasutajanimi"
                        class="form-control"
                        v-model="username"
                        required
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
                        required
                    />
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
                        Parooli saamiseks saatke e-mail (dengi@riko.ee), koos
                        enda nime ja kasutajanimega.
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { logIn } from "../shared/utils/auth";

export default {
    data() {
        return {
            username: null,
            password: null,
            loading: false,
            errors: null
        };
    },
    methods: {
        async login() {
            this.loading = true;

            try {
                await axios.get("/sanctum/csrf-cookie");
                await axios.post("/login", {
                    username: this.username,
                    password: this.password
                });

                logIn();

                this.$store.dispatch("loadUser");
                this.$router.push({ name: "home" });
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
                console.log(error);
            }

            this.loading = false;
        }
    },
    created() {
        this.loading = true;
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>
