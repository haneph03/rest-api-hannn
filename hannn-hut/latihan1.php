<?php 
	$data = file_get_contents('data/pizza.json');
	$menu = json_decode($data,true);

	$menu = $menu["menu"];
	echo $menu[0]["nama"];

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hannn Huttt</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<div class="container">
		  <a class="navbar-brand" href="#">
		  	<img src="img/logo.png" width="120">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon" ></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-link active" href="#">Home </a>
		    </div>
		  </div>
  	</div>
 </nav>

 <div class="container">
 	<div class="row mt-3">
 		<div class="col">
 			<h1>ALL Menu</h1>
 		</div>
 	</div>
 	<div class="row" >
 		<?php foreach ($menu as $row):?>
 		<div class="col-md-4">
 			<div class="card mb-3" >
				  <img src="img/menu/<?= $row["gambar"];?>" class="card-img-top" >
				  <div class="card-body">
				    <h5 class="card-title"><?= $row["nama"];?></h5>
				    <p class="card-text"><?= $row["deskripsi"];?></p>
				    <h5 class="card-title">Rp. <?= $row["harga"];?>,-</h5>
				    <a href="#" class="btn btn-primary">Pesan , Sekarang</a>
				  </div>
				</div>
 		</div>
 	<?php endforeach; ?>
 	</div>	
 </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
  </body>
</html>
