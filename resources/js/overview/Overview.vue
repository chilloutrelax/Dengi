<template>
    <div>
        <div v-if="logged" class="row">
            <div class="col-9">
            <OverviewHeaders></OverviewHeaders>      
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            <OverviewItem date="2020-10-06" :money="200" type="Kulutus" comment="Vahva päev"></OverviewItem>
            </div>

            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-warning btn-block">Lisa uus</button>
                    </div>
                </div>
                
                <div class="col">
                    <div class="col-12 pt-4">
                        <h6 class="text-muted text-uppercase text-center font-weight-bold">
                            Kasutaja andmed
                        </h6>
                    </div>
                    <div class="col-12 pt-4">
                        <div class="card card-body">
                            <div class="row col-12">
                                <div class="col">
                                    <h6>Nimi:</h6>
                                </div>
                                <div class="col">
                                    <h6>Kasutaja</h6>
                                </div>
                            </div>

                            <div class="row col-12">
                                <div class="col">
                                    <h6>Sissetulekud:</h6>
                                </div>
                                <div class="col">
                                    <h6>1000</h6>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col">
                                    <h6>Väljaminekud:</h6>
                                </div>
                                <div class="col">
                                    <h6>1000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="container">
            <h6>Logige palun sisse.</h6>
        </div>
    </div>
    
</template>

<script>
import OverviewItem from './OverviewItem';
import OverviewHeaders from './OverviewHeaders';

export default {
    components: {
        OverviewHeaders,
        OverviewItem
    },

    data() {
        return {
            logged: true
        }
    }, 
    methods: {
    }
    
}
</script>

<style scoped>
</style>