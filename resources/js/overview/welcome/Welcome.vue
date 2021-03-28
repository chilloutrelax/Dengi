<template>
    <div>
        <div class="backie">
            <div class="container ">
                <div
                    id="carouselControls"
                    class="carousel slide fixed-height"
                    data-ride="carousel"
                >
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                class="d-block w-100"
                                src=""
                                alt="First slide"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="d-block w-100"
                                src=""
                                alt="Second slide"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="d-block w-100"
                                src=""
                                alt="Third slide"
                            />
                        </div>
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

        <div class="">
            <div>
                Tervitustekst
            </div>
        </div>

        <div>
            <div>
                Kontakt
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
}

.fixed-height {
    height: 400px;
}
</style>
