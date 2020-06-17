<div class="modal fade" id="modalChargeForm" tabindex="-1" role="dialog" aria-labelledby="modalChargeFormTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-10">
                    <div class="row">
                        <div class="col-lg">
                            <h5 class="modal-title" id="modalChargeFormTitle">Расширенный заряд</h5>
                        </div>
                        <div class="col-lg">
                            <select class="form-control-sm" id="modalChargeSelectProfile">
                            </select>
                        </div>
                        <div class="col-xl">
                            <div class="row align-items-center mt-xl-0 mt-2" id="modalChargeProfileParams">
                                <div class="col-sm-6">
                                    <input type="text" class="input-sm" id="chargeProfileAHInput">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <div id="chargeProfileAHSlider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="formChargeForm">@include('modals.form_charge_form')</form>
            </div>
            <div class="modal-footer justify-content-start">
                <div class="row w-100">
                    <div class="col-lg justify-content-start">
                        <button type="button" class="btn btn-primary" id="modalChargeSave">Сохранить</button>
                    </div>
                    <div class="col-lg mt-2 mt-lg-0 d-flex justify-content-lg-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary" id="modalChargeFormSubmit">Запуск</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
