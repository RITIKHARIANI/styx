<div id="new-message">
    <p class="m-header">New Message</p>
        <p class="m-body">
            <form method="post" align="center">
                <input type="text" id="user_name" list="user" onkeyup="check_in_db()" class="message-input" placeholder="user_name" name="user_name"><br><br>
                <textarea name="message" class="message-input" placeholder="Enter your message"></textarea>
                <!-- available users -->
                <datalist id="user"></datalist>
                <br><br>
                <input type="submit" id="send" value="send" name="send">
                <button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
            </form>
        </p>
        <p class="m-footer">click send</p>
    <!--end of new msg-->
</div>


<?php 
    require_once("connection.php");
    if(isset($_POST['send']))
    {
        $sender_name=$_SESSION['username'];
        $receiver_name=$_POST['user_name'];
        $message=$_POST['message'];
        $date= date("Y-m-d h:i:sa");

        $q='INSERT INTO `messages` (`id`,`sender_name`,`receiver_name`,`message_text`,`date_time`)
        VALUES("","'.$sender_name.'","'.$receiver_name.'","'.$message.'","'.$date.'")';
        $r=mysqli_query($con,$q);
        if($r)
        {
            header("location:index.php?user=".$receiver_name);
        }
        else{
            echo $q;
        }

    }
?>
<script src="../jquery/jquery-3.4.1.min.js"></script>
<script>
    
    document.getElementById("send").disabled = true;

    function check_in_db()
    {
        var user_name = document.getElementById("user_name").value;
        $.post("check_in_db.php",
        {
            user: user_name
        },
        function(data,status)
        {
            //alert(data);
            if(data== '<option value="no user">'){
                //if user is registered then button will work
                document.getElementById("send").disabled = true;
            }
            else {
                document.getElementById("send").disabled = false;
            }
            document.getElementById('user').innerHTML=data;
        }
        );
    }
</script>

