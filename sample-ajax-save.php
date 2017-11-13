<?php 
include dirname(__FILE__) . '/config.php';

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'clearMatch':

        $tid = $_POST['tid'];

        $a_o=$_POST['a_o'];
        $school_level=$_POST['school_level'];
        $sex = $_POST['sex'];
        $category = $_POST['category'];

        if(is_numeric($tid)){
            $tid = mysqli_real_escape_string($con, $tid);
            // Get tournament 
            $query = mysqli_query($con, 'SELECT * FROM `tournament` WHERE `id` = ' . $tid );
            if(mysqli_num_rows($query) > 0){
                $tournament = mysqli_fetch_object($query);

                // Check if tournament already exists on match result
                $check = mysqli_query($con, 'SELECT `result_id` FROM `match_results` WHERE `tournament_id` = ' . $tid." AND advanceornovice = '$a_o' AND school_level = '$school_level' AND sex = '$sex' AND category = '$category'");

                // Update when match is found
                if(mysqli_num_rows($check) > 0){
                    $row = mysqli_fetch_object($check);
                    $result_id = $row->result_id;
                    $rem = mysqli_query($con, 'DELETE FROM `match_results` WHERE `result_id` = '.$result_id);
                }

                echo json_encode([
                    'status' => 1,
                    'message' => 'Cleared data!'
                ]);
            }
        }else{
            echo json_encode([
                'status' => 0,
                'message' => 'Error clearing data!'
            ]);
        }

        break;
        case 'saveMatch':
            $tid = $_POST['tid'];
            $data = $_POST['data'];

            $a_o=$_POST['a_o'];
            $school_level=$_POST['school_level'];
            $sex = $_POST['sex'];
            $category = $_POST['category'];

            if(is_numeric($tid)){
                $tid = mysqli_real_escape_string($con, $tid);
                $data = mysqli_real_escape_string($con, $data);

                // Get tournament 
                $query = mysqli_query($con, 'SELECT * FROM `tournament` WHERE `id` = ' . $tid );
                if(mysqli_num_rows($query) > 0){
                    $tournament = mysqli_fetch_object($query);

                    // Check if tournament already exists on match result
                    $check = mysqli_query($con, 'SELECT `result_id` FROM `match_results` WHERE `tournament_id` = ' . $tid." AND advanceornovice = '$a_o' AND school_level = '$school_level' AND sex = '$sex' AND category = '$category'");

                    // Update when match is found
                    if(mysqli_num_rows($check) > 0){
                        $row = mysqli_fetch_object($check);
                        $result_id = $row->result_id;
                        $update = mysqli_query($con, 'UPDATE `match_results` SET `result_data` = "'.$data.'", `last_modified` = CURRENT_TIMESTAMP WHERE `result_id` = '. $result_id . ' AND `tournament_id` = '. $tid);
                    }else{
                        $insert= mysqli_query($con, 'INSERT INTO `match_results`(`tournament_id`, `result_data`, `school_level`, `advanceornovice`, `sex`, `category`) VALUES('. $tid .', "'. $data .'", "'.$school_level.'", "'.$a_o.'", "'.$sex.'", "'.$category.'")');
                    }

                    echo json_encode([
                        'status' => 1,
                        'message' => 'Saved successful!'
                    ]);
                }
            }else{
                echo json_encode([
                    'status' => 0,
                    'message' => 'Error saving match making result!'
                ]);
            }
        break;


    }
}