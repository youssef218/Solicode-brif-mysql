<?php
$servername = "localhost";
$username = "Root";
$password = "";
$dbname = "gestions";
// Créez une connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);



///////      ajouter      ///////////////////

if (isset($_POST['submit'])) {
  $titre = $_POST['titre'];



  $image = $_FILES['images']['name'];
  $tmp_name = $_FILES['images']['tmp_name'];
  $folder = "img/" . $image;
  move_uploaded_file($tmp_name, $folder);



  // $images = $_POST['images'];
  $description = $_POST['description'];
  $superficie = $_POST['superficie'];
  $adresse = $_POST['adresse'];
  $montant = $_POST['montant'];
  $date = $_POST['date'];
  $type_annonce = $_POST['type_annonce'];

  // Vérifiez la connexion
  if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
  }
  $sql = "insert into annonce (titre, img, descriptin, super, adress, montan, dat, types)
values ('$titre', '$folder', '$description',' $superficie', '$adresse', '$montant', '$date', '$type_annonce')";
  if (mysqli_query($conn, $sql)) {
    // echo "Données ajoutées avec succès";
  } else {
    echo "Error : " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
  header('location:' . $_SERVER['PHP_SELF']);
  die();
}









// ---------- suprimer --------


// 

elseif (isset($_POST['suprimer'])) {
  // Récupérer l'ID de l'entrée à supprimer
  $id = $_POST['id'];



  // Vérifier la connexion
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Requête SQL pour supprimer une entrée
  $sql = " DELETE FROM annonce WHERE id=$id ";

  if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting" . $id . " record: " . mysqli_error($conn);
  }

  // Fermer la connexion
  mysqli_close($conn);
}





// ==================          modifier        ====================




elseif (isset($_POST['modifier'])) {
  // Vérifier la connexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Préparer la requête de mise à jour
  $id = $_POST["id"];
  $titre = $_POST['titre'];

  $image = $_FILES['imag']['name'];
  $tmp_name = $_FILES['imag']['tmp_name'];
  $folder = "img/" . $image;
  move_uploaded_file($tmp_name, $folder);

  // $images = $_POST['images'];
  $description = $_POST['description'];
  $superficie = $_POST['superficie'];
  $adresse = $_POST['adresse'];
  $montant = $_POST['montant'];
  $date = $_POST['date'];
  $type_annonce = $_POST['type_annonce'];


  $sql = "UPDATE annonce SET titre = '$titre', img = '$folder', descriptin = '$description', super = '$superficie', adress = '$adresse', montan = '$montant', dat = '$date', types = '$type_annonce' WHERE id=$id ";

  // Exécuter la requête
  if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  // Fermer la connexion
  $conn->close();
}








?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>MyHome</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="css/flexslider.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <div id="wrapper" class="home-page">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="pull-left hidden-xs"><i class="fa fa-clock-o"></i><span>Mon - Sat 10.00 - 15.00. Sunday CLOSED</span>
            <p class="pull-right"><i class="fa fa-phone"></i>Tel No. (+212) 644-600-431</p>
          </div>
        </div>
      </div>
    </div>
    <!-- start header -->
    <header>
      <div class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Projects</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
    <section id="banner">

      <!-- Slider -->
      <div id="main-slider" class="flexslider">
        <ul class="slides">
          <li>
            <img src="img/slides/2.jpg" alt="" />
            <div class="flex-caption">
              <h3>Gated Villas</h3>

            </div>
          </li>
          <li>
            <img src="img/slides/1.jpg" alt="" />
            <div class="flex-caption">
              <h3>Trendy Home</h3>

            </div>
          </li>
        </ul>
      </div>
      <!-- end slider -->

    </section>


    <section id="content">

      <div class="container">
        <div class="row">
          <div class="skill-home">
            <div class="skill-home-solid clearfix">


              <div class="col-md-3 col-sm-6 text-center">
                <span class="icons c1"><i class="fa fa-home"></i></span>
                <div class="box-area">
                  <h3>New Projects</h3>
                  <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                </div>
              </div>


              <div class="col-md-3 col-sm-6 text-center">
                <span class="icons c2"><i class="fa fa-rocket"></i></span>
                <div class="box-area">
                  <h3>Ready To Move</h3>
                  <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                </div>
              </div>


              <div class="col-md-3 col-sm-6 text-center">
                <span class="icons c3"><i class="fa fa-trophy"></i></span>
                <div class="box-area">
                  <h3>Commercial</h3>
                  <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                </div>
              </div>


              <div class="col-md-3 col-sm-6 text-center">
                <span class="icons c4"><i class="fa fa-star"></i></span>
                <div class="box-area">
                  <h3>Gated Projects</h3>
                  <p>Lorem ipsum dolor sitamet, consec tetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
                </div>


              </div>
            </div>
          </div>
        </div>

      </div>

      <section class="section-padding noTopMrgn">
        <div class="container ">
          <style>
            input[type="number"] {
              border: 2px solid green;
              padding: 0.8%;
            }
          </style>
          <form action="index.php" method="post" class=" d-block d-md-flex " method="post">
            <input type="number" class="m-0 m-md-5" name="min" placeholder="Min">
            <input type="number" class="m-0 m-md-5" name="max" placeholder="Max">
            <select class="btn btn-primary" name="valueselect" style="margin-left: 5%;">
              <option value="">tout</option>
              <option value="location">Location</option>
              <option value="vente">Vente</option>
            </select>
            <input type="submit" class="btn btn-primary " name="Filrer" value="Valider" style="margin-left: 5%;">
          </form>






        </div>
      </section>


    </section>

    <section class="section-padding gray-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title text-center">
              <h2><span class="coloured">filtrer</span> Properties</h2>
            </div>
          </div>
        </div>

    

        <?php
  $servername = "localhost";
  $username = "Root";
  $password = "";
  $dbname = "gestions";
  // Créez une connexion
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Vérifiez la connexion
  if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
  }
  
 
  if(isset($_POST['modal'])){
    $id = $_POST['id'];
    $modalsql = "SELECT * FROM annonce where id='$id'";
    $resultmodal = mysqli_query($conn, $modalsql);
          if (mysqli_num_rows($resultmodal) > 0) {
            while ($rowmodal = mysqli_fetch_assoc($resultmodal)) {
              echo'
              <div class="container" style="position:fixed;top:20%;left:25%; width:50%; border-radius:5px;   background-color:#fff; z-index:999; border: 2px solid black; " id="modal">
          
                <img src="img/remove.png" id="remove" style="width:20px ; position:relative;top:-8px;left:-20px;">
          
                <div style="overflow-y: scroll; height:380px;">
                  <form action="index.php" method="post" style="display: flex; flex-direction:column; " enctype="multipart/form-data">
                    <input type="text" style="margin: 2%;"  name="titre" value="' . $rowmodal["titre"] . '" />
                    <input type="file" style="margin: 2%;" name="imag" placeholder="images" />
                    <input type="text" style="margin: 2%;" name="description" value="' . $rowmodal["descriptin"] . '" placeholder="description" />
                    <input type="number" style="margin: 2%;" name="superficie" value="' . $rowmodal["super"] . '" placeholder="superficie" />
                    <input type="text" style="margin: 2%;" name="adresse" placeholder="adresse" value="' . $rowmodal["adress"] . '" />
                    <input type="number" style="margin: 2%;" name="montant" placeholder="montant" value="' . $rowmodal["montan"] . '" />
                    <input type="date" style="margin: 2%;" name="date" placeholder="date" value="' . $rowmodal["dat"] . '" />


                    <select class="form-select" aria-label="Default select example"  style="margin: 2%;" name="type_annonce">


  <option selected value="">Open this select menu</option>
  <option value="location">location</option>
  <option value="vente">vente</option>
</select>

                    
                    <input type="hidden" name="id"  value="'. $rowmodal["id"] . '">
                    <input type="submit" style="margin: 2%;background-color:#47d147;color:#fff;border:none;" value="modifier" name="modifier">

                  </form>
                  <form action="index.php" method="post"  style="display: flex; flex-direction:column; ">
                  <input type="hidden" name="id"  value="'. $rowmodal["id"] . '">
                  <input type="submit" style="margin: 2%;background-color:#ff4d4d;color:#fff;border:none;" value="suprimer" name="suprimer" >
                  </form>
                </div>
              </div>
              ';


            }
          }
   
  }
 
  

  $sql = "SELECT * FROM annonce";
  

        if (isset($_POST['Filrer'])) {
          $min = $_POST['min'];
          $max = $_POST['max'];
          $valueselect = $_POST['valueselect'];

          if ($valueselect != "" && $min!="" && $max!="") {
            $sql = "SELECT * FROM annonce where types='$valueselect' and montan between '$min' and '$max' ";
           }
           elseif ($valueselect != "" && $min=="" && $max=="") {
            $sql = "SELECT * FROM annonce where types='$valueselect' ";
           }

           elseif ($valueselect != "" && $min!="" && $max=="") {
            $sql = "SELECT * FROM annonce where types='$valueselect' and montan between '$min' and '0' ";
           }
           elseif ($valueselect == "" && $min!="" && $max=="") {
            $sql = "SELECT * FROM annonce where  montan between '$min' and '0' ";
           }
            elseif ($valueselect != "" && $min=="" && $max!="") {
            $sql = "SELECT * FROM annonce where types='$valueselect' and montan between '0' and '$max' ";
           }
           elseif ($valueselect == "" && $min=="" && $max!="") {
            $sql = "SELECT * FROM annonce where  montan between '0' and '$max' ";
           }
          elseif ($valueselect == "" && $min!="" && $max!="") {
            $sql = "SELECT * FROM annonce where  montan between '$min' and '$max' ";
           }
        }





        $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // Sortez les données de chaque ligne
      while ($row = mysqli_fetch_assoc($result)) {
              echo ' <form action="index.php" method="post" enctype="multipart/form-data">
              <div class="col-sm-4 md-margin-bottom-40" style="margin-bottom:10px;">
              <img class="img-responsive" src="' . $row["img"] . '" alt="">
              <h3>'. $row["titre"] .'</h3>
              <h4 class="coloured">'. $row["types"] .'</h4>
              <p>'. $row["descriptin"] .'</p>
              <input type="hidden" name="id"  value="'. $row["id"] . '">
              <input type="submit" name="modal"  value="more">
            </div>
            </form>
        ';
      }
    } else {
      echo "0 résultats";
    }
  
  
  





  mysqli_close($conn);
?>








        
      </div>


    </section >
    <section class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title text-center" >
              <h2><span class="coloured">About</span> Our Company</h2>
              <p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="about-text">
              <p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
              <ul class="withArrow">
                <li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
                <li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
                <li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
                <li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
              </ul>
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="about-image">
              <img src="img/about.jpg" alt="About Images">
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">Quick Links</h5>
              <ul class="link-list">
                <li><a href="#">Latest Events</a></li>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">Latest posts</h5>
              <ul class="link-list">
                <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
                <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="copyright">
                <p>
                  <span>&copy; YoussefBouyez & MohamedRedaLghazy </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="container" style="position:fixed;top:20%;left:25%; width:50%; border-radius:5px; display: none;  background-color:#fff; z-index:999; border: 2px solid black; " id="modal">

      <img src="img/remove.png" id="remove" style="width:20px ; position:relative;top:-8px;left:-20px;">

      <div style="overflow-y: scroll; height:380px;">
        <form action="index.php" method="post" style="display: flex; flex-direction:column; " enctype="multipart/form-data">
          <input type="text" style="margin: 2%;" name="titre" placeholder="titre" />
          <input type="file" style="margin: 2%;" name="images" placeholder="images" />
          <input type="text" style="margin: 2%;" name="description" placeholder="description" />
          <input type="number" style="margin: 2%;" name="superficie" placeholder="superficie" />
          <input type="text" style="margin: 2%;" name="adresse" placeholder="adresse" />
          <input type="number" style="margin: 2%;" name="montant" placeholder="montant" />
          <input type="date" style="margin: 2%;" name="date" placeholder="date" />
          
          <select class="form-select" aria-label="Default select example"  style="margin: 2%;" name="type_annonce">


<option selected value="">Open this select menu</option>
<option value="location">location</option>
<option value="vente">vente</option>
</select>

          <input type="submit" style="margin: 2%;background-color:#47d147;color:#fff;border:none;" value="valider" name="submit">
        </form>
      </div>
    </div>

  </div>
 



  </div>
  <button type="button"  onclick="modal()" style="position:fixed;bottom:80px;right:25px; z-index:99;" class="btn btn-primary">
    Ajouter annonce
  </button>


  <script>
    function modal(){
      document.getElementById("modal").style.display = "block";
    }
    document.getElementById("remove").onclick = function() {
      document.getElementById("modal").style.display = "none";
    };
  </script>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/jquery.fancybox-media.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="js/animate.js"></script>
  <!-- Vendor Scripts -->
  <script src="js/modernizr.custom.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>