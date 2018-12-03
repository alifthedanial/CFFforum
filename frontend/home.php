<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


<style>
* {
    box-sizing: border-box;
}

.header {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
/*  height: 200px;*/
/*  background-size: auto;*/

body {
  padding-top: 54px;
}

@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}
}

.logo {
    position: absolute;
    top: 30%;
    left: 10%;
    transform: translate(-50%, -50%);
    font-size: 30px;
    font-family: Arial;
    text-decoration: none;
}

a {
  text-decoration: none;
  color: black;
}

.navbar {
  position: absolute;
    top: 30%;
    left: 45%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-family: Arial;
    padding-bottom:20px;
    z-index: 1;
}

.navbar ul li{
    list-style-type: none;
    display:inline-block;
}

/*navbar search */
.navbar .search-container {
  float: center;
}

.navbar input[type=text] {
  padding: 5px;
  margin-top: 20px;
  font-size: 17px;
  border: none;
  width: 600px;
}

.navbar .search-container button {
  float: right;
  padding: 14px 14px;
  margin-top: 20px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  width:10px;
  border: none;
  cursor: pointer;
}

.navbar .search-container button:hover {
  background: #ccc;
}

.button {
    background-color: #FF6F20;
    color: white;
    padding: 12px 12px;
/*    margin: 5px 0;*/
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 15px;
    width: 150px;
}

.button:hover {
    opacity: 0.8;
}

.avatar {
  position:absolute;
    top: 17%;
    left: 90%;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    z-index: 1;
}

.sidenav {
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 200px;
    left: 30px;
    background: transparent;
    overflow-x: hidden;
    padding: 10px 10px;
}

.sidenav a {
    padding: 10px 20px 10px 20px;
    font-family: arial;
    text-decoration: bold;
    font-size: 20px;
    color: black;
    display: block;
}

.sidenav a:hover {
    color: grey;
}

.main {
  position: relative;
    top: 30%;
    left: 20%;
    right:20%;
    float: left;
    width: 100%;
    height: 100%;
    padding-top: 200px;
}

.sortbar {
  position: absolute;
    top: 35%;
    left: 60%;
    transform: translate(-50%, -50%);
    font-size: 15px;
    font-family: Arial;
    width:400px;
}
.thread-button{
  padding-top:0px;
  padding-left:0px;
  margin-top:0px;
}

.sortbar ul{
  list-style-type: none;
    margin: 0;
    padding: 0;
  overflow: hidden;
} 

.card-body1{
  padding-left:200px;
  margin-top:-62px;
  margin-bottom:25px;
}

.card-body{
  margin-top:-10px;
}
.sortbar li{
  list-style-type: none;
    display: inline-block;
    background-color: white;
    border: 1px solid #bbb;
    width: 100px;
    font-size: 15px;
}

.thread-container{
  padding-left:510px;
}
.sortbar li a {
    display: block;
    color: black;
    border: 1px solid #bbb;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active {
  background-color: #bcd860;
}

h1{
  font-family: Arial;
}

.line{
width: 61%;
height: 47px;
border-bottom: 1px solid #bbb;
position: absolute;
}

.table{
  border: none;
}

.card-text{
  font-size:20px;
}
.question{
  border: 1px solid #93bf00;
  width: 830px;
  height: 150px;
  /*padding: 100px 100px;*/
  margin: 10px;
  vertical-align: middle;
}

td {
  padding:10px;
  text-align: center;
  vertical-align: middle;
}

.btn{
  text-align: center;
  padding-left:0px;
  padding-bottom:0px;
  margin-bottom:0px;
}
.tag{
  border: 1px solid green;
  border-radius: 5px;
  background-color: #bcd860;
  width: auto;
  height: auto;
  max-width: 150px;
  max-height: 30px;
  margin: 10px;
  padding:5px;
  padding-right:5px;
  text-align: center;
  font-style: italic;
  display: inline-block;
  float: left;
}

.tag:hover{
  opacity:1;
  background-color: #81ab00;
  color:white;
}

.a{
  color:#44163C;
}
.thread-links{
  display: block;
  padding: 5px;
  padding-top: 10px;
  padding-bottom: 10px;
  border: 1 px solid #000023;
  margin-bottom:5px;
  background-color:#EEBAF2;
}

.thread-links:hover{
  background-color:#F4BAB0;

}

h3{
  text-decoration: none;
}

@media screen and (max-width: 600px) {
  .navbar .search-container {
    float: none;
  }
  .navbar a, .topnav input[type=text], .navbar .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .navbar input[type=text] {
    border: 1px solid #ccc;  
  }
}

/* Full-width input fields */
input[type=textarea] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #FF6F20;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.container {
    padding: 16px;
}

.col-md-8{
  margin-left:320px;
  margin-right:320px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

.title{
  font-family: 'Montserrat', sans-serif;
  font-size: 50px;
  margin-top: -2%;
  margin-left: -4%;


}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

</style>
</head>
<body>
<div class="container-fluid">
  <div class="header">
    <div class="logo">
      <a href="home.html"><font color=#ff9918>CFF</font><font color=#81ab00>forums</font></a>
    </div>

    <div class="navbar">
      <ul>
      <li><div class="search-container">
    <form>
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="material-icons"></i></button>
    </form>
    </div>
    </li>
    <li><div class="button" onclick="document.getElementById('id01').style.display='block'">Ask New Question</div></li>

    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close">&times;</span>
    </div>

    <div class="container">
     
      <h2>Ask your question:</h2>
      <br>
      <form action="/action_page.php">
      <textarea name="userquestion" rows="5" cols="88"></textarea>
      <br>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <button type="submit">Submit</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    </ul>
    </div>  

    <a href="profile.html"><img src="avatar.png" alt="Avatar" class="avatar"></a>
    <img src="header.jpg" alt="header" width=100% height= 150px>
    </div>

    <br />

    <div class="sidenav">
      <a href="home.php" class="nav-link">Home</a>
      <a href="discussion.php" class="nav-link">Discussions</a>
      <a href="crops.php" class="nav-link">Crops</a>
      <a href="tags.php" class="nav-link">Tags</a>
      <a href="logout.php" class="nav-link">Logout</a>
    </div>

    <div class="main">
    <h1 class="title">Your Feed</h1>

<div class="line"></div>

    <br />
    <br />
    <br />
    <br />
    
    </div>
   
   

    <div class="col-md-8">


    <?php
  include_once("config.php");
  //to implement thread limit and next pages
  $sql = "SELECT * FROM thread ORDER BY ThreadID LIMIT 7";
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
      $threads .= "<div class='card mb-4'>
                    <div class='card-body'>  
                    
                    <a href='#' class='btn'>".$votecount."</a>
                    <a href='#' class='btn'>".$viewcount."</a>
                    <a href='#' class='btn'>".$answercount."</a> 
                    <font size='-1'>
          <p class='thread-button'>Votes&nbsp; Views&nbsp; Answers </p>
               </font>
               <div class='card-body1'>
                  <h4><a href='specificquestion.php?cthreadID=".$threadID." class='card-title'>".$title."</a></h4>
                </div>
               </div>
               
                    </div>";
    }
    echo $threads;

  }
   else {
     echo "<p>There are no threads available yet.</p>";
   }?>
   </div> <!-- end col-md-8 div-->

<hr>

</div>      
</body>
</html>