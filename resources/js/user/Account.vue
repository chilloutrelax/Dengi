<template>
    <div>
        <div v-if="isLoggedIn">
            <div class="d-flex justify-content-center m-auto backie">
                <div
                    class="col-10 col-sm-8 col-md-8 col-lg-4 col-xl-4 card card-body mt-5 poopadi modded-card"
                >
                    <h6
                        class="text-muted text-uppercase font-weight-bold text-center"
                    >
                        Kasutaja andmed
                    </h6>

                    <br />

                    <div class="col">
                        <div class="name mb-2">
                            <b>Nimi:</b>
                            <span>{{ $store.state.user.name }}</span>
                        </div>

                        <div class="email mb-2">
                            <b>Email:</b>
                            <span>{{ $store.state.user.email }}</span>
                        </div>
                        <div class="created mb-2">
                            <b>Loodud:</b>
                            <span>{{
                                $store.state.user.created_at | formatDate
                            }}</span>
                        </div>

                        <br />

                        <div class="col">
                            <!-- <button
                                class="btn btn-secondary btn-sm btn-block"
                                disabled
                            >
                                Muuda parooli</button> -->
                            <button
                                class="btn btn-danger btn-sm btn-block"
                                @click.prevent="deleteUser"
                            >
                                Kustuta kasutaja
                            </button>

                            <!-- <span>
                                <br />
                                <h6
                                    class="small-text text-center text-uppercase font-weight-bold"
                                >
                                    Hetkel nuppude funktsionaalsus ei tööta.
                                </h6></span
                            > -->
                        </div>
                    </div>

                    <!-- <b-modal v-model="showModal" hide-footer>
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
                            >
                                Muuda
                            </button>
                        </form>
                    </b-modal> -->
                </div>
            </div>
        </div>
        <div v-if="!isLoggedIn">
            <div class="backie">
                <div class="container">
                    <div class="row padding-tops">
                        <div class="col text-center fa-proov poopadi">
                            <i class="fas fa-exclamation-circle"></i>
                            <h6
                                class="text-uppercase text-muted font-weight-bold"
                            >
                                Lehe nägemiseks logige palun sisse! <br />
                                Vajutage siia, et minna
                                <a href="/">esilehele</a>.
                            </h6>
                        </div>
                    </div>
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
            this.name = this.$store.state.user.name;

            const deleting = confirm(
                `Kas olete kindel, et soovite kustutada antud kasutaja: ${this.name}?`
            );
            if (deleting == true) {
                axios
                    .post("/api/users/delete/" + this.userid, {
                        _method: "DELETE"
                    })
                    .then(response => {
                        console.log(response);
                    });

                axios.post("logout");
                this.$store.dispatch("logout");
            } else {
                txt = "Tühistatud";
                e.preventDefault();
            }

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

.poopadi {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.backie {
    width: 100vw;
    height: 100vh;
    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
}

.modded-card {
    border: none;
    background-color: rgb(255, 255, 255);
    box-shadow: 0 0 87px 0 rgb(0 0 0 / 10%), 0 32px 20px -48px rgb(0 0 0 / 50%);
}
.fa-exclamation-circle {
    color: rgb(173, 21, 21);
    font-size: 80px;
    margin-bottom: 20px;
}

.fa-proov {
    font-size: 15px;
}
</style>
