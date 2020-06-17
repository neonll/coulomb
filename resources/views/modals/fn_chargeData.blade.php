@include('modals.fn_val')

<script>
    let chargeData = () => {
        return {
            'tekhtm': 'ch_akb5.htm',
            'setdelZb': val('delayTrigger'),
            'delayHoursInput': val('delayHoursInput'),
            'stZb': val('preTrigger'),
            'predT': val('preType') === 1 ? 0 : 1,
            'stZU': val('preParamVInput'),
            'PredCH': val('preParamTInput'),
            'stZm': val('preCurType') === 1 ? 0 : 1,
            'stZIdc': val('preConstCurInput'),
            'stZIp': val('preCurMaxInput'),
            'stZIon': val('preDurImpInput'),
            'stZIoff': val('prePauseImpInput'),
            'mainZU': val('chargeVMaxInput'),
            'lastZU': val('chargeVPivotInput'),
            'mainZI': val('chargeAMaxInput'),
            'mainZR': val('asymTrigger'),
            'asiZI': val('asymADischargeInput'),
            'mainZRQ': val('asymDurInput'),
            'mainZRD': val('asymRatioInput'),
            'lastZF': val('chargeEndType') === 1 ? 0 : 1,
            'lastZFI': val('chargeEndParamAInput'),
            'mchDH': val('chargeEndParamATimeInput'),
            'lastZFT': val('chargeEndParamVTimeInput'),
            'mainDopCh': val('extraChargeTrigger'),
            'flastZUL': val('extraChargeV0Input'),
            'flastZUH': val('extraChargeV1Input'),
            'flowZI': val('extraChargeAInput'),
            'flowZT': val('extraChargePeriodInput'),
            'flowZH': val('extraChargeTInput'),
            'sbyZb': val('postChargeTrigger'),
            'sbySbm': val('postChargeType') === 1 ? 0 : 1,
            'sbyZU': val('postChargeStoreVInput'),
            'sbyZIp': val('postChargeStoreAInput'),
            'cyclZU': val('postChargeRechargeVInput'),
            'start': 'Старт'
        };
    }
</script>
