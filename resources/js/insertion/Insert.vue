<template>
    <div class="w-50 m-auto">
        <div class="card card-body">
            <div class="insert-header">
                <h5 class="text-muted text-uppercase text-center">Lisage uus sisestus</h5>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">Summa</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="">Kulutuse tüüp</label>
                        <select class="form-control">
                            <option>Kulutus</option>
                            <option>Sissetulek</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="">Kommentaar</label>
                        <input type="text" class="form-control" placeholder="Lühike kommentaar antud kande kohta.">
                    </div>
                </div>

                <hr>
                
                <button type="submit" class="btn btn-warning btn-lg btn-block" @click.prevent="">Sisesta</button>
            </form>
        </div>
    </div>
</template>