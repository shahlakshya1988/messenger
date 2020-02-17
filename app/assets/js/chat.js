$(document).ready(function(){
    // alert("Hello");
    $(".chat-form").keypress(function(e){
        //alert(e.keyCode);
        if(e.keyCode == 13){
            //alert("Enter Key is Pressed");
            var send_message = $("#send_message").val().trim();
            //alert(send_message);
            if(send_message.length != '' || send_message.length != 0 ){
                //alert("Send Message");
                $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url:"ajax/send_message.php",
                    data:{send_message:send_message},
                    beforeSend:function(){
                        console.log(send_message);
                    },
                    success:function(response){
                        console.log(response);
                    }
                });
            }
        }
    });
});