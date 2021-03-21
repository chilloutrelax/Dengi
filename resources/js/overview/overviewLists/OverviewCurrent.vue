<template>
    <div>
        <TableCrud
            endpoint="/api/overviews/1/current"
            :columns="['date_added', 'money', 'type', 'comment', 'actions']"
            :form-fields="{
                date_added: '',
                money: '',
                type: '',
                comment: '',
                actions: ''
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

                <b-form-group
                    id="overview-input-2"
                    label="Kuupäev"
                    label-for="input-2"
                >
                    <b-form-input
                        id="input-2"
                        v-model="formdata.date_added"
                        autocomplete="off"
                        type="date"
                        locale="en-US"
                        :min="min"
                        :max="max"
                    >
                    </b-form-input>
                </b-form-group>

                <b-form-group
                    id="overview-input-3"
                    label="Tüüp"
                    label-for="input-3"
                    ><b-form-select
                        id="input-3"
                        v-model="formdata.type"
                        :options="['Sissetulek', 'Väljaminek']"
                        required
                    ></b-form-select
                ></b-form-group>

                <b-form-group
                    id="overview-input-4"
                    label="Tüüp"
                    label-for="input-4"
                    ><b-form-input
                        id="input-3"
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
                        :options="['Sissetulek', 'Väljaminek']"
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

export default {
    components: {
        TableCrud
    },
    data() {
        return {
            number: Number,
            dateValue: "",
            min: this.minDate,
            max: this.maxDate
        };
    },
    methods: {
        minAndMaxDate() {
            const now = new Date();
            const today = new Date(
                now.getFullYear(),
                now.getMonth(),
                now.getDate()
            );

            const maxDate = new Date(today);

            const minDate = newDate(now.getMonth);

            return {
                maxDate,
                minDate
            };
        }
    }
};
</script>

<style scoped>
button #input-2 {
    padding: 0;
}
</style>
