<?php 

session_start();

if (isset($_SESSION['theuser'])) {
    $logged_name = $_SESSION['theuser'];
    $logged_id = $_SESSION['theuser_id'];
    $unique_id = $_SESSION['unique_id'];

    include_once 'config/connection.php';

    $outgoing_id = $_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];
    $output = "";

    $sql = mysqli_query($con, "select * from messages where (incoming_msg_id={$incoming_id} AND outgoing_msg_id={$outgoing_id}) OR (incoming_msg_id={$outgoing_id} AND outgoing_msg_id={$incoming_id}) ORDER BY msg_id");

    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_array($sql)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) { //if he is msg sender

                $output .='<div class="main-message-box ta-right">
                                <div class="message-dt">
                                    <div class="message-inner-dt">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>
                            </div>';

            }else{ // if he is msg receiver

                $output .='<div class="main-message-box st3">
                                <div class="message-dt st3">
                                    <div class="message-inner-dt">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>
                            </div>';

            }
        }

        echo $output;
    }
}

?>