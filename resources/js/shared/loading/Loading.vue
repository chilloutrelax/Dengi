<template>
    <div>
        <div class="container">
            <div class="loading text-center">
                <p>Laen lehte</p>
                <i class="fas fa-spinner fa-pulse"></i>
            </div>
        </div>
    </div>
</template>

<style scoped>
.loading {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);

    font-size: 40px;
}

.loading p {
    font-size: 20px;
}
</style>
