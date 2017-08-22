$( document ).ready(function() {
    var hiddenMailOptions = function() {
        if($('.checkbox-mail:checked').length) {
            $('.mail-hidden-options').css('display', 'inline-block');
        } else {
            $('.mail-hidden-options').css('display', 'none');
        };
    };

    hiddenMailOptions();

    //  $('.check-mail-all').click(function () {
    // $('.checkbox-mail').click();

    $(document).on('click', '.check-mail-all', function(){
        if($(this).is(':checked')){
            $('.checkbox-mail').prop('checked', true);
            $(this).closest('tr').addClass('checked');
            hiddenMailOptions();
        } else {
            $('.checkbox-mail').prop('checked', false);
            $(this).closest('tr').removeClass('checked');
            hiddenMailOptions();
        }
    });


    // });

    /*    $('.checkbox-mail').each(function(e) {
     //e.stopImmediatePropagation();
     //e.stopPropagation();
     $(this).click(function() {
     if($(this).closest('tr').hasClass("checked")){
     $(this).closest('tr').removeClass('checked');
     //e.stopPropagation();
     hiddenMailOptions();
     } else {
     $(this).closest('tr').addClass('checked');
     // e.stopPropagation();
     hiddenMailOptions();
     }
     });
     });*/

    $('#emailId tbody').on('click', "tr", function(e) {
        var id = $(this).attr("data-id");
        // alert(id);
        $.ajax({
            type: "GET",
            url: "mail/"+id
        })
            .done(function()
            {
                window.location = "mail/"+id;
                //location.reload();

            });

    });

});
