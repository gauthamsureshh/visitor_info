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
</head>
<body>
    <h1>Visitor Details</h1>
    <p></p>
    <a class="btn btn-info btn-sm " href="index.php">Back</a>
    <table class="table table-hover">
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
                    <a class="btn  btn-sm btn-danger" href="">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>