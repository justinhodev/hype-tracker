// run functions after document has loaded
$('document').ready(function() {
    // ajax update shown products after select value changes
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
    
    // update view if user enters characters into search box
    $('#sneaker_search').unbind().keyup(function(e) {
        var value = $(this).val();
        if (value.length >= 1) {
            search_sneaker(value);
        } else {
            $('#search_result').hide();
            $('#show_product').show();
        }
    });

    // ajax post call to return search results from search box
    function search_sneaker(val) {
        $('#show_product').hide();
        $('#search_result').show();
        $.post('./load_data.php', {
            'search_data' : val
        }, function(data) {
            if (data != "") {
                $('#search_result').html(data);
            } else {
                // default view if no results
                $('#search_result').html("<div class=\"row pl-3\"><div class=\"col-3\">No Result Found...</div></div>");
            }
        });
    }
});

