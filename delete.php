<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>ImmoAgence | Modifier un Annonce</title>
</head>
<body>
    
    
<?php include('navbar.php')?>

<?php 

include('./config/config.php');
$annonceId = $_GET['id'];
session_start();
$_SESSION['delete_message'] = '';
?>


<?php 

?>
<?php 
    if(isset($_SERVER['HTTP_REFERER'])){
        echo 
        '<section>
            <div class="content">
                <h1>Are you sure want to delete this Annonce?</h1>
                <form method="post" class="buttons">
                    <button name="delete" class="btnYes">Yes</button>
                    <button name="back" class="btnBack">Back</button>
                </form>
            </div>
        </section>';
    }
    else{
        echo 'You are not allowed to reach this page!';
        header('Location: ./annoncessite.php');
        
        if(isset($_POST['delete'])){
            $delete = "DELETE FROM annonce WHERE id = $annonceId";
            mysqli_query($connect, $delete);
            header('Location: ./annoncessite.php');
            $_SESSION['delete_message'] = '<center><br><h1>Deleted Successfuly!</h1></center>';
        }elseif(isset($_POST['back'])){
            header('Location: ./annoncessite.php');
        }
    }
        



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
    height: 100vh;
    background-repeat: no-repeat;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
}

section{
    width: 50%;
    height: 100%;
    display: flex;
    margin: auto;
    align-items: center;
    justify-content: center;
}

section .content{
    display: grid;
    justify-items: center;
    text-align: center;
    background-color: #fff;
    padding : 50px;
    border-radius: 5px;
}

section .content button{
padding: 13px 100px;
margin: 15px;
color: #fff;
outline: none;
border:none;
border-radius: 5px;
transition: 0.3s;
}

section .content .btnBack{
background: #000;

}

section .content .btnYes{
background:red;
}
section .content button:hover{
    transform: scale(1.1)
}

</style>