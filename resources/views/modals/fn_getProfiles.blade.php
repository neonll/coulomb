<script>
    // Загрузка и отображение существующих профилей
    function getProfiles(type) {
        let lc = type;

        let options = '<option value="0">Новый профиль</option>';

        $.get('/profiles/getProfilesList/' + lc, function (data) {
            $.each(data, function (id, title) {
                options += `<option value="${id}">${title}</option>`;
            })

            Profile[lc].select.html(options);
        })
    }
</script>
