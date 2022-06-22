<?php

$data;
$petName;
if (isset($_GET["pet"])){
    $raw = file_get_contents("../accounts/".urldecode($_GET["pet"]).".json");
    $data = json_decode($raw, true);
    $petName = substr(strstr($data["name"], "/", false), 1);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Report Pet Found</title>
</head>
<body>
    <img src="../assets/logo_base.png" style="position: absolute; width: 8%; top: 18px; left: 90%;">
    <div style="height: 35px;"></div>
    <h1 style="line-height: 30px;">Report Information on Lost Pet</h1>
    <!--
    <h1 style="font-size: 90px;">Charlie</h1>
    <form style="font-family: 'Ubuntu Condensed'; font-size: 30px; text-align: center;">
        <h2 for="img">Select image:</h2>
        <input type="file" id="img" name="img" accept="image/*">
    </form>
    -->
   <div class="PetInfo">
        <div class="PetTitle">
            <h1 style="font-family: Anton;"><?php echo $petName; ?></h1>
        </div>
        <div class="PetDetails">
            <?php echo '<img src="data:image/png;base64, '.$data['rawImage'].'">' ?>
            <p><?php echo $data["description"]; ?></p>
            <h2>Breed: <?php echo $data["breed"]; ?></h2>
            <h2>Age: <?php echo $data["age"]; ?></h2>
            <h2>Weight: <?php echo $data["weight"]; ?></h2>
            <h2>Allergies: <?php echo $data["allergies"]; ?></h2>
            <h2>Health Conditions: <?php echo $data["health_conditions"]; ?></h2>
        </div>
    </div>

    <div style="height: 30px;"></div>

    <div class="ReportContainer">
        <div class="ReportTitle">
            <h1 style="font-family: Anton;">Send Information</h1>
        </div>
        <div class="ReportDetails">
            <form style="text-align: center;">
                <h2>Upload image image here:</h2>
                <input type="file" id="ReportImg" name="img" accept="image/*">
                <br>
                <h2>Please describe/explain any information you have:</h2>
                <textarea id="Report info" rows="13" cols="30"></textarea>
                <h2>Describe when you found this information:</h2>
                <input id="InfoFoundDate" type="date">
                <input id="InfoFoundTime" type="time">
                <br>
                <input type="button" value="Submit Report" style="width: 40%; height: 53px; margin-top: 15px;">
            </form>
        </div>
    </div>
</body>
</html>