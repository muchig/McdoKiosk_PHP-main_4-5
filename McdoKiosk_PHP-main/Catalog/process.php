<?php

$chosen = $_POST["test"];
echo "the eme is $chosen";
?>

<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input type="submit">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //collect value of input field
    $eme = $_POST['test'];
    if(empty($eme)){
        echo "Name is empty";
    } else {
        echo $name;
    }

}
?>