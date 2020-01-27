<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Basics</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <form action="">
            <button class="btn btn-success" type="button" id="btn">Enter</button>
        </form>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>    
    <script src="assets/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
           $("#btn").click(function(){
                //alert("I am working");
                $.post("aja/ajax.php",{},function(feedback){
                    console.log(feedback);
                }).fail(function(error){
                    console.clear();
                    console.log(error.status);
                    console.log(error.responseText);
                    alert("There is some error");
                });
           });
        });
    </script>
</body>
</html>