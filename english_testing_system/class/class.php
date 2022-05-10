<!-- Functions to enable features -->

<?php
class Database{

    public $host = "silva.computing.dundee.ac.uk";
    public $user = "het";
    public $password = "5754.het.4575";
    public $database = "hetdb";
    
    public $mysqli;
    public $error;

    public function __construct(){
        $this->default_connection();
    }

    private function default_connection(){
        $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        // echo "Connection successful.<br/>"; 
        if(!$this->mysqli){
            $this->error = "Connection error: ".$this->mysqli->connect_error;
        return false;
        }
    }

    public function query($sql){ 
        $result = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__); 
        if($result->num_rows > 0){
          return $result;
        } else {
          return false;
        }
    }
}

?>

<?php

class Format{

  // Formatting time - converting text time to UNIX numeric time (seconds from 1970 to the present)
  public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));  
  }

  public function validation($data){
    $data = trim($data);
    $data = stripcslashes($data); // Delete backslash
    $data = htmlspecialchars($data); // Convert escaped symbols to normal symbols
    return $data;
  }

}
?>

<?php
class User{

    private $database;
    private $format;

    public function __construct(){
      $this->database = new Database();
      $this->format = new Format();
    }


    public function user_array(){
      $sql = "SELECT * FROM `user` ORDER BY `user_id` DESC";

      $sql_result = $this->database->query($sql);
      return $sql_result;
    }

    public function user_by_id($user_id){
      $sql = "SELECT * FROM `user` WHERE `user_id`='$user_id'";
      $sql_result = $this->database->query($query);
      return $sql_result;
    }

    public function disable_user($user_id){
      $sql = "UPDATE `user` SET `is_actice` = 1 where `user_id` = '$user_id'";
      $sql_result = $this->database->query($sql);
      if($sql_result){
        $msg = "<span class = 'success'>User disabled.</span>";
        return $msg;
      }
      else{
        $msg = "<span class = 'error'>User not disabled.</span>";
        return $msg;
      }
    }

    public function enable_user($user_id){
      $sql = "UPDATE `user` SET `is_actice` = 0 where `user_id` = '$user_id'";
      $sql_result = $this->database->query($sql);
      if($sql_result){
        $msg = "<span class = 'success'>User enabled.</span>";
        return $msg;
      }
      else{
        $msg = "<span class = 'error'>User not enabled.</span>";
        return $msg;
      }
    }

    public function delete_user($user_id){
      $sql = "DELETE FROM `user` WHERE `user_id` = '$user_id'";
      $sql_result = $this->database->query($sql);
      if($sql_result){
        $msg = "<span class = 'success'>User deleted.</span>";
        return $msg;
      }
      else{
        $msg = "<span class = 'error'>User not deleted.</span>";
        return $msg;
      }
      
    }


}

?>




<?php
class Exam{

    private $database;
    private $format;

    public function __construct(){
      $this->database = new Database();
      $this->format = new Format();
    }

    public function question_num_rows(){
      $sql = "SELECT * FROM `question`";
      $sql_result = $this->database->query($sql);
      $question_num_rows = $sql_result->num_rows; 
      return $question_num_rows;    
    }

    public function question_by_order(){
      $sql = "SELECT * FROM `question` ORDER BY `question_no` ASC";
      $sql_result = $this->database->query($sql);
      return $sql_result;
    }

    public function question_row_by_number($question_num_passed_in){
      $sql = "SELECT * FROM `question` where `question_no` = '$question_num_passed_in'";
      $sql_result = $this->database->query($sql);
      $question_row_by_number = $sql_result->fetch_assoc();
      return $question_row_by_number;
    }

    public function delete_question_by_number($question_no){
      $tables = array("`question`","`answer`");
      foreach($tables as $table){
        $sql = "DELETE from $table WHERE `question_no` = '$question_no'";
        $sql_result = $this->database->query($sql);
      }
      if($sql_result){
        $msg = "<span class = 'success'>The question has been deleted.</span>";
        return $msg;
      }else{
        $msg = "<span class = 'error'>Failed to delete the question.</span>";
        return $msg;
      }
    }

    public function answer_by_number($question_num_passed_in){
      $sql = "SELECT * FROM `answer` where `question_no` = '$question_num_passed_in'";
      $sql_result = $this->database->query($sql);
      return $sql_result;
    }

    public function exam_row_by_code($exam_code){
      $sql = "SELECT * FROM `exam` WHERE `exam_code` = '$exam_code'";
      $sql_result = $this->database->query($sql);
      $exam_row_by_code = $sql_result->fetch_assoc();
      return $exam_row_by_code;
    }


    // Calculate the score and move on to the next question
    public function score_and_move($data){
    $user_answer_id = $this->format->validation($data['answer_id']);
    $question_num_passed_in = $this->format->validation($data['question_num_passed_in']);

    $user_answer_id = mysqli_real_escape_string($this->database->mysqli, $user_answer_id);
    $question_num_passed_in = mysqli_real_escape_string($this->database->mysqli, $question_num_passed_in);

      echo $user_answer_id."<br/>";
      echo $question_num_passed_in."<br/>";

    $next_question_num = $question_num_passed_in + 1;

    // If the global variable total score does not exist, then set the initial value of the total score to 0
    if(!isset($_SESSION['score'])){
      $_SESSION['score'] = '0';
      echo $_SESSION['score'];
    }


    $question_num_rows = $this->question_num_rows();
    $correct_answer_id = $this->correct_answer_id($question_num_passed_in);

    echo $correct_answer_id."<br/>";

    // Calculate total score
    if($correct_answer_id == $user_answer_id ){

	  // Set score for each question to be 2
    $question_mark = 2;

    $update_question_mark_by_number=$this->update_question_mark_by_number($question_num_passed_in, $question_mark);

    $question_row_by_number=$this->question_row_by_number($question_num_passed_in);

    $question_mark = $question_row_by_number['question_mark'];

    $mark_total = $this->mark_total();

    $_SESSION['score'] = $mark_total;

    echo $_SESSION['score']."<br/>";

    } 

    else {

    $question_mark = 0;

    $update_question_mark_by_number=$this->update_question_mark_by_number($question_num_passed_in, $question_mark);

    $question_row_by_number=$this->question_row_by_number($question_num_passed_in);

    $question_mark = $question_row_by_number['question_mark'];

    $mark_total = $this->mark_total();

    $_SESSION['score'] = $mark_total;

    echo $_SESSION['score']."<br/>";

    }


    // If the final question number reaches the total number of lines, then skip to the result page
    if($question_num_passed_in == $question_num_rows){
      header("Location: test_result.php");
      exit();
    }else{
      header("Location: test.php?q=".$next_question_num);
    }
  }


    private function correct_answer_id($question_num_passed_in){
        $sql = "SELECT * FROM `answer` WHERE `question_no` = '$question_num_passed_in' AND `is_correct` = 1";
        $sql_result = $this->database->query($sql)->fetch_assoc();
        $correct_answer_id = $sql_result['answer_id'];
    return $correct_answer_id;
    }


    public function update_question_mark_by_number($question_num_passed_in, $question_mark){
        $sql = "UPDATE `question` SET  `question_mark`= '$question_mark'
                WHERE `question_no` = '$question_num_passed_in'";
        $sql_result = $this->database->query($sql);
        return;
    }

    public function mark_total(){
        $sql = "SELECT SUM(`question_mark`) AS `mark_total` FROM `question`";
        $sql_result = $this->database->query($sql)->fetch_assoc(); 
        $mark_total = $sql_result['mark_total'];
        return $mark_total;
    }





    public function add_question_by_post($data){

    $question_no = mysqli_real_escape_string($this->database->mysqli, $data['question_no']);
    $question_title = mysqli_real_escape_string($this->database->mysqli, $data['question_title']);
    $answer = array();

    $answer[1] = $data['answer_1'];
    $answer[2] = $data['answer_2'];
    $answer[3] = $data['answer_3'];
    $answer[4] = $data['answer_4'];

    $correct_answer_code = $data['correct_answer_code'];
    
    $sql = "INSERT INTO `question` (`question_id`,`question_no`, `question_title`, `exam_id`) VALUES (NULL, '$question_no', '$question_title', 1)";

    $sql_result = $this->database->query($query);

    if($sql_result){

      foreach($answer as $answer_code => $answer_title){

        if($answer_title != ''){
          if($correct_answer_code == $answer_code){
            $sql_insert_answer_row = "INSERT INTO `answer`(`question_no`,`answer_title`,`is_correct`) VALUES('$question_no','$answer_title', 1)";
          }else{
            $sql_insert_answer_row = "INSERT INTO `answer`(`question_no`,`answer_title`,`is_correct`) VALUES('$question_no','$answer_title', 0)";
          }

          $insert_answer_row = $this->database->query($sql_insert_answer_row);

          if($insert_answer_row){
            continue;
          }else{
            die('Failed to insert data.');
          }
        }
      }

      $msg = "<span class = 'success'>One question has been added successfully.</span>";
      return $msg;
    }
  }

}
?>