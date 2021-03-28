<template>
    <div class="backie">
        <div class="">
            <div class="container mobile-container-fix">
                <div
                    id="carouselControls"
                    class="carousel slide fixed-height "
                    data-ride="carousel"
                >
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                class="d-block w-100"
                                :src="'images/' + 'Slider1.png'"
                                alt="First slide"
                            />
                            <div class="carousel-caption">
                                <h5>
                                    Halda enda sissetulekuid ja väljaminekuid!
                                </h5>
                                <p>Liitu kohe!</p>
                            </div>
                        </div>
                        <!-- <div class="carousel-item">
                            <img
                                class="d-block w-100"
                                :src="'images/' + 'Slider1.png'"
                                alt="Second slide"
                            />
                        </div> -->
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselControls"
                        role="button"
                        data-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselControls"
                        role="button"
                        data-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-5">
            <div class="container mobile-container-fix">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-6">
                                    <h6
                                        class="text-uppercase text-center text-muted font-weight-bold"
                                    >
                                        Tere tulemast, Dengi kodulehele.
                                    </h6>
                                    <div class="col-12">
                                        <p class="text-justify">
                                            Tegemist on lihtsa veebipõhise
                                            rakendusega, kus on võimalik hallata
                                            enda sissetulekuid ja väljaminekuid.
                                            Rakenduse autor ammutas idee enda
                                            kõrgkooli Exceli kodutööst.
                                        </p>
                                        <p class="text-justify">
                                            Veebirakendus on hetkel alfa
                                            versioonis, kus parandatakse leitud
                                            vigu ning parandatakse üldist
                                            rakenduse töövoogu ning samuti ka
                                            välimus.
                                        </p>
                                        <p class="text-justify">
                                            Kasutajakonto loomisel ja andmete
                                            sisestamisel on võimalik kustutada
                                            kõik siestatud andmed ja
                                            kasutajakonto jäädavalt. Üritame
                                            edasiarendustega püsivalt parendada
                                            turvalisust!
                                        </p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h6
                                        class="text-uppercase text-center text-muted font-weight-bold"
                                    >
                                        Kontakt
                                    </h6>

                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="font-weight-bold">
                                                    Veebilehe haldaja/arendaja:
                                                </h6>
                                            </div>
                                            <div class="col-6">
                                                <h6>Riko Murutalu</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="font-weight-bold">
                                                    Email:
                                                </h6>
                                            </div>
                                            <div class="col-6">
                                                <h6>dengi@riko.ee</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.backie {
    background: #eecb6c9f;
    background: -webkit-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: -moz-linear-gradient(top, #eecb6c9f, #fcfcfc);
    background: linear-gradient(to bottom, #eecb6c9f, #fcfcfc);
    height: 100vh;
}

.fixed-height {
    height: 50%;
    max-height: 50%;
    border: none;
}

.fixed-height img {
    width: auto;
    height: 50%;
}

.card {
    border: none;
    box-shadow: 0 0 87px 0 rgb(0 0 0 / 10%), 0 32px 20px -48px rgb(0 0 0 / 50%);
}

.mobile-container-fix {
    padding-right: 0px;
    padding-left: 0px;
}

.carousel-caption {
    background: #caac5b4d;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}
</style>
