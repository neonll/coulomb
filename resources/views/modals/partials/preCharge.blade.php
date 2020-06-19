<div class="form-group row">
    <div class="col-sm-4">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="{{ $pre }}preTrigger">
            <label class="custom-control-label" for="{{ $pre }}preTrigger">Предзаряд</label>
        </div>
    </div>
    <div id="{{ $pre }}preParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
        <div class="row mt-3">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="{{ $pre }}preType">
                    <label class="custom-control-label" for="{{ $pre }}preType">Окончание по <span
                                id="{{ $pre }}preTypeSpan">напряжению</span></label>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row align-items-center" id="{{ $pre }}preParamV">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}preParamVInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}preParamVSlider"></div>
                    </div>
                </div>
                <div class="row align-items-center d-none" id="{{ $pre }}preParamT">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}preParamTInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}preParamTSlider"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-4">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="{{ $pre }}preCurType">
                    <label class="custom-control-label" for="{{ $pre }}preCurType">Ток <span
                                id="{{ $pre }}preCurTypeSpan">импульсный</span></label>
                </div>
            </div>
            <div class="col-sm-8">
                <div id="{{ $pre }}preParamImp">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <input type="text" class="input-sm" id="{{ $pre }}preCurMaxInput">
                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <div id="{{ $pre }}preCurMaxSlider"></div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center d-none" id="{{ $pre }}preParamConst">
                    <div class="col-sm-6">
                        <input type="text" class="input-sm" id="{{ $pre }}preConstCurInput">
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div id="{{ $pre }}preConstCurSlider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="{{ $pre }}preParamImp2">
            <div class="row mt-2">
                <div class="col-sm-4">
                    <div>
                        <label class="col-form-label">Длительность импульса</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row align-items-center mt-sm-2">
                        <div class="col-sm-6">
                            <input type="text" class="input-sm" id="{{ $pre }}preDurImpInput">
                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <div id="{{ $pre }}preDurImpSlider"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-4">
                    <div>
                        <label class="col-form-label">Длительность паузы</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row align-items-center mt-sm-2">
                        <div class="col-sm-6">
                            <input type="text" class="input-sm" id="{{ $pre }}prePauseImpInput">
                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                            <div id="{{ $pre }}prePauseImpSlider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
