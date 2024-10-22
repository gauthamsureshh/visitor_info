<?php
include 'autoloader.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $visitorId = $_POST['visitor_id'];
    $data = new Visitor();
    $visitorData = $data->specificVisitor($visitorId);
}
else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Update Info</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Update Visitor Information</h1>
            <form method="POST" action="process.php">
                <?php foreach ($visitorData as $visitor): ?>
                    <input type="hidden" name="visitorId" value="<?php echo htmlspecialchars($visitor['v_id']); ?>">
                    <div class="form-group">
                        <label >Visitor Name</label>
                        <input type="text" class="form-control" name="visitor_name" value="<?php echo htmlspecialchars(ucwords($visitor['visitor_name'])); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" class="form-control"  name="contact_number" value="<?php echo htmlspecialchars($visitor['contact']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Purpose of Visit</label>
                        <input type="text" class="form-control"  name="purpose" value="<?php echo htmlspecialchars(ucfirst($visitor['purpose'])); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Time of Entry</label>
                        <input type="time" class="form-control"  name="time" value="<?php echo htmlspecialchars($visitor['time']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>VIP</label>
                        <input type="checkbox" name="vip_status" value="1" <?php echo($visitor['vip'] == 0) ? '': "checked" ?>>
                    </div> 
                    <button class="btn btn-success" type="submit">Update</button>
                <?php endforeach; ?>
                <a href="visitor_info.php" class="btn btn-info">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
