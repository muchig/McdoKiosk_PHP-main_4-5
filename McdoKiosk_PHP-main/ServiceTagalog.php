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
            <h1>Gusto mo ba na kami magdala ng order mo o ikaw mangolekta sa pick up point?</h1>
            <a href="SelectedServiceTagalog.php"><button type="button">McDo Crew</button></a>
            <a href="SelectedServiceTagalog.php"><button type="button">Sarili</button></a>
            <h2><br>Kung ang pinili mo ay McDo Crew, dadalhin namin ang iyong order sa iyong mesa kapag handa na ito.</h2>
        </div>
    </div>
</body>
</html>