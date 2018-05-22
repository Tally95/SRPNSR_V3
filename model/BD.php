<?php 
echo '<script>alert("bd calendario ")</script> ';
        $pdo = new PDO('mysql:host=localhost;dbname=bd_sracg;charset=utf8', 'root', '');
        $sth = $pdo->query("select * from reservacion where estado = 'Completa'");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
 ?>