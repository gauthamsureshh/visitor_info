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
        .card {
                opacity: 0.9; 
                max-width: 500px;
                padding: 20px;
                border-radius: 10px; 
            }
        .card-title {
                color: whitesmoke;
                text-align: center;
                margin-bottom: 20px;
            }
        .form-group label {
                color: wheat; 
            }
        .form-control {
                background-color: rgba(255, 255, 255, 0.8); 
                border: 1px solid #ccc; 
            }
        .btn {
                width: 100%; 
                margin-top: 15px;
            }
    </style>
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
