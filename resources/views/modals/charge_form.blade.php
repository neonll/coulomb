<div class="modal fade" id="modalChargeForm" tabindex="-1" role="dialog" aria-labelledby="modalChargeFormTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChargeFormTitle">Расширенный заряд</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formChargeForm">

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
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <div>
                                        <label class="col-form-label">Максимальное напряжение</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row align-items-center mt-sm-2">
                                        <div class="col-sm-6">
                                            <input type="text" class="input-sm" id="chargeVMaxInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeVMaxSlider"></div>
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
                                            <input type="text" class="input-sm" id="chargeVPivotInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeVPivotSlider"></div>
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
                                            <input type="text" class="input-sm" id="chargeAMaxInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeAMaxSlider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="asymTrigger">
                                        <label class="custom-control-label" for="asymTrigger">Асимметричный заряд</label>
                                    </div>
                                </div>
                                <div id="asymParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div>
                                                <label class="col-form-label">Ток разряда</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row align-items-center mt-sm-2">
                                                <div class="col-sm-6">
                                                    <input type="text" class="input-sm" id="asymADischargeInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="asymADischargeSlider"></div>
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
                                                    <input type="text" class="input-sm" id="asymDurInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="asymDurSlider"></div>
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
                                                    <input type="text" class="input-sm" id="asymRatioInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="asymRatioSlider"></div>
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
                                        <input type="checkbox" class="custom-control-input" id="chargeEndType">
                                        <label class="custom-control-label" for="chargeEndType">Окончание по <span
                                                id="chargeEndTypeSpan">току</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row align-items-center" id="chargeEndParamA">
                                        <div class="col-sm-6">
                                            <input type="text" class="input-sm" id="chargeEndParamAInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeEndParamASlider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2" id="chargeEndParamA2">
                                <div class="col-sm-4">
                                    <div>
                                        <label class="col-form-label">Максимальное время</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row align-items-center mt-sm-2">
                                        <div class="col-sm-6">
                                            <input type="text" class="input-sm" id="chargeEndParamATimeInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeEndParamATimeSlider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 d-none" id="chargeEndParamV">
                                <div class="col-sm-4">
                                    <div>
                                        <label class="col-form-label">Выдержка при напряжении</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row align-items-center mt-sm-2">
                                        <div class="col-sm-6">
                                            <input type="text" class="input-sm" id="chargeEndParamVTimeInput">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div id="chargeEndParamVTimeSlider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- mainCharge tab end --}}

                        {{-- extraCharge tab start --}}
                        <div class="tab-pane fade m-4" id="extraCharge" role="tabpanel" aria-labelledby="extraCharge-tab">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="extraChargeTrigger">
                                        <label class="custom-control-label" for="extraChargeTrigger">Дозаряд</label>
                                    </div>
                                </div>
                                <div id="extraChargeParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
                                    <div class="row mt-2">
                                        <div class="col-sm-4">
                                            <div>
                                                <label class="col-form-label">Диапазон напряжений</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row align-items-center mt-sm-2">
                                                <div class="col-sm-6">
                                                    <input type="text" class="input-sm" id="extraChargeV0Input">
                                                </div>
                                                <div class="col-sm-6 mt-1 mt-sm-0">
                                                    <input type="text" class="input-sm" id="extraChargeV1Input">
                                                </div>
                                                <div class="col-sm-12 mt-2 mt-sm-2">
                                                    <div id="extraChargeVSlider"></div>
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
                                                    <input type="text" class="input-sm" id="extraChargeAInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="extraChargeASlider"></div>
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
                                                    <input type="text" class="input-sm" id="extraChargePeriodInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="extraChargePeriodSlider"></div>
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
                                                    <input type="text" class="input-sm" id="extraChargeTInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="extraChargeTSlider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="preTrigger">
                                        <label class="custom-control-label" for="preTrigger">Предзаряд</label>
                                    </div>
                                </div>
                                <div id="preParamDiv" class="col-sm-12 mt-2 mt-sm-1 d-none">
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="preType">
                                                <label class="custom-control-label" for="preType">Окончание по <span
                                                        id="preTypeSpan">напряжению</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row align-items-center" id="preParamV">
                                                <div class="col-sm-6">
                                                    <input type="text" class="input-sm" id="preParamVInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="preParamVSlider"></div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center d-none" id="preParamT">
                                                <div class="col-sm-6">
                                                    <input type="text" class="input-sm" id="preParamTInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="preParamTSlider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="preCurType">
                                                <label class="custom-control-label" for="preCurType">Ток <span
                                                        id="preCurTypeSpan">импульсный</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="preParamImp">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="input-sm" id="preCurMaxInput">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <div id="preCurMaxSlider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center d-none" id="preParamConst">
                                                <div class="col-sm-6">
                                                    <input type="text" class="input-sm" id="preConstCurInput">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <div id="preConstCurSlider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="preParamImp2">
                                        <div class="row mt-2">
                                            <div class="col-sm-4">
                                                <div>
                                                    <label class="col-form-label">Длительность импульса</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row align-items-center mt-sm-2">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="input-sm" id="preDurImpInput">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <div id="preDurImpSlider"></div>
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
                                                        <input type="text" class="input-sm" id="prePauseImpInput">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <div id="prePauseImpSlider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary">Запуск</button>
            </div>
        </div>
    </div>
</div>
