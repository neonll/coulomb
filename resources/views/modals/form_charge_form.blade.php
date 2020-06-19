<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="mainCharge-tab" data-toggle="tab" href="#mainCharge" role="tab"
           aria-controls="mainCharge" aria-selected="false">Заряд</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="extraCharge-tab" data-toggle="tab" href="#extraCharge" role="tab"
           aria-controls="extraCharge" aria-selected="false">Дозаряд</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="miscCharge-tab" data-toggle="tab" href="#miscCharge" role="tab"
           aria-controls="miscCharge" aria-selected="true">Прочее</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    {{-- mainCharge tab start --}}
    <div class="tab-pane fade show active m-4" id="mainCharge" role="tabpanel" aria-labelledby="mainCharge-tab">
        @include('modals.partials.mainCharge', ['pre' => ''])
    </div>
    {{-- mainCharge tab end --}}

    {{-- extraCharge tab start --}}
    <div class="tab-pane fade m-4" id="extraCharge" role="tabpanel" aria-labelledby="extraCharge-tab">
        @include('modals.partials.extraCharge', ['pre' => ''])
    </div>
    {{-- extraCharge tab end --}}

    {{-- miscCharge tab start --}}
    <div class="tab-pane fade m-4" id="miscCharge" role="tabpanel" aria-labelledby="miscCharge-tab">
        {{-- delay start --}}
        <div class="form-group row">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="delayTrigger">
                    <label class="custom-control-label" for="delayTrigger">Отсрочка</label>
                </div>
            </div>
            <div id="delayHoursDiv" class="col-sm-8 mt-2 mt-sm-0 d-none">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="delayHoursInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="delayHoursSlider"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- delay end --}}

        <hr class="w-100">

        {{-- pre start --}}
        @include('modals.partials.preCharge', ['pre' => ''])
        {{-- pre end --}}

        <hr class="w-100">

        {{-- post start --}}
        <div class="form-group row">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="postChargeTrigger" checked>
                    <label class="custom-control-label" for="postChargeTrigger">Хранение</label>
                </div>
            </div>
            <div id="postChargeParamDiv" class="col-sm-12">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="postChargeType">
                            <label class="custom-control-label" for="postChargeType"><span
                                        id="postChargeTypeSpan">Поддержание заряда</span></label>
                        </div>
                    </div>
                </div>
                <div id="postChargeParamStore">
                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <div>
                                <label class="col-form-label">Напряжение</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row align-items-center mt-sm-2">
                                <div class="col-sm-6">
                                    <input type="text" class="input-sm" id="postChargeStoreVInput">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div id="postChargeStoreVSlider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <div>
                                <label class="col-form-label">Ток</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row align-items-center mt-sm-2">
                                <div class="col-sm-6">
                                    <input type="text" class="input-sm" id="postChargeStoreAInput">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div id="postChargeStoreASlider"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="postChargeParamRecharge" class="d-none">
                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <div>
                                <label class="col-form-label">Напряжение начала</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row align-items-center mt-sm-2">
                                <div class="col-sm-6">
                                    <input type="text" class="input-sm" id="postChargeRechargeVInput">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div id="postChargeRechargeVSlider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- post end --}}
    </div>
    {{-- misc tab end --}}
</div>

