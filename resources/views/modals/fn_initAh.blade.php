<script>
    function initAhInputProfile(type) {
        return $(`#${type}ProfileAHInput`)
            .change(function () {
                Profile[type].ah = $(this).val();
                initModalForm(type);
            })
    }

    function initAhSliderProfile(type) {
        initSliderInput(type + 'ProfileAH', 'ah', {'start': Profile[type].ah}, {}, true);

        $(`#${type}ProfileAHSlider`)[0].noUiSlider.on('change', function () {
            Profile[type].ahInput.trigger('change');
        })
    }
</script>
