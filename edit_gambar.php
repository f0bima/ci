<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
</head>
<body>	
	
	<form method="post" action="<?php echo base_url("upload/update")?>" enctype="multipart/form-data">
		<!-- Primary key di hidden -->
		<input type="hidden" name="id" value="<?php echo $terserah->id?>">
		
		CONTOH INPUT NAMA:<br>
		<input type="text" name="nama" value="<?php echo $terserah->nama?>">
		<br>
		CONTOH INPUT FOTO:<br>
		<input type="file" name="foto">
		<br><br>
		<input type="submit" value="Submit">
	</form> 

</body>
</html>