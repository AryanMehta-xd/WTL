<?php 

    include("db.php");

    if(isset($_POST["add_resume"])){
        $name = $_POST["fname"];
        $mob = $_POST["mob"];
        $email = $_POST["email"];
        $dob = $_POST["b_day"];
        $add_full = $_POST["add_full"];
        $g_10 = $_POST["g_10"];
        $g_12 = $_POST["g_12"];
        $dip = $_POST["dip_g"];
        $curr = $_POST["curr_status"];
        $field = $_POST["curr_field"];
        $photo = $_FILES["photo"]["tmp_name"];

        $photoData = file_get_contents($photo);
        $photoData = mysqli_real_escape_string($con, $photoData);

        $sql = "INSERT INTO resume_list(name,mob_no,email,b_day,address,grade_10,grade_12,dip_grade,curr_status,curr_field,photo) VALUES('$name','$mob','$email','$dob','$add_full','$g_10','$g_12','$dip','$curr','$field','$photoData')";

        if(mysqli_query($con,$sql)){
            ?>
                <script>
                    alert("Resume Added Successfully!!");
                    window.location.href = "intro_page.html";
                </script>
            <?php
        }else{
            die("Error");
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="user_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@700&display=swap" rel="stylesheet">
    <body>
        <div class="parent">
        <form method="post" enctype="multipart/form-data">
            <center><h1 class="h1">Build Your Resume</h1></center>
        <img src="img/userlog.webp" alt="">
        <center><div class="form">
            <div class="prof">
                Photo : <input type="file" class="prof_input" accept="image/*" name="photo" required/>
            </div>

            <div class="name"> Full Name : 
                <input type="text"  class="name_input" name="fname" required> 
            </div>

            <div class="mob"> Mobile Number : 
                <input type="Number" class="mob_input" name="mob" required> 
            </div>

            <div class="em"> Email : 
                <input type="email" class="em_input" name="email" required> 
            </div>

            <div class="date"> Birth Date : 
                <input type="date" class="bdate_input" name="b_day" required> 
            </div>

            <div class="add"> <span>Address : </span>
                <textarea name="add_full" id=""  class="add_input" required></textarea> 
            </div>

            <hr class="hr1">

            <div class="grade10"> 10th GRADE : 
                <input type="number" class="grade10_input" required name="g_10"> 
            </div>

            <div class="grade12"> 12th GRADE : 
                <input type="number" class="grade12_input" name = "g_12"> 
            </div>

            <div class="dipgrade"> Diploma GRADE : 
                <input type="number" class="dipgrade_input" name = "dip_g"> 
            </div>

            <div class="curr_stat"> 
                Current Status : <select name="curr_status" class="curr_options">
                    <option value="Studying in B Tech">Studying in B Tech</option>
                    <option value="Studying in ME">Studying in ME</option>
                    <option value="In Internship">In Internship</option>
                    <option value="Job">Job</option>
                    <option value="Freelancer">Freelancer</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Other..">Other..</option>
                </select>
            </div>

            <div class="field"> 
                Current Field : <select name="curr_field" class="options">
                    <option value="Artificial intelligence">Artificial intelligence</option>
                    <option value="Software engineering">Software engineering</option>
                    <option value="Data science">Data science</option>
                    <option value="Computer networks">Computer networks</option>
                    <option value="Computer architecture">Computer architecture</option>
                    <option value="Human-computer interaction">Human-computer interaction</option>
                    <option value="Algorithm">Algorithm</option>
                    <option value="Computer security">Computer security</option>
                    <option value="Robotics">Robotics</option>
                    <option value="Computer hardware">Computer hardware</option>
                    <option value="Cloud computing">Cloud computing</option>
                    <option value="Information security">Information security</option>
                    <option value="Theory of computation">Theory of computation</option>
                    <option value="Information Systems">Information Systems</option>
                    <option value="Data structure">Data structure</option>
                    <option value="Bioinformatics">Bioinformatics</option>
                    <option value="Systems analyst">Systems analyst</option>
                    <option value="Computer Systems Analyst">Computer Systems Analyst</option>
                    <option value="Computer hardware engineering">Computer hardware engineering</option>
                </select>
            </div>

            <button class="but" name = "add_resume">Submit</button>
        </div></center></form>
    </div>
    </body>
</html>