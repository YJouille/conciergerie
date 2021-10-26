<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <title>Conciergerie</title>
  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
 
  <!-- Favicon -->
  <link rel="icon" type="image/gif" href="./assets/icons/favicon.svg" />
  <!-- CSS -->
  <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <header>

    <!-- Messages d'erreurs -->
    <?php
    if (isset($_GET['error'])) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Erreur !</strong> <?= $errors[$_GET['error']] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php }
    if (isset($_GET['info'])) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $messages[$_GET['info']] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>