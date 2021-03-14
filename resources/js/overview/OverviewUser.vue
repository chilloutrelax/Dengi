<template>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-12 mb-5">
        <div class="col-12">
            <div class="col">
                <div class="col-12">
                    <h6
                        class="text-muted text-uppercase text-center font-weight-bold"
                    >
                        Kasutaja andmed
                    </h6>
                </div>
                <div class="col-12">
                    <div class="card card-body">
                        <div class="col-12">
                            <div class="">
                                <h6 class="text-muted text-uppercase">
                                    <b>Nimi:</b> <span>{{ username }}</span>
                                </h6>
                            </div>
                        </div>

                        <OverviewTotals></OverviewTotals>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OverviewTotals from "./OverviewTotals";

export default {
    components: {
        OverviewTotals
    },

    props: {
        username: String
    }
};
</script>
