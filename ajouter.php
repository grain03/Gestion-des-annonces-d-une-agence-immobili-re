<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>ImmoAgence | Ajouter un Annonce</title>
</head>
<body>
    
<?php include('navbar.php')?>



<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$_SESSION['error1'] = $_SESSION['error2'] =$_SESSION['error3'] =$_SESSION['error4'] =$_SESSION['error5'] =$_SESSION['error6'] =$_SESSION['error7'] =$_SESSION['error8']  = $_SESSION['message'] = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

if(isset($_POST['button'])){
    $_SESSION['title'] = $titre = $_POST['title'];
    $_SESSION['description'] = $description = $_POST['description'];
    $_SESSION['area'] = $superficie = $_POST['Area'];
    $_SESSION['adress'] = $adresse = $_POST['adress'];
    $_SESSION['price'] = $montant = $_POST['price'];
    $_SESSION['date'] = $dateAnnonce = $_POST['date'];
    if(isset($_POST['type'])){
        $typeAnnonce = $_POST['type'];
    }else{
        $typeAnnonce = false;
    }
    

    #validation of image input
    $filename = $_FILES["image"]["name"];
    echo $filename;

    $fileExtension = explode('.', $filename);
    $fileExtension = end($fileExtension);
    $allowedExtensions = array('jpg', 'png', 'jpeg');



    #validation of title input
    if(strlen($_POST['title']) == 0 || strlen($_POST['title']) > 255){
        $_SESSION['error1'] = 'Title Length must be more than 0 letters and less than 255 letters';
    }elseif (preg_match('/^[<>]/i', $_POST['title'])) {
        $_SESSION['error1'] = "Title musn't contain some < or > characters!";
    }elseif(!in_array($fileExtension, $allowedExtensions)){
        $_SESSION['error2'] = 'Only JPG and PNG and JPEG Extensions are allowed!';
    }elseif($_POST['Area'] == 0){
        $_SESSION['error4'] = 'Superficie Cannot be 0m²!';
    }elseif($_POST['price'] == 0){
        $_SESSION['error6'] = 'Price cannot be 0dh!';
    }elseif($_POST['date'] == ''){
        $_SESSION['error7'] ='Date cannot be empty!';
    }elseif($typeAnnonce == false){
        $_SESSION['error8'] = 'Please choose a type!';
    }
    else{
        include('./config/config.php');
        $filename = uniqid('', true). ".$fileExtension";
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "./images/" . $filename;

        move_uploaded_file($tempname, $folder);
        $createdata = "INSERT INTO annonce(id,titre, image, description,superficie, adresse, montant, date_annonce, type_annonce) VALUES(NULL,'$titre', '$folder','$description', '$superficie', '$adresse', '$montant', '$dateAnnonce', '$typeAnnonce')";
        mysqli_query($connect, $createdata);
        mysqli_close($connect);
        $_SESSION['message'] = 'Successfuly added Anonnce';
    }




}


}

?>

    <div class="sucess">
        <h1><?= $_SESSION['message']?></h1>
    </div>

    <section>
        <form action='' method="post" class='mainform' enctype="multipart/form-data">
            <label for="title" class="for">Titre</label>
            <input id="title" name="title" type="text" value="<?=$_SESSION['title']?>">
            <span class='error-message' id="t-err"><?= $_SESSION['error1'] ?></span>
            
            <label for="image" class="for">Image</label>
            <input id="image" name="image" type="file">
            <span class='error-message' id="i-err"><?= $_SESSION['error2'] ?></span>

            <label for="description" class="for">Brève description</label>
            <input id="description" name="description" type="textarea" value="<?=$_SESSION['description']?>">
            <span class='error-message' id="d-err"></span>

            <label for="Area" class="for">Superficie </label>
            <input id="Area" name="Area" type="number" value="<?=$_SESSION['superficie']?>">
            <span class='error-message' id="n-err"><?=$_SESSION['error4'] ?></span>

            <label for="adress" class="for">Adresse </label>
            <input id="adress"  name="adress" type="text" value="<?=$_SESSION['adress']?>">
            <span class='error-message' id="a-err"></span>

            <label for="price" class="for">Montant</label>
            <input id="price" name="price" type="number" value="<?=$_SESSION['price']?>">
            <span class='error-message' id="p-err"><?= $_SESSION['error6'] ?></span>

            <label for="date" class="for">Date d’annonce</label>
            <input id="date" name="date" type="date" value="<?=$_SESSION['date'] ?>">
            <span class='error-message' id="da-err"><?= $_SESSION['error7'] ?></span>

            <label for="type" class="for">Type annonce</label>
            <div class="type">
                <h6>Location</h6>
                <input id="location" name="type" type="radio" value="Location" >
                <h6>Vente</h6>
                <input id="vente" name="type" type="radio" value="vente" >
            </div>
            <span class='error-message' id="te-err"><?= $_SESSION['error8'] ?></span>
            <button id="button" name="button" >AJOUTER</button>
        </form>
    </section>







<?php 

?>














</body>
</html>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@400;500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
*{
    margin: 0 0;
    padding: 0 0;
    
}
body{
    background: linear-gradient(176.84deg, #506566 38.57%, rgba(80, 101, 102, 0.830045) 60.41%, rgba(80, 101, 102, 0.222417) 105.45%, rgba(80, 101, 102, 0) 112.21%);
    height: 100%;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
}

    section{
        width: 50%;
        height: 100%;
        display: flex;
        justify-content:center;
        margin: 50px auto;
        background: #C1C3B7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 5px 10px 10px 0px #00000040;
    }
    .mainform{
    display: grid;
    justify-content: center;
    }
    .mainform input{
        margin: 0 0 10px;
        padding: 8px;
        border-radius: 10px;
        border: none;
        outline: none;
    }
    .mainform button{
        margin: 10px;
        background: #BDE038;
        color: #10454F;
        border: none;
        padding: 5px;
        text-align: center;
    }

    .mainform .type{
        display: flex;
        margin: 10px;
    }
    .mainform .type input, h6{
        margin: 0 10px;
    }
    .mainform .error-message{
        color: red;
    }
    .sucess{
    width: 100%;
    padding:40px;
    display: flex;
    justify-content: center;
    color: aquamarine;
    }
</style>