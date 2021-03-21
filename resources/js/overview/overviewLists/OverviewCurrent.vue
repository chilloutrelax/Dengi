<template>
    <div>
        <TableCrud
            endpoint="/api/overviews/1/current"
            :columns="['date_added', 'money', 'type', 'comment', 'actions']"
            :form-fields="{
                date_added: '',
                money: '',
                type: '',
                comment: ''
            }"
        >
            <template v-slot:overview-inputs="{ formdata }">
                <b-form-group
                    id="overview-input"
                    label="Summa"
                    label-for="input-1"
                    ><b-form-input
                        id="input-1"
                        v-model="formdata.money"
                        type="number"
                        step="0.01"
                    ></b-form-input
                ></b-form-group>

                <label for="overview-input-2">Valige kuupäev</label>
                <b-input-group class="mb-3">
                    <b-form-input
                        id="overview-input-2"
                        v-model="formdata.date_added"
                        type="text"
                        placeholder="YYYY-MM-DD"
                        autocomplete="off"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-form-datepicker
                            v-model="formdata.date_added"
                            button-only
                            right
                            locale="en-US"
                            aria-controls="overview-input-2"
                            class="mb-2"
                            :min="min"
                            :max="max"
                            :hide-header="true"
                            :nav-button="false"
                        ></b-form-datepicker>
                    </b-input-group-append>
                </b-input-group>

                <b-form-group
                    id="overview-input-3"
                    label="Tüüp"
                    label-for="input-3"
                    ><b-form-select
                        id="input-3"
                        v-model="formdata.type"
                        :options="selectType"
                        required
                    ></b-form-select
                ></b-form-group>

                <b-form-group
                    id="overview-input-4"
                    label="Kommentaar"
                    label-for="input-4"
                    ><b-form-input
                        id="input-4"
                        v-model="formdata.comment"
                        required
                    ></b-form-input
                ></b-form-group>
            </template>

            <template v-slot:overview-delete="{ formdata }">
                <b-form-group
                    id="overview-delete"
                    label="Summa"
                    label-for="datepicker-1"
                    ><b-form-input
                        id="datepicker-1"
                        v-model="formdata.money"
                        required
                        disabled
                    ></b-form-input
                ></b-form-group>

                <b-form-group
                    id="overview-delete-2"
                    label="Tüüp"
                    label-for="input-5"
                    ><b-form-select
                        id="input-5"
                        v-model="formdata.type"
                        :options="selectType"
                        required
                        disabled
                    ></b-form-select
                ></b-form-group>

                <b-form-group
                    id="overview-delete-3"
                    label="Kommentaar"
                    label-for="input-6"
                >
                    <b-form-input
                        id="input-6"
                        v-model="formdata.comment"
                        required
                        disabled
                    ></b-form-input
                ></b-form-group>
            </template>
        </TableCrud>
    </div>
</template>

<script>
import TableCrud from "../crud/TableCrud";
import { BFormDatepicker } from "bootstrap-vue";

const now = new Date();
const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
// 15th two months prior
const minDate = new Date(today);
minDate.setMonth(minDate.getMonth());
minDate.setDate(1);
// 15th in two months
const maxDate = new Date(today);
maxDate.setMonth(maxDate.getMonth());
maxDate.setDate(31);

export default {
    components: {
        TableCrud,
        BFormDatepicker
    },
    data() {
        return {
            number: Number,
            selectType: ["Sissetulek", "Väljaminek"],
            min: minDate,
            max: maxDate
        };
    },
    methods: {}
};
</script>
<style>
.b-calendar-inner {
    width: 320px !important;
}

.modal-backdrop {
    background-color: #2e3030d1 !important;
}
</style>
