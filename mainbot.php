<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat_Bot</title>
    <link rel="stylesheet" href="css/bot.css">
</head>

<body>
    <div id="container">
        <div id="dot1"></div>
        <div id="dot2"></div>

        <div id="screen">
            <div id="head">Online ChatBot</div>
            <div id="messageDisplaySection">
                <!-- bot messages -->
                <!-- <div class="chat botMessages">Hello there, how can I help you.</div>
                userMessages -->
                <!-- <div id="messagesContainer">
                    <div class="chat usersMessages">I need your help to build a wesite.</div>
                </div> -->
            </div>

                <!-- message input field -->
                <div id="userInput">
                    <input type="text" name="messages" id="messages" autocapitalize="OFF" placeholder="Type Your Message  here ." required>
                    <input type="submit" value="send" id="send" name="send">
                </div>
        </div>
    </div>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Jquery start -->
    <script>
    $(document).ready(function(){
        $("#messages").on("keyup",function(){
            if($("#messages").val()){
            $("#send").css("display","block");
        }else{
            $("#send").css("display","none");
        }

        });
       
    });
    // send button clicked function
    $("#send").on("click",function(e){
        $userMessage=$("#messages").val();
        $appendUserMessage='<div class="chat userMessages">'+ $userMessage + '</div>';
        $("#messageDisplaySection").append($appendUserMessage);

        // Ajax  Start --->
        $.ajax({
            url:"bot.php",
            type:"POST",
            // SEnding Data
            data:{messageValue:$userMessage},
            // Response text
            success:function(data){
            $appendBotResponse='<div id= "messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
            $("#messageDisplaySection").append($appendBotResponse);
            }
        });
        $("#messages").val("");
          $("#send").css("display","none");

    });
    </script>
</body>

</html>