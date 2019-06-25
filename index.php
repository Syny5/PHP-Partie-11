<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <title>La Calculatrice</title>
  </head>
  <body>
      <!-- container Bootstrap -->
      <div class="container-fluid">
          <!-- header -->
          <header>
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-3">Partie 11 - La Calculatrice</h1>
                <p class="lead">Créer une variable name et l'initialiser avec la valeur de votre choix. Afficher son contenu.</p>
              </div>
            </div>
          </header>
          <!-- main -->
          <main>
            <?php
              //si les chiffres 1 et 2 ont été postés
              if (isset($_POST['nbr1']) && isset($_POST['nbr2'])) {
                  //on vérifie que les variables sont bien des chiffres
                  if (!is_numeric($_POST['nbr1']) || !is_numeric($_POST['nbr2']) ) {
                      //si ce n'est pas le cas, on declare une variable $error et on supprime la variable $result
                      if (isset($result)) unset($result);
                      $error='Veuillez entrer uniquement des chiffres.';
                  }else{
                      //selon l'opérateur qui a été posté, on effectue le calcul et le stocke dans la variable error
                      if (isset($_POST['addition'])) {
                          $result = $_POST['nbr1'] + $_POST['nbr2'];
                      } else if (isset($_POST['soustraction'])) {
                          $result = $_POST['nbr1'] - $_POST['nbr2'];
                      } else if (isset($_POST['multiplication'])) {
                          $result = $_POST['nbr1'] * $_POST['nbr2'];
                      } else if (isset($_POST['division'])) {
                          $result = $_POST['nbr1'] / $_POST['nbr2'];
                      }
                      //si la variable $error existe, on la supprime
                      if (isset($error)) unset($error);
                  }
              }
            ?>
            <form action="index.php" method="post">
              <div class="d-flex justify-content-center row">
                <input  class="form-control col-4 col-md-3 col-lg-2" type="number" name="nbr1" value="<?php $_POST['nbr1'] ?>"/>
                <span class="error"> <?= !empty($_POST) && (is_numeric($_POST['nbr1']) == false) ? 'Premier chiffre invalide !' : '' ;?></span>
                <input class="form-control col-4 col-md-3 col-lg-2" type="number" name="nbr2" value="<?php $_POST['nbr2'] ?>"/>
                <span class="error"> <?= !empty($_POST) && (is_numeric($_POST['nbr2']) == false) ? 'Deuxième chiffre invalide !' : '' ;?></span>
              </div>
              <div class="d-flex justify-content-center row mt-3">
                <input class="form-control col-5 col-sm-4 col-md-3 col-lg-2 bg-info text-white font-weight-bold" type="submit" name="addition" value="Additionner"/>
                <input class="form-control col-5 col-sm-4 col-md-3 col-lg-2 bg-danger text-white font-weight-bold" type="submit" name="soustraction" value="Soustraire"/>
                <input class="form-control col-5 col-sm-4 col-md-3 col-lg-2 bg-info text-white font-weight-bold" type="submit" name="multiplication" value="Multiplier"/>
                <input class="form-control col-5 col-sm-4 col-md-3 col-lg-2 bg-danger text-white font-weight-bold" type="submit" name="division" value="Diviser"/>
              </div>
            </form>
            <p class="text-center mt-3 font-weight-bold text-success">Résultat : <?= $result ?> </p>
          </main>
          <!-- footer -->
          <footer>

          </footer>
      </div>
      <!-- scripts JQuery, Popper, Angular et Bootstrap-->
      <script src="assets/js/jquery-3.4.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- mon script principal -->
      <script src="assets/js/main.js"></script>
  </body>
</html>
