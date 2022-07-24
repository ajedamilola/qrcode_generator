<?php
	require("phpqrcode/qrlib.php");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QR Code Generator</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		textarea,input,select{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<?php
	$hasImage = isset($_GET['message']);

		//default values
		$size = 2;
		$quality = "";
		$message = "";

		//check if the user sent a particular "message" as a get request
		if($hasImage){
			$size = $_GET['size'];
			$quality = $_GET['quality'];
			$message = $_GET['message'];
			QRcode::png($message,'temp.png',$quality,$size,1);
		}
	?>
	<nav class="navbar navbar-dark bg-primary">
		<div class="container">
			<h2 class="navbar-brand">Qr Code Generator</h2>	
		</div>
	</nav>
<div class="container py-3">
	<div class="row">
		<div class="col">
		<form>
			<h2>
				Input Values
			</h2>
			<textarea placeholder="type in qr message here" name="message" required class="form-control" rows="6"><?= $message ?></textarea>
			<select required name='quality' class="form-control">
				<option>Select Quality</option>
				<option value='L' <?= $quality == "L" ? "selected" : "" ?>>Lowest</option>
				<option value='M' <?= $quality == "M" ? "selected" : "" ?>>Medium</option>
				<option value='Q' <?= $quality == "Q" ? "selected" : "" ?>>High</option>
				<option value='H' <?= $quality == "H" ? "selected" : "" ?>>Highest</option>
			</select>
			<div class="form-floating">
				<input type="number" name="size" value=<?= $size ?> min=2 max=8 class="form-control" placeholder="set size">
				<label>Set Size</label>
			</div>
			<button class="btn btn-primary">
				Generate
			</button>
		</form>
	</div>
	<div class="col-12 col-md-4 position-relative">
		<?php if($hasImage){ ?>
			<h2>Generated QR</h2>
			<img src="temp.png" class="img-fluid d-block" />
			<a href="temp.png" download>
				<button class="btn btn-outline-primary">Download</button>
			</a>
		<?php } ?>
	</div>
	</div>
	
	
</div>

<footer class="bg-dark py-3 w-100 mt-5">
	<div class="container text-light text-center">
		Made By 
		<a href="https://github.com/ajedamilola">Aje Damilola </a>
	</div>
</footer>
</body>
</html>