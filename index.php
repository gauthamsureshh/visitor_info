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
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Enrol Visitor</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label>Visitor Name</label>
                    <input type="text" class="form-control" name="visitor_name" placeholder="Enter Visitor Name">
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="contact_number" placeholder="Contact Number">
                </div>
                <div class="form-group">
                    <label>Purpose of Visit</label>
                    <input type="text" class="form-control" name="purpose" placeholder="Purpose">
                </div>
                <div class="form-group">
                    <label>Time of Entry</label>
                    <input type="time" class="form-control" name="time" >
                </div>
                <div class="form-group">
                    <label>VIP</label>
                    <input type="checkbox" name="vip_status" value="1">
                </div>
                <button class="btn btn-success" type="submit" style="margin-bottom: 20px;">Submit</button>
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
                    else if ($dataCheck == 'logged'){
                        echo '<div class="alert alert-success"> User Logged </div>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>


