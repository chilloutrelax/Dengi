<template>
    <div>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="thisMonth-tab"
                        data-toggle="tab"
                        href="#thisMonth"
                        role="tab"
                        aria-controls="thisMonth"
                        aria-selected="true"
                    >
                        <h6>Käesolev kuu</h6></a
                    >
                </li>
            </ul>
            <div class="tab-content" id="overviews">
                <div
                    class="tab-pane fade show active"
                    id="thisMonth"
                    role="tabpanel"
                    aria-labelledby="thisMonth-tab"
                ></div>

                <div class="">
                    <OverviewCurrent></OverviewCurrent>
                </div>
            </div>
        </div>
    </div>
</template>
