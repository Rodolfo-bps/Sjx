<?php include_once("template/head.php"); ?>
<style>
  .tabla {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  .tabla td,
  .tabla th {
    border: 0px solid #ddd;
    padding: 8px;
  }

  .tabla tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .tabla tr:hover {
    background-color: #ddd;
  }

  .tabla th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #000;
    color: white;
  }
</style>
<header>

  <body>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
      <h3><strong>SJX</strong></h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <img src="assets/images/menu.svg">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link disable" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disable" href="admin/index.php">Iniciar Sesion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>



</header>




<?php include_once("paginas/album.php"); ?>


<?php include_once("template/footer.php"); ?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


</body>

</html>