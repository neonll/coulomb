<script>
    let val = id => {
        let el = $('#' + id);

        if (el[0].type === 'checkbox')
            return el[0].checked ? 1 : 0;
        else
            return el.val();
    }
</script>
