$(document).ready(function() {
    $('#shareProgress').hide();

    $('.send').click(function(e) {
        e.preventDefault();
        $('.receive').prop("disabled", true);
        $('#shareProgress').show();
        console.log("Sending file...");
        $('#shareProgress').delay(10000).fadeOut(300);
        $('.receive').prop("disabled", false);
    })

    $('.receive').click(function(e) {
        e.preventDefault();
        $('.send').prop("disabled", true);
        $('#shareProgress').show();
        console.log("Receiving file...");
        $('#shareProgress').delay(10000).fadeOut(300);
        $('.send').prop("disabled", false);
    })
})
