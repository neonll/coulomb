<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="serviceDischarge-tab" data-toggle="tab" href="#serviceDischarge" role="tab"
           aria-controls="serviceDischarge" aria-selected="false">Разряд</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="serviceCharge-tab" data-toggle="tab" href="#serviceCharge" role="tab"
           aria-controls="serviceCharge" aria-selected="false">Заряд</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    {{-- serviceDischarge tab start --}}
    <div class="tab-pane fade show active m-4" id="serviceDischarge" role="tabpanel" aria-labelledby="serviceDischarge-tab">
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Минимальное напряжение</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="dischargeVInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="dischargeVSlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Ток разряда</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="dischargeAInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="dischargeASlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Пауза перед</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="dischargePauseInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="dischargePauseSlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="dischargeExtraTrigger">
                    <label class="custom-control-label" for="dischargeExtraTrigger">Доразряд</label>
                </div>
            </div>
            <div id="dischargeExtraParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <div>
                            <label class="col-form-label">Увеличение напряжения</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row align-items-center mt-sm-2">
                            <div class="col-sm-6">
                                <input type="text" class="input-sm" id="dischargeExtraVInput">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <div id="dischargeExtraVSlider"></div>
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
                                <input type="text" class="input-sm" id="dischargeExtraAInput">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <div id="dischargeExtraASlider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <div>
                            <label class="col-form-label">Пауза</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row align-items-center mt-sm-2">
                            <div class="col-sm-6">
                                <input type="text" class="input-sm" id="dischargeExtraPauseInput">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <div id="dischargeExtraPauseSlider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <div>
                            <label class="col-form-label">Макс. время</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row align-items-center mt-sm-2">
                            <div class="col-sm-6">
                                <input type="text" class="input-sm" id="dischargeExtraHoursInput">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <div id="dischargeExtraHoursSlider"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- serviceDischarge tab end --}}

    {{-- serviceCharge tab start --}}
    <div class="tab-pane fade m-4" id="serviceCharge" role="tabpanel" aria-labelledby="serviceCharge-tab">
        <div class="form-group row">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="serviceChargeTrigger">
                    <label class="custom-control-label" for="serviceChargeTrigger">Заряд</label>
                </div>
            </div>
            <div id="serviceChargeParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
                @include('modals.partials.preCharge', ['pre' => 'service'])
                <hr class="w-100">
                @include('modals.partials.mainCharge', ['pre' => 'service'])
                <hr class="w-100">
                @include('modals.partials.extraCharge', ['pre' => 'service'])
                <hr class="w-100">
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <div>
                            <label class="col-form-label">Число циклов</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row align-items-center mt-sm-2">
                            <div class="col-sm-6">
                                <input type="text" class="input-sm" id="cyclesCountInput">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <div id="cyclesCountSlider"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- serviceCharge tab end --}}

</div>

