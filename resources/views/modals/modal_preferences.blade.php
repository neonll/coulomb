<div class="modal fade" id="modalPreferences" tabindex="-1" role="dialog" aria-labelledby="modalPreferencesTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-10">
                    <h5 class="modal-title" id="modalPreferencesTitle">Настройки</h5>
                </div>
                <div class="col-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="formPreferences">
                    <div class="form-group row">
                        <label for="prefIp" class="col-sm col-form-label">IP Кулона:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="prefIp" placeholder="192.168.1.5" value="{{ env('COULOMB_IP') }}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary" id="modalPreferencesSubmit">Сохранить</button>
            </div>
        </div>
    </div>
</div>
