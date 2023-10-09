
jQuery(".buy-book-button").click(function (e){
    e.preventDefault();
    var nid = jQuery(this).attr("nid");
    jQuery.ajax({
        url: Drupal.url('call/ajax/inventory'),
        type: "POST",
        data: {book_id:nid },
        dataType: "json",
        beforeSend: function(x) {
            if (x && x.overrideMimeType) {
            x.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function(result) {
        console.log(result);
        alert(result);
        }
        });
        return false;
})
