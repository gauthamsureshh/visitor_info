<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
</head>
<body>
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
            <button type="submit">Update</button>
        </form>
</body>
</html>