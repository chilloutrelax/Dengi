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
            <template v-slot:input-fields="{ formdata }">
                <b-form-group
                    id="overview-input"
                    label="Summa"
                    label-for="input-1"
                    ><b-form-input
                        id="input-1"
                        v-model="formdata.money"
                        required
                    ></b-form-input
                ></b-form-group>

                <b-form-group
                    id="overview-input-2"
                    label="Tüüp"
                    label-for="input-2"
                    ><b-form-select
                        id="input-2"
                        v-model="formdata.type"
                        :options="typeOptions"
                        required
                    ></b-form-select
                ></b-form-group>

                <b-form-group
                    id="overview-input-3"
                    label="Tüüp"
                    label-for="input-3"
                    ><b-form-input
                        id="input-3"
                        v-model="formdata.comment"
                        required
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
            typeOptions: [
                { text: "Valige tüüp", value: null },
                "Sissetulek",
                "Väljaminek"
            ]
        };
    }
};
</script>
