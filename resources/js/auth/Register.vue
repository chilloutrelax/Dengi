<template>
    <div class="backie">
        <div class="d-flex justify-content-center m-auto">
            <div
                class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 card card-body mt-5"
            >
                <h5 class="text-uppercase text-muted text-center mb-4">
                    Registreerimine
                </h5>
                <form>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name"
                                >Nimi
                                <!-- <span class="font-weight-bold text-danger">*</span> -->
                            </label>
                            <input
                                type="text"
                                name="name"
                                placeholder="Sisestage enda nimi"
                                class="form-control"
                                v-model="user.name"
                                required
                                :class="[{ 'is-invalid': this.errors }]"
                            />
                        </div>

                        <div class="form-group">
                            <label for="name"
                                >E-mail
                                <!-- <span class="font-weight-bold text-danger">*</span> -->
                            </label>
                            <input
                                type="email"
                                name="email"
                                placeholder="Sisestage enda e-mail"
                                class="form-control"
                                v-model="user.email"
                                required
                                :class="[{ 'is-invalid': this.errors }]"
                            />
                        </div>

                        <label for="username">Kasutajanimi</label>
                        <input
                            type="text"
                            name="username"
                            placeholder="Sisetage kasutajanimi"
                            class="form-control"
                            v-model="user.username"
                            required
                            :class="[{ 'is-invalid': this.errors }]"
                        />
                    </div>
                    <div class="form-group">
                        <label for="password">Parool</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Sisetage parool"
                            class="form-control"
                            v-model="user.password"
                            required
                            :class="[{ 'is-invalid': this.errors }]"
                        />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation"
                            >Parooli kordus</label
                        >
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Korrake sisestatud parooli"
                            class="form-control"
                            v-model="user.password_confirmation"
                            required
                            :class="[{ 'is-invalid': this.errors }]"
                        />
                    </div>

                    <button
                        class="btn btn-warning btn-md btn-block"
                        :disabled="loading"
                        type="submit"
                        @click.prevent="register"
                    >
                        Hakkan kasutajaks!
                    </button>

                    <div class="mt-4">
                        Oled kasutaja?
                        <router-link :to="{ name: 'login' }"
                            ><b>Logi sisse</b></router-link
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { logIn } from "../shared/utils/auth";

export default {
    data() {
        return {
            user: {
                username: null,
                password: null,
                password_confirmation: null,
                name: null,
                email: null
            },
            userData: null,

            loading: false,
            errors: null
        };
    },
    methods: {
        async register() {
            this.loading = true;

            try {
                const response = await axios.post("/register", this.user);

                if (201 == response.status) {
                    logIn();
                    this.$store.dispatch("loadUser");
                    this.$router.push({ name: "home" });
                }
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

<style scoped>
.backie {
    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
    height: 100vh;
}
</style>
