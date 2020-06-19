<div class="form-group row">
    <div class="col-sm-4">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="{{ $pre }}extraChargeTrigger">
            <label class="custom-control-label" for="{{ $pre }}extraChargeTrigger">Дозаряд</label>
        </div>
    </div>
    <div id="{{ $pre }}extraChargeParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Диапазон напряжений</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}extraChargeV0Input">
                    </div>
                    <div class="col-sm-6 mt-1 mt-sm-0">
                        <input type="text" class="input-sm" id="{{ $pre }}extraChargeV1Input">
                    </div>
                    <div class="col-sm-12 mt-2 mt-sm-2">
                        <div id="{{ $pre }}extraChargeVSlider"></div>
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
                        <input type="text" class="input-sm" id="{{ $pre }}extraChargeAInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}extraChargeASlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Длительность периода</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}extraChargePeriodInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}extraChargePeriodSlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-4">
                <div>
                    <label class="col-form-label">Продолжительность дозаряда</label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center mt-sm-2">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}extraChargeTInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}extraChargeTSlider"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
