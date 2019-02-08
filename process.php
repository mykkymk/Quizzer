<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php
    //check to see if score set_errror_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number + 1;
        
        /**
         * Get total
         */

        $query = "SELECT * FROM `questions`";

        //get results
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;

        /**
         * Get correct choice
         */

         $query = "SELECT * FROM `choices` WHERE question_number = $number and is_correct = 1";

         //get result
         $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

         //get row
         $row = $result->fetch_assoc();

         //set correct choice
         $correct_choice = $row['id'];

         //compare
         if($correct_choice == $selected_choice){
             //Answer is correct
             $_SESSION['score']++;
         }
         //check if last question
         if($number == $total){
             header("Location: final.php");
         }else{
             header("location: question.php?n=".$next);
         }
    }