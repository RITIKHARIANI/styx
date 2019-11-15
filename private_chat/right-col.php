<div class="right-col-container">
    <div id="messages-container">

    <?php 

        $no_message=false;

        if(isset($_GET['user'])){
            $_GET['user']= $_GET['user'];
        }else{
            //user variable is not in url bar
            //so select last user , you have sent messagae
            $q='SELECT `sender_name`, `receiver_name` FROM `messages`
                WHERE `sender_name`="'.$_SESSION['username'].'"
                OR `receiver_name`="'.$_SESSION['username'].'"
                ORDER BY `date_time` DESC LIMIT 1';
            $r=mysqli_query($con, $q);
            if($r)
            {
                if(mysqli_num_rows($r)>0){
                    while($row=mysqli_fetch_assoc($r)){
                        $sender_name=$row['sender_name'];
                        $receiver_name=$row['receiver_name'];

                        if($_SESSION['username'] == $sender_name){
                            $_GET['user']=$receiver_name;

                        }else{
                            $_GET['user'] = $sender_name;
                        }
                    }
                }else{
                    //this user hasnt sent any message
                    echo 'no messages from you';
                    $no_message=true;
                }
            }else{
                echo $q;
            }
        }

        if($no_message == false)
        {
        $q='SELECT *FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'"
            AND `receiver_name` = "'.$_GET['user'].'"
            OR
            `sender_name`="'.$_GET['user'].'" AND `receiver_name`="'.$_SESSION['username'].'" ';
        $r=mysqli_query($con,$q);

        if($r)
        {
            while($row=mysqli_fetch_assoc($r))
            {
                $sender_name=$row['sender_name'];
                $receiver_name=$row['receiver_name'];
                $message=$row['message_text'];

                //check who the sender is
                if($sender_name== $_SESSION['username'])
                {
                    //show grey back
                    ?>
                    <div class="grey-message">
                        <a href="#">Me</a>
                        <p><?php echo $message; ?> </p>
                    </div>

                    <?php
                }else{
                    ?>
                    <div class="white-message">
                        <a href="#"><?php echo $sender_name; ?></a>
                        <p> <?php echo $message; ?> </p>
                    </div>
                    <?php
                }
            }
        }else{
            echo $q;
        }
    
    }//end of no_message 

    ?>
       

        <!--end of message container -->
    </div>
    <form method="POST" id="message-form">
    <textarea id="message_text" placeholder="Enter your message" class="textarea"></textarea>
    </form>

    <!--end of right - col - container -->
</div>

<script src="../jquery/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function(event){

        $("#right-col-container").on('submit','#message-form',function(){
            var message_text=$('#message_text').val();
        
        //send the data to send to sending_process.php
        $.post("sending_process.php?user=<?php echo $_GET['user']; ?>",
        {
            text:message_text,
        },
        //in return we get 
        function(data,status){
            //remove text from message_text

            $("#message_text").val("");

            //now adding data to message container
            document.getElementById("messages-container").innerHTML +=data;
        }
        );
    });
        //if any button is clicked inside right container
        $("#right-col-container").keypress(function(e){
            
        if(e.keyCode==13 && !e.shiftKey){
            //enter is clicked without shift key
            
            $("#message-form").submit();
        }
        
        });
    });


</script>