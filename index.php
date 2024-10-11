<?php
    include 'process.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Visitor_Log</title>
</head>
<body>
    <h2>Visitor Log</h2>
    <a class="btn btn-primary" href='visitor_info.php'>Visitor Info</a>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Visitor Name
            <br><input type="text" name="visitor_name">
        </label><br>
        <label>Contact Number
            <br><input type="text" name="contact_number">
        </label><br>
        <label>Purpose of Visit
            <br><input type="text" name="purpose">
        </label><br>
        <label>Time of Entry
            <br><input type="time" name="time">
        </label><br>
        <button type="submit">Submit</button>
    </form>
    <?php
        if(!isset($_GET['data'])){
            exit();
        }
        else{
            $dataCheck = $_GET['data'];

            if($dataCheck == 'empty'){
                echo '<div class="alert alert-danger">Fill all Fields</div>';
                exit();
            }
            else if ($dataCheck == 'invalid'){
                echo '<div class="alert alert-danger">Invalid Contact Number</div>';
                exit();
            }
            else if ($dataCheck == 'success'){
                echo '<div class="alert alert-success"> Data Submitted </div>';
            }
        }
    ?>
</body>
</html>


