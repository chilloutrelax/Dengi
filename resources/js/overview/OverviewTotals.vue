<template>
    <div>
        <div class="row col-12">
            <div class="col">
                <div class="">
                    <h6 class="text-muted text-uppercase">
                        <b>Sissetulek:</b>
                        <span
                            v-for="(overview, index) in overviews"
                            :key="index"
                            >{{ overview.income }}</span
                        >
                    </h6>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col">
                <h6 class="text-muted text-uppercase">
                    <b>Väljaminek:</b>
                    <span v-for="(overview, index) in overviews" :key="index">{{
                        overview.expense
                    }}</span>
                </h6>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        overviews: {
            income: Number,
            expense: Number
        }
    }
};
</script>
