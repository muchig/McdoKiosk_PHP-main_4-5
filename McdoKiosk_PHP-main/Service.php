<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mcdonald's Food Kiosk System</title>
    <link rel="stylesheet" href="Service.css">
</head>
<body>
    <?php
    session_start();
    // resetting value of array to empty 
    $_SESSION['cart'] = array();

    
    ?>
    <div class="container">
        <div class="content">
            
            <h1>Would you like table service or collect at the pick up point?</h1>
            <a href="SelectedService.php"><button type="button">Table Service</button></a>
            <a href="SelectedService.php"><button type="button">I'll Collect By Myself</button></a>
            <h2><br>By selecting table service, we'll bring your order to your table when it's ready.</h2>
        </div>
    </div>
    
</body>
</html>