<div class="row mt-2">
    <div class="col-sm-4">
        <div>
            <label class="col-form-label">Максимальное напряжение</label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center mt-sm-2">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeVMaxInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeVMaxSlider"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-4">
        <div>
            <label class="col-form-label">Начало снижения тока</label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center mt-sm-2">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeVPivotInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeVPivotSlider"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-4">
        <div>
            <label class="col-form-label">Максимальный ток</label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center mt-sm-2">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeAMaxInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeAMaxSlider"></div>
            </div>
        </div>
    </div>
</div>
<hr class="w-100">
<div class="form-group row">
    <div class="col-sm-4">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="{{ $pre }}asymTrigger">
            <label class="custom-control-label" for="{{ $pre }}asymTrigger">Асимметричный заряд</label>
        </div>
    </div>
    <div id="{{ $pre }}asymParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Ток разряда</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}asymADischargeInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}asymADischargeSlider"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Период заряда</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}asymDurInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}asymDurSlider"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Длительность разряд/заряд</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}asymRatioInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}asymRatioSlider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="w-100">
<div class="row mt-3">
    <div class="col-sm-4">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="{{ $pre }}chargeEndType">
            <label class="custom-control-label" for="{{ $pre }}chargeEndType">Окончание по <span
                        id="{{ $pre }}chargeEndTypeSpan">току</span></label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center" id="{{ $pre }}chargeEndParamA">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeEndParamAInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeEndParamASlider"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2" id="{{ $pre }}chargeEndParamA2">
    <div class="col-sm-4">
        <div>
            <label class="col-form-label">Максимальное время</label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center mt-sm-2">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeEndParamATimeInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeEndParamATimeSlider"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2 d-none" id="{{ $pre }}chargeEndParamV">
    <div class="col-sm-4">
        <div>
            <label class="col-form-label">Выдержка при напряжении</label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row align-items-center mt-sm-2">
            <div class="col-sm-6">
                <input type="text" class="input-sm" id="{{ $pre }}chargeEndParamVTimeInput">
            </div>
            <div class="col-sm-6 mt-2 mt-sm-0">
                <div id="{{ $pre }}chargeEndParamVTimeSlider"></div>
            </div>
        </div>
    </div>
</div>
