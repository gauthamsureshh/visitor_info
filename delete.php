<?php
include 'autoLoader.php';
$visitorId =  $_POST['visitor_id'];
$data =new Interaction();
$data->deleteVisitor($visitorId);


header("Location: visitor_info.php?data=delete_success");