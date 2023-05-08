<?php
include("db.php");

if (isset($_POST['show_res'])) {
    $sel_field = $_POST['field_set'];
    $show_table = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vender_style.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('clickme').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('displaytable').style.display = 'block';
            });
        });
    </script>
</head>

<body>
    <h1>Find Your Type</h1>

    <img src="img/Resume_search.jpg" alt="">

    <center>
        <div class="field">
            <form method="post">
                Select you are searching for : <select name="field_set" class="">
                    <option value="Artificial intelligence">Artificial intelligence</option>
                    <option value="Software engineering">Software engineering</option>
                    <option value="Data science">Data science</option>
                    <option value="Computer networks">Computer networks</option>
                    <option value="Computer architecture">Computer architecture</option>
                    <option value="Human-computer interaction">Human-computer interaction</option>
                    <option value="Algorithm<">Algorithm</option>
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
                </select><button class="but" id="clickme" name="show_res">Go</button>
            </form>
        </div>
    </center>

    <div id="displaytable" class="placeholder">
        <table id="displaytable2" width="100%" cellpadding="1" cellspacing="0" border="3">
            <tr align="center">
                <td class="lbl">Resume Id</td>
                <td class="lbl">Name</td>
                <td class="lbl">Field</td>
                <td class="lbl">Email</td>
                <td class="lbl">Options</td>
            </tr>
            <?php 
                include('db.php');

                $sql = "SELECT * FROM resume_list WHERE curr_field='".mysqli_real_escape_string($con, $sel_field)."'";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['resume_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['curr_field']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['resume_id'] ?>" class="but_a">View Details</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    </div>
    <div></div>
</body>

</html>