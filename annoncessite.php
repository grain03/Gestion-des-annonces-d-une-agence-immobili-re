<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>ImmoAgence</title>
</head>
<body>
    <?php include './navbar.php';?>
    
    <?php 
        include('./config/config.php');
        session_start();
        error_reporting(E_ERROR | E_PARSE);
        echo $_SESSION['delete_message'];
        session_unset(); 
    ?>




    <div class="container">
        <form action="" method="post">
        <div class="row">
            <div class="col">
                <div id="cover">
                <img src="./images/home-images/cover-img.png" alt="">
                    <div id="searching">
                        <input type="search" name="search" id="search" placeholder="Search...">
                    </div>
                    <input type="submit" name="Search" value="Search" id="btn-search">
                </div>
            </div>
            <div class="col">
                <div id="filtering">
                    <div>
                        <input type="number" name="minPrix" id="min" placeholder="Prix Min">
                        <input type="number" name="maxPrix" id="max" placeholder="Prix Max">
                        <span>Dhs</span>
                    </div>
                    <select name="Type" id="select">
                        <option disabled selected>Type</option>
                        <option value="Location">Location</option>
                        <option value="vente">Vente</option>
                    </select>
                    <input type="submit" value="Filter" name='filter' id="btn-filter">
                </div>
            </div>  
        </form>     
        </div>




    <?php 
        $keyword = $_POST['search'];
        $prixMax = $_POST['maxPrix'];
        $prixMin = $_POST['minPrix'];
        $type = $_POST['Type'];

        $sql = "SELECT * FROM `annonce` WHERE titre like '%$keyword%'";

        if(!empty($_POST['minPrix']) || !empty($_POST['maxPrix'])){
            $sql = "SELECT * FROM `annonce` WHERE montant BETWEEN '$prixMin' AND '$prixMax' ";
        }if(!empty($_POST['Type']) && empty($_POST['minPrix']) && empty($_POST['maxPrix'])){
            $sql = "SELECT * FROM `annonce` WHERE type_annonce = '$type'";
        }
        if((!empty($_POST['minPrix']) || !empty($_POST['maxPrix'])) && !empty($_POST['Type'])){
            $sql = "SELECT * FROM `annonce` WHERE montant BETWEEN '$prixMin' AND '$prixMax' AND type_annonce = '$type'";
        }

    ?>


    



    <div class='cards'>                           
        <div class="row">

        <?php
            $res = mysqli_query($connect,$sql);
            if(mysqli_num_rows ( $res ) == 0){
                echo "<center><h1>No results Found!</h1></center>";
            }

            while ($champ = mysqli_fetch_assoc($res))
            {
                echo "                
                <div class='card'>
                <div class='card-content'>
                <div class='card-images'>
                <img src='".$champ['image']."'>
                </div>
                
                <div class='card-info'>
                <h1>".$champ['titre']."</h1>
                <h5>".$champ['adresse']."</h5>
                <p>".$champ['description']."</p>
                </div>
                <div class='right_side'>
                <div>
                <h3>".$champ['montant']. " DHs</h3>
                <h4>".$champ['type_annonce']. "</h4>
                </div>
                <div class='buttons'>
                <form method='get' action='modifier.php'>
                <button class='modifier' name='id' value='".$champ['id']. "'>Modifier</button>
                </form>
                <form method='get'  action='delete.php'>
                <button class='delete' name='id' value='".$champ['id']. "'>Supprimer</button>
                </form>
                </div>
                </div>
                </div>
                
                </div>";
            }
        ?>                
        </div> 
    </div>  
    
    
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
    background-color: rgba(163, 171, 120, 0.42) !important;
    height: 51rem;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
}

#cover {
    height: 50%;
    left: 12%;
    background: rgba(160, 160, 148, 0.53);
    box-shadow: 6px 1px 15px rgba(66, 66, 66, 0.57);
    border-radius: 27px;
    top: 55.7px;
}
img {
  
    width: 100%;
    height: 174px;
    background: url(pexels-pixabay-164558-removebg-preview.png);
    backdrop-filter: blur(44.5px);
    border-radius: 27px;
}
#cover, img {
    position: relative;
    width: 882.32px;
    height: 270.78px;
    right: 0px;
}
#searching {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(30%, 278%);
}
input#search {
    width: 571px;
    height: 40px;
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
    padding-left: 23px;
}
#btn-search {
    width: 281px;
    height: 29px;
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 2px;
    border: none;
    position: absolute;
    right: 36%;
    top: 111%;
    color: #10454F;
  
font-weight: 700;
font-size: 16px;
line-height: 10px;
}
div#filtering {
    display: flex;
    flex-direction: row;
    position: relative;
    top: 613%;
    justify-content: space-evenly;
}
input#min, input#max  {
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
    padding-left: 13px;
    font-size: 14px;
}
label {
 
    padding: 0px 9px;
    font-weight: 700;
    font-size: 16px;
    line-height: 11px;

    color: #10454F;

    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
input#btn-filter {
    width: 88px;
    position: relative;
    border: none;
    height: 29px;
    background: #BDE038;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 2px;
    font-weight: 700;
    
    font-size: 11px;
    line-height: 16px;

    color: #10454F;
}


/* style ajouter */


label.for {
    font-weight: 600;
    font-size: 17px;
    line-height: 19px;
    color: #0f515e;
    padding: 3px 10px;
}

.mainform{
    width: 50%;
    height: 100%;
    display: flex;
    justify-content:center;
    margin: 50px auto;
    background: #C1C3B7;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 5px 10px 10px 0px #00000040;
    display: grid;
    justify-content: center;
}

input[type="number"], input[type="text"] {
    width: 268px;
    height: 29px;
    
    background: #F3F3F3;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    border: none;
}
select {
    word-wrap: normal;
    border: none;
    color: #7c7c7c;
    border-radius: 14px;
    box-shadow: 3px 5px 10px rgba(0, 0, 0, 0.25);

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

/* card */

.cards {
    margin-top: 300px;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    border-radius: 7px;
    justify-content: center;
}

.cards .card{
    min-width: 90%;
    min-height: 250px;
    background: #fff;
    margin: 10px;
}
.cards .card .card-content{
display: flex;
justify-content: space-between;
}
.card-content .card-images{
width: 20%;
min-height: 200px;
}

.card-content img{
display: flex;
align-items: center;
width: 100%;
height: 150px;
margin: 50px 10px;
object-fit: cover;
}

.card-info{
width: 50%;
margin-left:0;
margin-top: 22px;
}
h3{
    font-size: 2.3rem;
}
.right_side{
    display:grid;
    width: 25%;
    justify-items: center;
}
.buttons form{
}
.buttons form .modifier{
    padding: 13px 58px;
    border-radius: 5px;
    outline: none;
    border:none;
    transition: 0.3s;
    margin: 15px;
    background: #BDE038;
    color: #10454F;
}
.buttons form .delete{
    padding: 13px 50px;
    border-radius: 5px;
    outline: none;
    border:none;
    transition: 0.3s;
    margin: 15px;
    background: #FF7612;
    color: #fff;
}


</style>