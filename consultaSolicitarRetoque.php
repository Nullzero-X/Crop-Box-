<?php
$dbhost = 'localhost';
$db   	= 'nintendones';
$dbuser = 'root';
$dbpass = '';


$conexion = mysqli_connect($dbhost, $dbuser, $dbpass) or die("No se ha podido conectar al servidor de Base de datos");


$basededatos = mysqli_select_db($conn, $db) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");








$consulta = "SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_nes 
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_snes
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_n64
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_gamecube
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_segagenesis
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_gameboy
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_gameboycolor
	   UNION SELECT DISTINCT IDJuego,Titulo,TipoDeArchivo,Icono, COUNT(Titulo) AS cuantos FROM solicitar_gameboyadvance

GROUP BY 
IDJuego,Titulo,TipoDeArchivo,Icono HAVING COUNT(DISTINCT Titulo)
	   ORDER BY cuantos DESC limit 7";
					 /*UNION SELECT ID,Titulo,Icono,solicitarRetoque FROM contenidogameboy*/



	$filas = mysqli_query($conn, $consulta);
	$registros = [];
	while ($r = mysqli_fetch_assoc($filas)) {

		$registros[] = $r;
	}

	

	




