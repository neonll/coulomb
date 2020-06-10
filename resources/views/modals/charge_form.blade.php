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
                            <a class="nav-link active" id="charge-tab" data-toggle="tab" href="#charge" role="tab"
                               aria-controls="charge" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="misc-tab" data-toggle="tab" href="#misc" role="tab"
                               aria-controls="misc" aria-selected="true">Прочее</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active m-4" id="charge" role="tabpanel" aria-labelledby="charge-tab">...</div>
                        <div class="tab-pane fade m-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>


                        {{-- misc tab start --}}
                        <div class="tab-pane fade m-4" id="misc" role="tabpanel" aria-labelledby="misc-tab">
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
                                                        id="preCurTypeSpan">испульсный</span></label>
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
                                                    <label class="col-form-label">Длительность импульса</label>
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
