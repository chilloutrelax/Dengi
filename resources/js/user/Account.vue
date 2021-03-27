<template>
    <div>
        <div v-if="isLoggedIn">
            <div class="d-flex justify-content-center m-auto">
                <div
                    class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 card card-body"
                >
                    <h6
                        class="text-muted text-uppercase font-weight-bold text-center"
                    >
                        Kasutaja andmed
                    </h6>

                    <br />

                    <div class="col">
                        <div class="username mb-2">
                            <b>Nimi:</b>
                            <span>{{ $store.state.user.name }}</span>
                        </div>
                        <div class="name mb-2">
                            <b>Kasutajanimi:</b>
                            <span>{{ $store.state.user.username }}</span>
                        </div>
                        <div class="email mb-2">
                            <b>Email:</b>
                            <span>{{ $store.state.user.email }}</span>
                        </div>
                        <div class="created mb-2">
                            <b>Loodud:</b>
                            <span>{{ $store.state.user.created_at }}</span>
                        </div>

                        <br />

                        <div class="col">
                            <button
                                class="btn btn-secondary btn-sm btn-block"
                                disabled
                            >
                                Muuda parooli</button
                            ><button
                                class="btn btn-danger btn-sm btn-block"
                                @click.prevent="deleteUser"
                                disabled
                            >
                                Kustuta kasutaja
                            </button>

                            <span>
                                <br />
                                <h6
                                    class="small-text text-center text-uppercase font-weight-bold"
                                >
                                    Hetkel nuppude funktsionaalsus ei tööta.
                                </h6></span
                            >
                        </div>
                    </div>

                    <b-modal v-model="showModal" hide-footer>
                        <form>
                            <div class="col">
                                <label for="newpass">Uus parool:</label>
                                <br />
                                <b-input
                                    type="text"
                                    name="newpass"
                                    placeholder="Sisestage parool"
                                />
                            </div>
                            <br />

                            <button
                                @click.prevent="deleteUser"
                                class="btn btn-block btn-warning"
                                type="submit"
                                disabled
                            >
                                Muuda
                            </button>
                        </form>
                    </b-modal>
                </div>
            </div>
        </div>
        <div v-if="!isLoggedIn">
            <div class="card">
                <div class="card-body">
                    Sa ei ole sisse logitud.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";

export default {
    data() {
        return {
            showModal: false
        };
    },
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn"
        })
    },
    methods: {
        deleteUser(e) {
            e.preventDefault();
            this.userid = this.$store.state.user.id;
            this.username = this.$store.state.user.username;

            confirm(
                `Kas olete kindel, et soovite kustutada antud kasutaja: ${this.username}?`
            );

            axios
                .post("/api/users/delete/" + this.userid, {
                    _method: "DELETE"
                })
                .then(response => {
                    console.log(response);
                });

            // location.reload();
        }
    }
};
</script>

<style scoped>
.small-text {
    color: brown;
    font-size: 10px;
}
</style>
