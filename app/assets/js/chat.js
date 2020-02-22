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
                        //console.log(send_message);
                    },
                    success:function(feedback){
                        //console.log(feedback["status"]);
                        show_messages();
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
               // console.log(new FormData($(".chat-form")[0]));
            },
            success:function(feedback){
               // alert(feedback);
                if(feedback=="error"){
                    $(".files-error").addClass("show-file-error");
                    setTimeout(function(){
                        $(".files-error").hide("medium",function(){
                            $(".files-error").removeClass("show-file-error");
                        });
                    },7000);
                }else if(feedback=="success"){
                    // alert(feedback);
                    show_messages();
                    $(".files-success").addClass("show-file-success");
                    setTimeout(function(){
                        $(".files-success").hide("medium",function(){
                            $(".files-success").removeClass("show-file-success");
                        });
                    },7000);

                }
            }
        });
    }
});

$(document).on("click",".show-file-error",function(){
    $(".files-error").hide("medium",function(){
        $(".files-error").removeClass("show-file-error");
    });
});

$(document).on("click",".show-file-success",function(){
    $(".files-success").hide("medium",function(){
        $(".files-success").removeClass("show-file-success");
    });
});

$(document).on("click",".emoji-same",function(e){
    var source = $(this).attr("src");
    $.ajax({
        type:"POST",
        data:{send_emoji : source},
        url:"ajax/send_emojis.php",
        dataType:"JSON",
        beforeSend:function(){

        },
        success:function(feedback){
            show_messages();
        }

    });
});

/**
 *show messages
 *this will fetch the messages from the database
 */
function show_messages(){
    var message = true;
    $.ajax({
        type:"GET",
        url:"ajax/show_messages.php",
        data:{message:message},
        success:function(feedback){
            //console.log(feedback);
            $(".messages").html(feedback);
        }

    });
}
show_messages();
function count_online_users(){
    //var count = 0;
    // console.log("Called");
    $.ajax({
        type:"GET",
        url:"ajax/count_online_user.php",
        dataType:"JSON",
        success:function(feedback){
           // console.log(feedback);
            count = feedback["count"];
            $(".currently_active_users").html(count);
        }
    });
}
count_online_users();
window.addEventListener("load",function(){
    try{
        $(".messages").animate({scrollTop:$(".messages")[0].scrollHeight},1000);
    }catch(e){
        
    }
    setInterval(function(){
        show_messages();
        // count_online_users();
    },3000);
    setInterval(function(){
        // show_messages();
         count_online_users();
    },20000);

    setInterval(function(){
        // show_messages();
         $(".loader-area").hide();
    },4000);
});

$(document).on("click",".delete_messages_a",function(){
    var delete_message = true;
    $.ajax({
        type:"POST",
        url:"ajax/delete_messages.php",
        dataType:"JSON",
        success:function(feedback){
            //console.log(feedback);
            if(feedback["status"] == "success"){
                location.href="index.php";
            }
        }
    });
});