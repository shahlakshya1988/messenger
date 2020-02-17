<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".custom-bars").click(function() {
            $("#sidebar").slideToggle();
        });
    });
    $(document).on("click", ".remove", function() {
        $(".flash").fadeOut('slow');
    });
    window.addEventListener("load", function() {
        setTimeout(function() {
            $(".flash").fadeOut('slow');
        }, 5000);
    });

    $(document).on("change", "#change-image", function() {
        var image_name = $("#change-image").val();
        var filename = image_name.split("\\");
        // alert(filename[filename.length -1]);
        $("#change-image-label").html(filename[filename.length - 1]);

    });
</script>
<script type="text/javascript" src="assets/js/chat.js"></script>