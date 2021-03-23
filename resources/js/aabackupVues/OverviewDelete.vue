<template>
    <div>
        <div v-show="!isHidden" class="card confirm-modal">
            <div class="card-body">
                <h6
                    class="text-muted text-uppercase font-weight-bold text-center"
                >
                    Soovite kustutada kirje:
                </h6>
                <p><b>Kuupäev</b>: {{ created_at }}</p>
                <p><b>Summa</b>: {{ money }}</p>
                <p><b>Tüüp</b>: {{ type }}</p>
                <p><b>Kommentaar</b>: {{ comment }}</p>

                <hr />

                <div class="row">
                    <div class="col">
                        <button
                            class="btn btn-secondary btn-block"
                            @click="isHidden = !isHidden"
                        >
                            Tühista
                        </button>
                    </div>
                    <div class="col">
                        <button
                            class="btn btn-danger btn-block"
                            @click="deleteData(id)"
                        >
                            Kustuta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
