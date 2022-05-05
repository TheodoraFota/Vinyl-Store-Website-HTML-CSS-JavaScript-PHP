<?php
session_start();
//gia login
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">//gia na douleuei se oles tis syskeyes

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
<title>Σύνδεση</title>
<link rel="stylesheet" href="myCss.css">

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
if(isset($_POST['Sindesi'])) {//einai sindesi xristi
    $u=$_POST['username'];//kratao username kai password
    $p=$_POST['newPassword'];
    //ektelo erotima gia na do an iparxoun ston pinaka users
    $result = mysqli_query ($conn, "select * from users where username='" . $u . "' and password='" . $p . "'");
    if (mysqli_num_rows($result) == 0){//an oxi
      $error="Λάθος το username ή το password";
      $valid=false;
      mysqli_close($conn);
    }
    else{//an iparxoun, pros8eto sto SESSION to username
      mysqli_free_result($result);
      $_SESSION["userName"] = $u;
      //αποδέσμευση μεταβλητής σύνδεσης
      mysqli_close($conn);
      header("Location: home.php"); //Η συνάρτηση κεφαλίδας () στέλνει μια ακατέργαστη κεφαλίδα HTTP σε έναν πελάτη.
         //Είναι σημαντικό να σημειωθεί ότι η συνάρτηση header () πρέπει να κληθεί πριν αποσταλεί οποιαδήποτε πραγματική έξοδος!
    }
}
else if(isset($_POST['Eggrafi'])) { //einai eggrafi xristi
  $u=$_POST['username'];
  $p=$_POST['newPassword'];
  if (strlen($u)>4){//an to mege8os tou username > 4
    //elegxos an iparxei sti basi dedomenon
    $result = mysqli_query ($conn, "select * from users where username='" . $u . "'");
    if (mysqli_num_rows($result) > 0){//an iparxei
      $error="Υπάρχει ήδη αυτό το username στη βάση δεδομένων";
      $valid=false;
      mysqli_close($conn);
    }
    else{//an oxi
      mysqli_query($conn, "insert into users (username, password) values ('$u','$p')");
      mysqli_free_result($result);
      //αποδέσμευση μεταβλητής σύνδεσης
      mysqli_close($conn);
      $error=false;
      $valid="Η εγγραφή χρήστη ολοκληρώθηκε";
    }
  }
  else{//an to username exei mikos mikrotero apo 4 xaraktires
    $error="Το username πρέπει να είναι μεγαλύτερο από 4 χαρακτήρες";
    $valid=false;
  }
}
else{
  $error=false;
  $valid=false;
}
?>
<div class="container-fluid">
<?php 
	include 'menu.php';
?>


    <div class="row">
    <div class="col-md-6 offset-md-3">
	<div class="card" >
	
	<!-- O titlos tou card -->
	<div class="card-header">Σύνδεση χρήστη
	<?php 
    	if ($error){
    	   echo("<span class=\"error\">* $error</span>");
    	}
      if ($valid){
        echo("<span class=\"valid\">* $valid</span>");
     }
    ?>
	</div>
	<div class="card-body">
    <form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" 
    // server[php self...]...klp gia na emfanizetai to minima lathous sthn selida ths formas  kai oxi se allh
                //Η συνάρτηση htmlspecialchars () μετατρέπει ειδικούς χαρακτήρες σε οντότητες HTML.
                // Αυτό σημαίνει ότι θα αντικαταστήσει χαρακτήρες HTML όπως <και> με & lt; και & gt ;.
                // Αυτό εμποδίζει τους επιτιθέμενους να εκμεταλλευτούν τον κώδικα με την έγχυση κώδικα HTML ή Javascript (επιθέσεις σεναρίων μεταξύ ιστότοπων) σε φόρμες.
	method="post" role="form">
	<div class="form-group"><label class="control-label col-sm-3" for="username">Όνομα Χρήστη:</label>
    	   	<div class="col-sm-9">
    	   	<input type="text" class="form-control" id="username" name="username" value="" ></div></div>
    <div class="form-group"><label class="control-label col-sm-3" for="newPassword">Κωδικός Πρόσβασης:</label>
    	   	<div class="col-sm-9">
    	   	<input type="password" class="form-control" id="newPassword" name="newPassword" value="" ></div></div>
	</div> <!-- card body -->
	<div class="card-footer">
	<div class="form-group  mb-3">
    <div class="col-sm-12 text-center">
    	<input type="submit" id="Sindesi" value="Σύνδεση" name="Sindesi" class="btn btn-success btn-lg">
    </div>
   // </div>
    //<div class="form-group  mb-3">
    	//<div class="col-sm-12 text-center"> </div>
    //</div>
    <div class="form-group  mb-3">
    <div class="col-sm-12 text-center last">
    	<input type="submit" id="Eggrafi" value="Εγγραφή" name="Eggrafi" class="btn btn-success btn-lg">
	</div>
    </div>

    </div> <!-- card footer -->
    </form>
   
                
    </div> <!-- card  -->
    </div> <!-- col -->
    </div> <!-- row -->
    </div> <!-- container -->

//</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  