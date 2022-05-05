<?php
session_start();
//gia emfanisi agapimenon
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
<title>Αγαπημένα</title>
<link rel="stylesheet" href="myCss.css">
</head>
<body>

<div class="container-fluid">
<?php   //an exei ginei sindesi emfanizo to menu2 diaforetika to menu
if (isset($_SESSION["userName"])){
	include 'menu2.php';
}
else{
	include 'menu.php';
}
?>
<div class="row">
<p class="myTitle myCenter">
	Αγαπημένα
</p>
</div>
<div class="row">
<div class="col-md-8 offset-md-2">
<?php
if (isset($_SESSION["userName"])){//αν εχει γινει συνδεση χρηστη
    $u=$_SESSION["userName"];
    require_once 'db.php';
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_BASE);
    //Έλεγχος σύνδεσης
    if (!$conn) {
      die("Connection failed: " .mysqli_connect_error());
    }
    /*ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα
    ελληνικά σωστά*/
    mysqli_set_charset($conn, "utf8");
    $result = mysqli_query ($conn, "select * from mylist where userName='$u'");
?>
<!-- ta agapimena ta emfanizo se ena table kai an iparxei selida pou ta perigrafei 
ta kano link etsi oste an patisei o xristis na pigainei sti selida afti-->
<table class="table">
<thead>
    <tr>
      <th scope="col">Τίτλος</th>
    </tr>
  </thead>
<tbody>
<?php    
    while($row=mysqli_fetch_assoc($result)) {//gia ola ta agapimena//pairnei ena ena ta stoixeia tou result
        echo "<tr><td>";
        if (strlen($row['page'])>0)//an iparxei selida pou ta perigrafei
            echo "<a href='".$row['page']."'>".$row["vinylName"]."</a>";
        else//an oxi
            echo $row["vinylName"];
        echo "</td></tr>";
    }
    mysqli_close($conn);
?>
</tbody>
</table>
<?php
}
?>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  