<template>
    <div class="w-50 m-auto">
        <div class="card card-body">
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
                    />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Parooli kordus</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Korrake sisestatud parooli"
                        class="form-control"
                        v-model="user.password_confirmation"
                        required
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
