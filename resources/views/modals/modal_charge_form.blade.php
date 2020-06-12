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
                <form id="formChargeForm">@include('modals.form_charge_form')</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary">Запуск</button>
            </div>
        </div>
    </div>
</div>
