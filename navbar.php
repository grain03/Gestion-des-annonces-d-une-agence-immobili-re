<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>ImmoAgence</title>
</head>
<body>




<header>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="logo" href="annoncessite.php">ImmoAgence</a>
    
    <div class="" id="navbarNav">
      <ul>
        <li>
          <a class="home" aria-current="page" href="annoncessite.php">Home</a>
        </li>
        <li>
          <a class="ajoute" href="ajouter.php">Ajouter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>


</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Imperial+Script&family=Roboto:wght@400;500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');

nav.navbar {
  
    width: 100%;
    height: 67px;
    background: #406971;
    box-shadow: 0px 6px 8px rgba(61, 67, 68, 0.81);
}
.logo{
    
    width: 219px;
    height: 34px;
    text-decoration: none;
    margin-left: 186px;
    font-family: 'Imperial Script';
    
    font-weight: 400;
    font-size: 30px;
    line-height: 36px;

    color: #FFFFFF;
}
ul {
    list-style: none;
}
a.home {
    position: absolute;
    width: 40px;
    height: 14px;
    text-decoration: none;
    
    
    font-weight: 700;
    font-size: 13px;
    line-height: 16px;
    
    color: #F3F3F3;
}
span{

    
    font-weight: 700;
    font-size: 10px;
    line-height: 8px;
    
    color: #10454F;
    
    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
a.ajoute {
    position: absolute;
    width: 40px;
    height: 14px;
    text-decoration: none;

    
    font-weight: 700;
    font-size: 13px;
    line-height: 16px;
    margin: 0px 67px;
    color: #F3F3F3;
}
div#navbarNav {
    display: flex;
    flex-direction: row;
    position: absolute;
    right: 50%;
}

</style>
