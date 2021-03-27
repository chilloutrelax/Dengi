<template>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12 mb-5">
        <!-- <div class="col-12"> -->
        <!-- <div class="col"> -->
        <div class="col-12">
            <h6 class="text-muted text-uppercase text-center font-weight-bold">
                KÕIKIDE SISESTUSTE ANDMED
            </h6>
        </div>

        <div class="col card modded-card">
            <div class="row card-body">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
                    <div class="col-12">
                        <h6
                            class="text-muted text-uppercase font-weight-bold pb-2"
                        >
                            Kasutaja andmed
                        </h6>
                    </div>
                    <!-- <div class="col mb-3">
                        <span><i class="fas fa-user-tie"></i></span>
                    </div> -->
                    <div class="col">
                        <span><b>Nimi:</b> {{ $store.state.user.name }}</span>
                    </div>
                    <div class="col">
                        <span
                            ><b>Kasutajanimi:</b>
                            {{ $store.state.user.username }}</span
                        >
                    </div>

                    <br />
                    <div class="col">
                        <span
                            ><i class="fas fa-plus-square"></i>&nbsp;<b
                                >Sissetulekud:</b
                            >
                            {{ totalMoney.incomes }} €
                        </span>
                    </div>
                    <div class="col">
                        <span
                            ><i class="fas fa-minus-square"></i>&nbsp;<b
                                >Väljaminekud:</b
                            >
                            {{ totalMoney.expenses }} €
                        </span>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
                    <div class="col">
                        <h6
                            class="text-muted text-uppercase font-weight-bold pb-2"
                        >
                            Näitajad
                        </h6>
                    </div>

                    <div class="col">
                        <span
                            ><i class="fas fa-equals"></i>&nbsp;<b
                                >Tulud - kulud:</b
                            >
                            {{ tmk }} €</span
                        >
                    </div>
                    <div class="col">
                        <span
                            ><i class="fas fa-percentage"></i>&nbsp;<b
                                >Kulude % tuludest</b
                            >
                            {{ kpt }}</span
                        >
                    </div>

                    <br />
                    <div class="col">
                        <span
                            ><i class="fas fa-arrow-up"></i
                            ><b>Suurim sissetulek:</b>
                            {{ bigMoney.bigIncome }} €</span
                        >
                    </div>
                    <div class="col">
                        <span
                            ><i class="fas fa-arrow-down"></i
                            ><b>Suurim väljaminek:</b>
                            {{ bigMoney.bigExpense }} €</span
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            totalMoney: Number,
            bigMoney: Number,
            stateUserUser: null
        };
    },
    props: {
        name: String
    },
    computed: {
        tmk() {
            const tmkk = this.totalMoney.incomes - this.totalMoney.expenses;
            return tmkk == 0 ? 0 : tmkk;
        },
        kpt() {
            let sumKpt =
                (this.totalMoney.expenses / this.totalMoney.incomes) * 100;

            let realSumKpt = +(Math.round(sumKpt + "e+2") + "e-2") + "%";

            return realSumKpt == 0 ? 0 : realSumKpt;
        }
        // bigIncomeComp() {
        //     let bigMoneyIncome = this.bigMoney.incomes;
        //     return bigMoneyIncome == 0 ? 0 : bigMoneyIncome;
        // },
        // bigExpenseComp() {
        //     let bigMoneyExpense = this.bigMoney.expenses;
        //     return bigMoneyExpenses == 0 ? 0 : bigMoneyExpense;
        // }
    },
    created() {
        let stateUserUser = this.$store.state.user.id;

        axios
            .get("/api/overviews/totals/" + stateUserUser)
            .then(response => {
                this.totalMoney = response.data;
            })
            .catch(error => console.log(error.response.data));

        axios
            .get("/api/overviews/biggest/" + stateUserUser)
            .then(response => {
                this.bigMoney = response.data;
            })
            .catch(error => console.log(error.response.data));
    }
};
</script>

<style scoped>
.fa-plus-square {
    color: green;
}

.fa-minus-square {
    color: red;
}

.fa-user-tie {
    font-size: 6vw;
}
.fa-equals {
    color: green;
}
.fa-percentage {
    color: rgb(168, 168, 28);
}

.fa-arrow-up {
    color: green;
}
.fa-arrow-down {
    color: red;
}

.modded-card {
    /* border: 1px solid rgba(255, 68, 0, 0.267); */
    background-color: rgba(226, 217, 207, 0.075);
}
</style>
