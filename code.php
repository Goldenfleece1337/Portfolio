
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
form {
    background-color:gray;
    color:white;
    margin:0 auto;
    
    
   
    
    
}


h2 {
    text-align:center;
}

input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 0 auto;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}

input[type=submit] {
    width: 100%;
    background-color: darkorange;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: black;
}

body {
    text-align:center;
}

</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $departmentErr = $courseErr = "";
$name = $email = $gender = $course = $department = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = ""; 
    }
  }
  if (empty($_POST["department"])) {
    $departmentErr = "field is required";
  } else {
    $department = test_input($_POST["department"]);
  }

  if (empty($_POST["course"])) {
    $courseErr = "course is required";
  } else {
    $course = test_input($_POST["course"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Enrollment form</h2>
<p><span class="error">* required field</span></p>
<form action="code2.php" method="post">  
  <div class="forms">Name: </div> <input class="inputs" type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <div class="forms">Email: </div><input class="inputs"type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <div class="forms">Department: </div> <input class="inputs"type="text" name="department" value="<?php echo $department;?>">
  <span class="error">*<?php echo $departmentErr;?></span>
  <br><br>
  <div class="forms">Course: </div> <input class="inputs"type="text" name="course" value="<?php echo $course;?>">
  <span class="error">*<?php echo $courseErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>