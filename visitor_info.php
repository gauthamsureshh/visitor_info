<?php
include 'autoLoader.php';
$data = new Interaction();
$visitors = $data->getVisitor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <style>
        body {
                background-image: url('https://getwallpapers.com/wallpaper/full/1/d/8/1291078-full-size-dark-minimal-wallpaper-1920x1080-for-full-hd.jpg'); 
                background-size: cover;
                background-position: center;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
            }
    </style>
</head>
<body>
    <div class="container">
        <h1>Visitor Details</h1>
        <?php
            if(isset($_GET['data'])){
                $dataCheck = $_GET['data'];
                if($dataCheck == 'delete_success'){
                    echo '<div class="alert alert-danger">Visitor Deleted </div>';
                }
                else if($dataCheck == 'update_success'){
                    echo '<div class="alert alert-success">Visitor Details Updated</div>';
                }
            }    
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Visitor Name</th>
                    <th>Contact</th>
                    <th>Purpose of Visit</th>
                    <th>Time of Entry</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitors as $visitor): ?>
                <tr>
                    <td><?php echo ucfirst($visitor['visitor_name']) ?></td>
                    <td><?php echo $visitor['contact'] ?></td>
                    <td><?php echo $visitor['purpose'] ?></td>
                    <td><?php echo $visitor['time'] ?></td>
                    <td>
                        <a class="btn  btn-sm btn-warning" href="update.php?id= <?php echo $visitor['v_id']?> " >Edit</a>
                    </td>
                    <td>
                        <form action="delete.php" method="POST" >
                            <input type="hidden" value="<?php echo $visitor['v_id'] ?>" name="visitor_id">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-info btn-sm " href="index.php">Back</a>
    </div>
</body>
</html>