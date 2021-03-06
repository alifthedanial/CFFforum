<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$uid = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap core CSS -->
<link href="../../resources/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link href="../../resources/css/specificquestionstyle.css" rel="stylesheet">

<!--<META HTTP-EQUIV="refresh" CONTENT="5">-->

<style>
.active {
  background-color:#545b62;
}
  .card{
  border-width:1.4px;
}
.card-title1{
  font-family: 'Montserrat', sans-serif;
  width:130%;
  font-size: 23px;
  font-weight: bold;
}
.card-link{
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
}
.thread-button{
  font-family: 'Montserrat', sans-serif;
}
.card-body{
  width:100%;
  height:100%;
}
.nav-bar{
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 200px;
  left: 30px;
  background: transparent;
  overflow-x: hidden;
  padding: 10px 10px;
}
.nav-bar a {
  padding: 10px 20px 10px 20px;
  text-decoration: bold;
  font-size: 20px;
  color: rgb(0, 0, 0);
  display: block;
}
.nav-bar a:hover {
  color: rgb(60, 186, 84);
}
.nav-link{
  font-family: 'Montserrat', sans-serif;
  font-weight: bold;
}
.btn-group{
  padding-left:990px;
}
.logo {
  position: absolute;
  top: 19%;
  left: 10%;
  transform: translate(-50%, -50%);
  font-size: 30px;
  font-weight: normal;
  font-family: 'Montserrat', sans-serif;
  text-decoration: none;
}
.container-1{
  padding-right:-200px;
}
.main-body{
  padding-left:280px;
  padding-top:200px;
  
}
  .btn-group{
  padding-left:990px;
}

.col1{
  padding-left:4%;
}
.col2{
  padding-left:1%;
}
.votes{
  font-size:30px;
  color:#5cb85c;
  position:relative;
  right:50px;
  bottom:-50px;
}
.card-text{
  font-family: 'Montserrat', sans-serif;
  font-size: 20px;
  position: relative;
  bottom:40px;
  padding-bottom:0px;
  width:120%;
}
.container-fluid{
  height:500%;
}
.submit-button{
  width:150px;
  float:right;
}
.text1-left{
  font-family: 'Montserrat', sans-serif;
  font-size:20px;
  font-weight:bold;
}

.text2-left{
  padding-top:30px;
  font-family: 'Montserrat', sans-serif;
  font-size:23px;
  font-weight:bold;
}
.answer-space{
  padding:100px;

}
</style>
</head>
<body>
<div class="container-fluid">
  <div class="header">
    <div class="logo">
      <a href="home.php" style="text-decoration:none;"><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
    </div>


    <a href="profile.php"><img src="../../resources/img/avatar.png" alt="Avatar" class="avatar"></a>
    <div class='container-1'>
        <img src="../../resources/img/navbar-x2.png" alt="header" width=100% height=300px>
      </div>
    </div>

    <br />
  
    <div class="nav-bar">
      <a href="home.php" class="nav-link">Home</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main-body">
    <div class="col-md-8">
        <?php
        include("config.php");
        $threadID = $_GET['cthreadID'];
        mysqli_query($link,"SELECT * FROM thread");
        mysqli_query($link,"UPDATE thread SET ThreadViewsCount = ThreadViewsCount + 1 WHERE ThreadID = '".$threadID."'");
        $sql = "SELECT * FROM thread WHERE ThreadID ='".$threadID."'";
        $res = mysqli_query($link,$sql);
        $threads = "";
        if(mysqli_num_rows($res) > 0){
          while($row = mysqli_fetch_assoc($res)){
            $threadID = $row['ThreadID'];
            $title = $row['ThreadSubject'];
            $description = $row['ThreadDescription'];
            $viewcount = $row['ThreadViewsCount'];
            $votecount = $row['ThreadVoteCount'];
            $answercount = $row['ThreadAnswersCount'];
            $threads .= "
                          <div class='card-body'>  
                            <h2 class='card-title1'><font size='6'>".$title."</font></h2>                                          
                  <hr/>   
                  
                      
                        <p class='votes'>".$votecount."</p>
                        
                        <!--<p class='thread-button pl-1 pr-1' style='font-size:14px;'>Votes</p>-->
                      

                      <!--
                      <div class='text-center col-md-0 pl-3 pt-1'>
                        <p>".$viewcount."</p>
                        <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Views</p>
                      </div>
                      <div class='text-center col-md-0 pl-3 pt-1'>
                        <p>".$answercount."</p>
                        <p class='thread-button pl-1 pr-1' style='font-size:14px;'>Answers</p>
                      </div> -->

                        <p class='card-text'>".$description."</p><br>
                          </div>";
          }
          echo $threads;
         
        }
        else {
          echo "<a href='home.php'>Return to Home</a><hr />";
          echo "<p>There has been an error displaying this page.";
        }
        ?>
 </div><!--"end col-md-8 div"-->
 <div class="row">
        <div class="col1">
     <form method="post">
       <input type="submit" class="btn btn-success" name="upvote" id="upvote" value="Upvote"/>
      </form>
      </div>

      <div class="col2">
     <form method="post">
       <input type="submit" class="btn btn-danger" name="downvote" id="upvote" value="Downvote"/>
      </form>
      </div>
      </div><!--end row -->

      <div class="answer-space">
      <div class="col-md-8">
        <?php
        $sql = "SELECT * FROM answer WHERE ThreadID ='".$threadID."'";
        $res = mysqli_query($link,$sql);
        $threads = "";
        if(mysqli_num_rows($res) > 0){
          while($row = mysqli_fetch_assoc($res)){
            $threadID = $row['ThreadID'];
            $title = $row['AnswerContent'];
            $threads .= "
            <div class='card border-success mb-4 '>
            <div class='card-body'>  
                <div class='card-body1 pt-0 pb-0 '>
                    <h4 class='card-title1' style='text-decoration: none' >".$title."</h4>
                        </div>
            </div>
         </div>
                          ";
          }
          echo $threads;
         
        }
        else {
          echo "<a href='home.php'>Return to Home</a><hr />";
          echo "<p>There has been an error displaying this page.";
        }
        ?>
 </div><!--"end col-md-8 div"-->


      </div>

        <div class="col-lg-9">
        <div class="form-group">

      <form action="answer.php" method="post">
        <p class="text2-left" >Your Answer</p>
          <textarea name="answer_content" class="form-control" maxlength="500" id="exampleFormControlTextarea1" rows="8" placeholder="Enter Description"></textarea>
    </div>
      <div class="submit-button">
        <input type="hidden" name="uid" value="<?php echo $uid ?>">
        <input type="hidden" name="threadid" value="<?php echo $threadID ?>">
        <button type="submit" name="question_submit" class="btn btn-primary mb-2">Submit Question</button>
        </div>
    </form>
        </div>
    </div><!--end main body-->
<?php

if(array_key_exists('upvote',$_POST)){
  upvote();
}

function upvote()
{
  
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cffforum";
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
  if(isset($_POST['upvote']))
  { 
    $threadID = $_GET['cthreadID'];
    $uid = $_SESSION["id"];

      //retrieve value of voterid through threadid value in thread_votes table
      $sql3 = "SELECT ThreadVoterID FROM thread_votes WHERE ThreadID ='".$threadID."' And ThreadVoterID = '".$uid."'";
      $check = mysqli_query($conn,$sql3);
      $voterid = $check->fetch_assoc();
      (int) $VoterID = $voterid['ThreadVoterID'];

      //exit upvote() if user has voted post before
      if($VoterID == $uid){
        exit;
      }
      
      //insert into thread_votes table threadid and threadvoterid when upvote button clicked
      mysqli_query($conn,"SELECT ThreadVoterID,ThreadID From thread_votes Where ThreadVoterID = '".$VoterID."' And ThreadID = '".$threadID."'");
        $result1 = mysqli_query($conn,"INSERT INTO thread_votes (ThreadID,ThreadVoterID) VALUES ('".$threadID."','".$uid."')");
      
      //update upvote value only if thread_votes table is updated.
      if($result1){
      
      $sql1 = "SELECT ThreadVoteCount FROM thread WHERE ThreadID ='".$threadID."'";
      $result = mysqli_query($conn,$sql1);
      $vote = $result->fetch_assoc();
      (int) $voteCount = $vote['ThreadVoteCount'];
      $voteCount++;
      
      $sql2 = "UPDATE thread SET ThreadVoteCount = '".$voteCount."' WHERE ThreadID = '".$threadID."'";
      $result = mysqli_query($conn,$sql2);
      }
  }
}


if(array_key_exists('downvote',$_POST)){
  downvote();
}
function downvote()
{
  
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cffforum";
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
  if(isset($_POST['downvote']))
  { 
    $threadID = $_GET['cthreadID'];
    $uid = $_SESSION["id"];


      //retrieve value of voterid through threadid value in thread_votes table
      $sql3 = "SELECT ThreadVoterID FROM thread_votes WHERE ThreadID ='".$threadID."' And ThreadVoterID = '".$uid."'";
      $check = mysqli_query($conn,$sql3);
      $voterid = $check->fetch_assoc();
      (int) $VoterID = $voterid['ThreadVoterID'];

      //exit upvote() if user has voted post before
      if($VoterID == $uid){

        //delete upvoted row in thread_votes table threadid and threadvoterid when downvote button clicked
        mysqli_query($conn,"SELECT ThreadVoterID,ThreadID From thread_votes Where ThreadVoterID = '".$VoterID."' And ThreadID = '".$threadID."'");
        $result1 = mysqli_query($conn,"DELETE from thread_votes Where ThreadID = '".$threadID."' And ThreadVoterID = '".$uid."'");

        $sql1 = "SELECT ThreadVoteCount FROM thread WHERE ThreadID ='".$threadID."'";
        $result = mysqli_query($conn,$sql1);
        $vote = $result->fetch_assoc();
        (int) $voteCount = $vote['ThreadVoteCount'];
        $voteCount--;
        
        $sql2 = "UPDATE thread SET ThreadVoteCount = '".$voteCount."' WHERE ThreadID = '".$threadID."'";
        $result = mysqli_query($conn,$sql2);

      }
  }
}
?>
<div class="footer">
</div>
</div>
</body>
</html>