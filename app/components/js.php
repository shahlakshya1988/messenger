<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".custom-bars").click(function(){
            $("#sidebar").slideToggle();
        });
    });
    $(document).on("click",".remove",function(){
        $(".flash").fadeOut('slow');
    });
    setTimeout(function(){
        $(".flash").fadeOut('slow');
    },5000);
</script>