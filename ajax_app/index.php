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
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name">
            </div>
            <button class="btn btn-success" type="button" id="btn">Enter</button>
        </form>
        <div class="msg">
            
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>    
    <script src="assets/js/bootstrap.bundle.min.js"></script>    
    <script>
        $(document).ready(function(){
           $("#btn").click(function(){
                var name = $("#fullname").val();
                //alert(name);
                //alert("I am working");
                /*$.post("ajax/ajax.php",{name:name,ajax_name:name},function(feedback){
                    console.log(feedback);
                    $(".msg").html(feedback);
                }).fail(function(error){
                    console.clear();
                    console.log(error.status);
                    console.log(error.responseText);

                    alert("There is some error");
                }); */
                $.get("ajax/ajax.php",{name:name,ajax_name:name},function(feedback){
                    console.log(feedback);
                    $(".msg").html(feedback);
                }).fail(function(error){
                    console.log(error);
                    console.log(error.status);
                    console.log(error.responseText);
                });
           });
        });
    </script>
</body>
</html>