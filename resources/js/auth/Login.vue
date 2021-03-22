<template>
    <div class="w-50 m-auto">
        <div class="card card-body">
            <form>
                <div class="form-group">
                    <label for="username">Kasutajanimi</label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Sisetage kasutajanimi"
                        class="form-control"
                        v-model="username"
                    />
                </div>
                <div class="form-group">
                    <label for="username">Parool</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Sisetage parool"
                        class="form-control"
                        v-model="password"
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
                    <router-link :to="{ name: 'home' }"
                        ><b>Registreeri</b></router-link
                    >
                </div>
                <div>
                    Unustasid parooli?
                    <router-link :to="{ name: 'home' }"
                        ><b>Taasta konto</b></router-link
                    >
                </div>
            </form>
        </div>
    </div>
</template>

<script>
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
                await axios.get("/users");
            } catch (error) {
                this.errors = error.response && error.response.data.errors;

                console.log(this.error);
            }

            this.loading = false;
        }
    }
};
</script>
