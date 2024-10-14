<?php
    include 'autoloader.php';
    $userId = $_GET['id'];
    $data = new Interaction();
    $visitorData = $data->specficVisitor($userId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Update Info</title>
</head>
<body>
    <h2>Update Visitor Information</h2>
    <form method="POST" action="process.php">
        <?php foreach ($visitorData as $visitor): ?>
            <input type="hidden" name="visitorId" value="<?php echo $visitor['v_id'] ?>">
            <label>Visitor Name
                <br><input type="text" name="visitor_name" value="<?php echo $visitor['visitor_name'] ?>">
            </label><br>
            <label>Contact Number
                <br><input type="text" name="contact_number" value="<?php echo $visitor['contact'] ?>">
            </label><br>
            <label>Purpose of Visit
                <br><input type="text" name="purpose" value="<?php echo $visitor['purpose'] ?>">
            </label><br>
            <label>Time of Entry
                <br><input type="time" name="time" value="<?php echo $visitor['time'] ?>">
            </label><br>
            <button class="btn btn-sm btn-success" type="submit">Update</button>
        <?php endforeach; ?>
        <a href="visitor_info.php" class="btn btn-sm btn-info">Back</a>
    </form>
</body>
</html>