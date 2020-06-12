<script>

    function initTrigger(triggerId, checkedShow, uncheckedShow = null, checkedText = null, uncheckedText = null) {
        function show(el) {
            if ($.isArray(el))
                $.each(el, function (i, val) {
                    $('#' + val).removeClass('d-none');
                })
            else
                $('#' + el).removeClass('d-none');
        }

        function hide(el) {
            if ($.isArray(el))
                $.each(el, function (i, val) {
                    $('#' + val).addClass('d-none');
                })
            else
                $('#' + el).addClass('d-none');
        }

        const $trigger = $('#' + triggerId);

        $trigger.change(function () {
            if (this.checked) {
                if (uncheckedShow !== null) hide(uncheckedShow);
                show(checkedShow);
                if (checkedText !== null) $('#' + triggerId + 'Span').text(checkedText);
            } else {
                hide(checkedShow);
                if (uncheckedShow !== null) show(uncheckedShow);
                if (uncheckedText !== null) $('#' + triggerId + 'Span').text(uncheckedText);
            }
        });
    }
</script>
