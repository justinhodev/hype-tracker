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
    
    $('#sneaker_search').unbind().keyup(function(e) {
        var value = $(this).val();
        if (value.length > 1) {
            search_sneaker(value);
        } else {
            $('#search_result').hide();
            $('#show_product').show();
        }
    });

    function search_sneaker(val) {
        $('#show_product').hide();
        $('#search_result').show();
        $.post('./load_data.php', {
            'search_data' : val
        }, function(data) {
            if (data != "") {
                $('#search_result').html(data);
            } else {
                $('#search_result').html("<div class=\"row pl-3\"><div class=\"col-3\">No Result Found...</div></div>");
            }
        });
    }
});

