<?php
   $name='Jayanta';
   $address='TAMLUK';
   $college='Mahishadal Raj College';
   function multiply($value){
   	$value=$value*10;
   	return $value;
   }

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>my home page</title>
 </head>
 <body>
 	<?php
 	$rvalue=multiply(25);
 	print "return value is $rvalue\n";
 	?>
 <h1>My name &nbsp<?=$name;?></h1>
 <h2>I live in&nbsp<?=$address;?></h2>
 <h3>My college&nbsp<?=$college;?></h3>
 </body>
 </html>
