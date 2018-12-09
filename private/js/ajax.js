$('document').ready(function() {
    $('#brand').change(function() {
        var brand_id = $(this).val();
        $.ajax({
            url: "./load_data.php",
            method: "POST",
            data: {brand_id : brand_id},
            success: function (data) {
                $('#show_product').html(data);
            }
        });
    });
});