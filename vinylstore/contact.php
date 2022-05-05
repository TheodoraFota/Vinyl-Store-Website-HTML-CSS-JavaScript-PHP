<?php
session_start();
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
<title>Επικοινωνία</title>
<link rel="stylesheet" href="myCss.css">
<script>
function validateForm() { //gia form validation
  let x = document.forms["myform"]["username"].value;
  let y = document.forms["myform"]["messageText"].value;
  if (x == "") {//an den exei grapsei username
    alert("Πρέπει να γράψετε ένα όνομα!");
    return false;
  }
  if (x.length < 4) {//an to username exei mikos <4
    alert("Πρέπει να γράψετε ένα όνομα με περισσότερους από 4 χαρακτήρες");
    return false;
  }
  if (y.length < 4) {//an to minima exei mikos <4
    alert("Πρέπει να γράψετε ένα μήνυμα με περισσότερους από 4 χαρακτήρες");
    return false;
  }
}
</script>
</head>

<body>
<?php
require_once 'db.php';
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_BASE);
//Έλεγχος σύνδεσης
if (!$conn) {
  die("Connection failed: " .mysqli_connect_error());
}
/*ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα
ελληνικά σωστά*/
mysqli_set_charset($conn, "utf8");
if(isset($_POST['Send'])) {//exei patisei send
    $u=$_POST['username'];
    $to = "cosmosgr71@gmail.com";
    $subject = "My subject";
    $txt = $_POST['messageText'];
    $headers = "From: webmaster@example.com";
    echo '<script>alert("Το μήνυμα στάλθηκε")</script>';
    // de 8a kaleso tin --->  mail($to,$subject,$txt,$headers);
    
}

?>
<div class="container-fluid">
<?php  //an exei ginei sindesi emfanizo to menu2 diaforetika to menu
if (isset($_SESSION["userName"])){
	include 'menu2.php';
}
else{
	include 'menu.php';
}
?>


    <div class="row">
    <div class="col-md-6 offset-md-3">
	<div class="card" >
	
	<!-- O titlos tou card -->
	<div class="card-header">Επικοινωνία
	</div>
	<div class="card-body">
        <form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" 
	method="post" onsubmit="return validateForm()" role="form">
	<div class="form-group"><label class="control-label col-sm-3" for="username">Όνομα Χρήστη:</label>
    	   <div class="col-sm-9">
           <?php //an exei ginei sindesi xristi 8a emfaniso to username kai 8a einai readonly
           if (isset($_SESSION["userName"])){
          ?>
    	   	<input type="text" class="form-control" id="username" name="username" readonly value="<?php echo $_SESSION["userName"]?>" >
            <?php
           }
           else{ //diaforetika den emfanizo tipota
             ?>
             <input type="text" class="form-control" id="username" name="username" value="" >
             <?php
           }
           ?>
        </div></div>
    <div class="form-group"><label class="control-label col-sm-3" for="messageText">Μήνυμα:</label>
    	   	<div class="col-sm-9">
           <textarea class="form-control" id="messageText" name="messageText" rows="4"></textarea>
    	   	</div></div>
	</div> <!-- card body -->
	<div class="card-footer">
	<div class="form-group  mb-3">
    <div class="col-sm-12 text-center">
    	<input type="submit" id="Send" value="Αποστολή" name="Send" class="btn btn-success btn-lg">
    </div>
    </div>
    <div class="form-group  mb-3">
    	<div class="col-sm-12 text-center"> </div>
    </div>

    </div> <!-- card footer -->
    </form>
   
                
    </div> <!-- card  -->
    </div> <!-- col -->
    </div> <!-- row -->
	</div> <!-- container -->

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  