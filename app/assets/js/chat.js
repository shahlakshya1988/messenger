$(document).ready(function(){
    // alert("Hello");
    $(".chat-form").keypress(function(e){
        //alert(e.keyCode);
        if(e.keyCode == 13){
            //alert("Enter Key is Pressed");
            var send_message = $("#send_message").val().trim();
            //alert(send_message);
            if(send_message.length != '' && send_message.length != 0 ){
                //alert("Send Message");
                $.ajax({
                    type:"POST",
                    dataType:"JSON",
                    url:"ajax/send_message.php",
                    data:{send_message:send_message},
                    beforeSend:function(){
                        console.log(send_message);
                    },
                    success:function(feedback){
                        //console.log(feedback["status"]);
                        if(feedback["status"] == "success"){
                            $(".chat-form").trigger("reset");
                        }
                    }
                });
            }
        }
    });
});
$(document).on("change","#upload-files",function(){
   // alert("File Uploaded");
    var filepath = $("#upload-files").val().trim();
    if(filepath.length !='' && filepath.length != 0){
        $.ajax({
            type:"POST",
            url:"ajax/send_files.php",
            data:new FormData($(".chat-form")[0]),
            contentType:false,
            processData:false,
            beforeSend:function(){
                console.log(new FormData($(".chat-form")[0]));
            },
            success:function(feedback){
               // alert(feedback);
                if(feedback=="error"){
                    $(".files-error").addClass("show-file-error");
                    setTimeout(function(){
                        $(".files-error").hide("medium");
                    },6000);
                }
            }
        });
    }
});

$(document).click("click",".show-file-error",function(){
    $(".files-error").hide("medium");
});