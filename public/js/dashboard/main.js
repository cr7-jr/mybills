$(document).ready(function() {
    var channel = window.Echo.channel("private-new-question");
    channel.listen(".add", function(data) {
        /*var spanNotiCount = $(".span-noti-count ");
        spanNotiCount.text(parseInt(spanNotiCount.text()) + 1);*/

        /*if (spanNotiCount.text() != 0) {
            spanNotiCount.removeClass("d-none");
            spanNotiCount.fadeIn(100);
        }*/
        window.livewire.emit("renderListNotifications");
    });
    $(".filter-date").on("change", function() {
        $(this)
            .closest("form")
            .submit();
    });
    if (!($(".span-notifications").text() == 0)) {
        $(".span-notifications").css("display", "block");
    }
    $(".con-span-noti-count").on("click", function() {
        $(this).width("42.797");
    });
});
