<?php
session_start();//xekina ena session
//Όταν εργάζεστε με μια εφαρμογή, την ανοίγετε, κάνετε κάποιες αλλαγές και μετά την κλείνετε. Αυτό μοιάζει πολύ με μια Σύνοδο. Ο υπολογιστής ξέρει ποιος είσαι. Ξέρει πότε ξεκινάτε
// την εφαρμογή και πότε τελειώνετε. Αλλά στο διαδίκτυο υπάρχει ένα πρόβλημα: ο διακομιστής ιστού δεν γνωρίζει ποιος είστε ή τι κάνετε, επειδή η διεύθυνση HTTP δεν διατηρεί κατάσταση.
//Οι μεταβλητές περιόδου σύνδεσης επιλύουν αυτό το πρόβλημα αποθηκεύοντας τις πληροφορίες χρήστη για χρήση σε πολλές σελίδες (π.χ. όνομα χρήστη, αγαπημένο χρώμα κ.λπ.).
// Από προεπιλογή, οι μεταβλητές περιόδου λειτουργίας διαρκούν έως ότου ο χρήστης κλείσει το πρόγραμμα περιήγησης.
//Ετσι; Οι μεταβλητές περιόδου σύνδεσης περιέχουν πληροφορίες για έναν μόνο χρήστη και είναι διαθέσιμες σε όλες τις σελίδες σε μια εφαρμογή.
//selida pou perigrafei cd
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">//gia na leitourgei se kathe syskeui

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
<title>AC DC - Power up</title>
<link rel="stylesheet" href="myCss.css">
</head>
<body>
<?php
if(isset($_POST['AddToMyList'])) {//an exei pati8ei na proste8ei sti lista
	if (isset($_SESSION["userName"])){//an exei kanei login
		$u=$_SESSION["userName"];//kratao to onoma xristi
		require_once 'db.php';
		$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_BASE);
		//Έλεγχος σύνδεσης
		if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
		}
		/*ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα
		ελληνικά σωστά*/
		mysqli_set_charset($conn, "utf8");
		//elegxos an iparxei idi
		$result = mysqli_query ($conn, "select * from myList where userName='$u' and vinylName='AC DC - Power up'");
    	
			if (mysqli_num_rows($result) == 0){//an den iparxei to pros8eto
				mysqli_query($conn, "insert into myList (userName, vinylName,page) values ('$u','AC DC - Power up','acdcPowerUp.php')");
				echo '<script>alert("Ο δίσκος προστέθηκε")</script>';
			}
			else{//an iparxei emfanizo minima
				echo '<script>alert("Ο δίσκος υπάρχει ήδη στα αγαπημένα σας.")</script>';
				mysqli_free_result($result);
			}
		
		
		
		//αποδέσμευση μεταβλητής σύνδεσης
		mysqli_close($conn);
	}
}
?>
<div class="container-fluid">//bootstramp
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
AC DC - Power up
</p>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12">//tablet,κινητο
<div>Το Power Up είναι το δέκατο έβδομο στούντιο άλμπουμ της αυστραλιανής ροκ μπάντας AC/DC, που κυκλοφόρησε 
	στις 13 Νοεμβρίου 2020 μέσω της Columbia Records και της Sony Music Australia. Είναι το δέκατο έκτο διεθνώς 
	στούντιο άλμπουμ τους και το δέκατο έβδομο που κυκλοφορεί στην Αυστραλία. Το Power Up σηματοδοτεί την 
	επιστροφή του τραγουδιστή Μπράιαν Τζόνσον, του ντράμερ Φιλ Ραντ και του μπασίστα Κλιφ Γουίλιαμς, που όλοι 
	αποχώρησαν από τους AC/DC πριν, κατά τη διάρκεια ή μετά τη δεύτερη περιοδεία για το προηγούμενο άλμπουμ 
	τους Rock or Bust (2014). Αυτό είναι επίσης το πρώτο άλμπουμ του συγκροτήματος από τον θάνατο του 
	συνιδρυτή και κιθαρίστα ρυθμού Malcolm Young το 2017 και χρησιμεύει ως φόρος τιμής σε αυτόν, σύμφωνα με 
	τον αδελφό του Angus. Το άλμπουμ είχε γενικά μεγάλη αποδοχή από τους κριτικούς της μουσικής και έφτασε 
	στο νούμερο ένα σε 21 χώρες. Πούλησε 1,4 εκατομμύρια αντίτυπα παγκοσμίως. </div>
</div>
<div class="col-lg-4 col-sm-12  myCenter">//tablet,mobile
<img class="img-fluid" src="images/acdc-powerup.jpg" title="Κάντε click για να ακούσετε το Shot in the Dark"
onclick="window.open('https://www.youtube.com/watch?v=54LEywabkl4')"/> <br/>
<?php 
if (isset($_SESSION["userName"])){
?> 
<!-- forma gia to button pros8iki sta agapimena-->
<form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="post" role="form">//
	<div class="form-group  mb-3">
    <div class="col-sm-12 text-center">
    	<input type="submit" id="AddToMyList" value="Αγαπημένος" name="AddToMyList" class="btn btn-success btn-lg">
    </div>
    </div>
</form>
<?php	
}
?>
</div>
</div>
<div class="row">
<table class="table">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Τίτλος</th>
      <th scope="col">Διάρκεια</th>
    </tr>
  </thead>
<tbody>
<tr>
	<th scope="row">1</th>
	<td>Realize</td>
	<td>3:37</td>
</tr>
<tr>
	<th scope="row">2</th>
	<td>Rejection</td>
	<td>4:06</td>
</tr>
<tr>
	<th scope="row">3</th>
	<td>Shot in the Dark</td>
	<td>3:06</td>
</tr>
<tr>
	<th scope="row">4</th>
	<td>Through the Mists of Time</td>
	<td>3:32</td>
</tr>
<tr>
	<th scope="row">5</th>
	<td>Kick You When You're Down</td>
	<td>3:10</td>
</tr>
<tr>
	<th scope="row">6</th>
	<td>Witch's Spell</td>
	<td>3:42</td>
</tr>
<tr>
	<th scope="row">7</th>
	<td>Demon Fire</td>
	<td>3:30</td>
</tr>
<tr>
	<th scope="row">8</th>
	<td>Wild Reputation</td>
	<td>2:54</td>
</tr>
<tr>
	<th scope="row">9</th>
	<td>No Man's Land</td>
	<td>3:39</td>
</tr>
<tr>
	<th scope="row">10</th>
	<td>Systems Down</td>
	<td>3:12</td>
</tr>
<tr>
	<th scope="row">11</th>
	<td>Money Shot</td>
	<td>3:05</td>
</tr>
<tr>
	<th scope="row">12</th>
	<td>Code Red</td>
	<td>3:31</td>
</tr>
</tbody>
</table>
</div>
</div>//κλεινει το πρωτο div πανω πανω
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  