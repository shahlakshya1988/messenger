<?php require __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class();
if (isset($_GET["message"]) && !empty(trim($obj->security($_GET["message"])))) {
    //echo "<pre>",print_r($_GET),"</pre>";
    /** we will fetch clean_message_id */
    $query = "SELECT `clean_message_id` from `clean` where `clean_user_id` = :clean_user_id";
    $param = array(":clean_user_id" => $_SESSION["user_id"]);
    $obj->normalQuery($query, $param);
    $result = $obj->fetch_single();
    $clean_message_id = $result->clean_message_id;
    // echo "<pre>",print_r($result),"</pre>";
    $fetch_last_message_id_query = "SELECT `message_id` FROM `messages`  order by `message_id` DESC LIMIT 1";
    $obj->normalQuery($fetch_last_message_id_query);
    $result_last_message_id = $obj->fetch_single();
    $last_message_id = $result_last_message_id->message_id;
    //echo $last_message_id;
    /** we will fetch clean_message_id */

    /*** we will fetch messages between those ids clean_message_id and last_message_id */
    $query = "SELECT * FROM `messages` inner join `users` on `messages`.`user_id` = `users`.`id` where `messages`.`message_id` BETWEEN :clean_message_id and :last_message_id ORDER BY `messages`.`message_id` ASC ";
    $param = array(":clean_message_id" => $clean_message_id, ":last_message_id" => $last_message_id);
    $obj->normalQuery($query, $param);
    if ($obj->countRows()) {
        $result_msg = $obj->fetch_all();
        //echo "<pre>",print_r($result_msg),"</pre>";
        foreach ($result_msg as $msg) {
            $message_html_txt = "";
            // print_r($msg);
            $fullname = ucfirst($msg->name);
            $email = $msg->email;
            $user_image = $msg->image;
            $user_status = $msg->status;

            $message = $msg->message;
            $message_type = $msg->msg_type;
            $message_user_id = $msg->user_id;
            $message_time = $msg->msg_time;
            $message_time_diff = $obj->time_age($message_time);

            if ($message_user_id == $_SESSION["user_id"]) {
                $message_html_txt .= '<!-- div.right-message -->
    <div class="right-message common-margin">
        <div class="right-msg-area">
            <span class="date-time right-time">
               <span class="send_message_mark">&#10004;</span> '.$message_time_diff.'
            </span>
            <!-- span.date-time -->';
            if ($message_type == "text" ) {
                $message_html_txt .= ' <div class="right-msg">';
            }else{
                $message_html_txt .= ' <div class="right-files">';
            }

                /**** message type ****/
                if ($message_type == "xls" || $message_type == "xlsx") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-excel"></i>' . $message . '</a></p>';
                } elseif ($message_type == "doc" || $message_type == "docx") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-word"></i>' . $message . '</a></p>';
                } elseif ($message_type == "zip") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down"></i>' . $message . '</a></p>';
                } elseif ($message_type == "jpg" || $message_type == "jpeg") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '" class="common-images"></p>';
                } elseif ($message_type == "png") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '"></p>';
                } elseif ($message_type == "gif") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '"></p>';
                } elseif ($message_type == "pdf") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-pdf"></i>' . $message . '</a></p>';
                } elseif ($message_type == "text") {
                    $message_html_txt .= '<p>' . $message . '</p>';
                } elseif ($message_type == "emoji") {
                    $message_html_txt .= '<p><img src="' .$message . '" class="animated-emoji"/></p>';
                }
                /**** message type ****/




                $message_html_txt .= '</div>
            <!-- div.right-msg -->
        </div>
        <!-- div.right-msg-area -->
    </div>
    <!-- div.right-message -->';
                echo $message_html_txt;
            } else {
                $message_html_txt .= '<div class="left-message common-margin">
        <div class="sender-img-block">
            <img src="assets/img/' . $user_image . '" class="sender-img" alt="' . $fullname . '">';
            if($user_status == 1){
                $message_html_txt .= '<span class="online-icon"></span>';
            }else{
                $message_html_txt .= '<span class="offline-icon"></span>';
            }
            
            
            $message_html_txt .='</div>
        <!-- div.sender-img-block -->
        <div class="left-msg-area">
            <div class="user-name-date">
                <span class="sender-name">
                    ' . $fullname . '
                </span>
                <!-- span.sender-name -->
                <span class="date-time">
                '.$message_time_diff.'
                </span>
                <!-- span.date-time -->
            </div>
            <!-- div.user-name-date -->';
            if ($message_type == "text" ) {
                $message_html_txt .= ' <div class="left-msg">';
            }else{
                $message_html_txt .= ' <div class="left-files">';
            }

                /**** message type ****/
                if ($message_type == "xls" || $message_type == "xlsx") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-excel"></i>' . $message . '</a></p>';
                } elseif ($message_type == "doc" || $message_type == "docx") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-word"></i>' . $message . '</a></p>';
                } elseif ($message_type == "zip") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down"></i>' . $message . '</a></p>';
                } elseif ($message_type == "jpg" || $message_type == "jpeg") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '" class="common-images"></p>';
                } elseif ($message_type == "png") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '"></p>';
                } elseif ($message_type == "gif") {
                    $message_html_txt .= '<p><img src="assets/img/' . $message . '"></p>';
                } elseif ($message_type == "pdf") {
                    $message_html_txt .= '<p><a href="assets/img/" download="'.$message.'" class="all-files"><i class="fas fa-file-pdf"></i>' . $message . '</a></p>';
                } elseif ($message_type == "text") {
                    $message_html_txt .= '<p>' . $message . '</p>';
                } elseif ($message_type == "emoji") {
                    $message_html_txt .= '<p><img src="' .$message . '" class="animated-emoji"/></p>';
                }
                /**** message type ****/

                $message_html_txt .= '
            </div>
            <!-- div.left-msg -->
        </div>
        <!-- div.left-msg-area -->
    </div>
    <!-- div.left-message -->';
                echo $message_html_txt;
            }

            // echo "<br><br>";
        }
    } else {
        echo "<p class='clean_message_output'>Lets Start Converations With Your Friends !!!!</p>";
    }

    /*** we will fetch messages between those ids clean_message_id and last_message_id */
}
