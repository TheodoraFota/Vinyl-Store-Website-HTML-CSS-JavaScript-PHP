<?php
session_start();
//selida pou perigrafei cd
?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">//για να τρεχει σε ολες τις συσκευες

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		
<title>Black Sabbath - Paranoid</title>
<link rel="stylesheet" href="myCss.css">
</head>
<body>
<?php
if(isset($_POST['AddToMyList'])) {
	if (isset($_SESSION["userName"])){
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
		//elegxos an iparxei idi
		$result = mysqli_query ($conn, "select * from myList where userName='$u' and vinylName='Black Sabbath - Paranoid'");
    	
			if (mysqli_num_rows($result) == 0){
				mysqli_query($conn, "insert into myList (userName, vinylName,page) values ('$u','Black Sabbath - Paranoid','blacksabbathParanoid.php')");
				echo '<script>alert("Ο δίσκος προστέθηκε")</script>';
			}
			else{
				echo '<script>alert("Ο δίσκος υπάρχει ήδη στα αγαπημένα σας.")</script>';
				mysqli_free_result($result);
			}
		
		
		
		//αποδέσμευση μεταβλητής σύνδεσης
		mysqli_close($conn);
	}
}
?>
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
	Black Sabbath - Paranoid
</p>
</div>
<div class="row">
<div class="col-lg-8 col-sm-12">
<div>Μετά την κυκλοφορία του πρώτου τους άλμπουμ το Φεβρουάριο του 1970, οι Black Sabbath πήγαν στα "Regent Sound 
Studios" του Λονδίνου στα μέσα του Ιουνίου εκείνης της χρονιάς για να ηχογραφήσουν τον επόμενο δίσκο τους. 
Μετά την ολοκλήρωση των ηχογραφήσεων, η εταιρεία τους επέμενε για ένα πιο εμπορικό τραγούδι σε σύγκριση με 
τα υπόλοιπα κομμάτια τους με αποτέλεσμα το συγκρότημα να ξαναμπεί στο στούντιο και μέσα σε είκοσι λεπτά να 
ηχογραφήσει το τραγούδι "Paranoid", την μεγαλύτερη σινγκλ επιτυχία τους.</div>
<div>Η αρχική ονομασία του δίσκου ήταν "War Pigs" αλλά η "Vertigo" επέμεινε να αλλάξει σε "Paranoid" για να 
	μη δημιουργηθούν προβλήματα λόγω του πολέμου του Βιετνάμ. Το σινγκλ "Paranoid" κυκλοφόρησε τον Αύγουστο 
	του 1970 ανεβαίνοντας στο # 4 των βρετανικών τσαρτ και το Top-5 των περισσότερων ευρωπαϊκών χωρών. 
	Ακολούθησε το άλμπουμ ένα μήνα αργότερα, σκαρφαλώνοντας στο # 1 στη Μεγάλη Βρετανία και το # 12 στην 
	απέναντι όχθη του Ατλαντικού. Μέχρι σήμερα, έχει βραβευθεί ως τέσσερις φορές πλατινένιος δίσκος στις 
	Ηνωμένες Πολιτείες.</div>
<div>Το άλμπουμ περιέχει μερικά από τα διασημότερα κομμάτια του συγκροτήματος και είναι αυτό που τους 
	έκανε γνωστούς στο ευρύ κοινό. Τραγούδια όπως το ομώνυμο, το "Iron Man" και το "War Pigs" παρέμειναν 
	στο set list των ζωντανών εμφανίσεων των Black Sabbath για όλη τη διάρκεια της καριέρας τους και 
	τραγουδήθηκαν από όλους τους τραγουδιστές οι οποίοι πέρασαν από το συγκρότημα.</div>
<div>Το "Paranoid" κυκλοφόρησε στις Ηνωμένες Πολιτείες τον Ιανουάριο του 1971 λόγω της αργοπορημένης 
	επιτυχίας που γνώρισε εκεί το πρώτο τους άλμπουμ. Παρ' όλη τη μεγάλη επιτυχία του, ο δίσκος κατακρίθηκε 
	από τους κριτικούς της εποχής, αλλά πλέον θεωρείται ένας από τους καλύτερους δίσκους στην ιστορία της 
	χαρντ ροκ μουσικής. Το "AllMusic" του έχει δώσει πέντε αστέρια και το περιοδικό "Rolling Stone" το 
	κατέταξε στην 131η θέση της λίστας του με τα 500 καλύτερα άλμπουμ όλων των εποχών.</div>
</div>
<div class="col-lg-4 col-sm-12  myCenter">
<img class="img-fluid" src="images/blacksabbathParanoid.jpg" title="Κάντε click για να ακούσετε το Paranoid"
onclick="window.open('https://www.youtube.com/watch?v=uk_wUT1CvWM')"/> <br/>
<?php
if (isset($_SESSION["userName"])){
?>
<form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" method="post" role="form">
// server[php self...]...klp gia na emfanizetai to minima lathous sthn selida ths formas  kai oxi se allh
                //Η συνάρτηση htmlspecialchars () μετατρέπει ειδικούς χαρακτήρες σε οντότητες HTML.
                // Αυτό σημαίνει ότι θα αντικαταστήσει χαρακτήρες HTML όπως <και> με & lt; και & gt ;.
                // Αυτό εμποδίζει τους επιτιθέμενους να εκμεταλλευτούν τον κώδικα με την έγχυση κώδικα HTML ή Javascript (επιθέσεις σεναρίων μεταξύ ιστότοπων) σε φόρμες.
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
	<td>War Pigs (Iommi, Osbourne, Butler, Ward)</td>
	<td>7:57</td>
</tr>
<tr>
	<th scope="row">2</th>
	<td>Paranoid (Iommi, Osbourne, Butler, Ward)</td>
	<td>2:53</td>
</tr>
<tr>
	<th scope="row">3</th>
	<td>Planet Caravan (Iommi, Osbourne, Butler, Ward)</td>
	<td>4:32</td>
</tr>
<tr>
	<th scope="row">4</th>
	<td>Iron Man (Iommi, Osbourne, Butler, Ward)</td>
	<td>6:00</td>
</tr>
<tr>
	<th scope="row">5</th>
	<td>Electric Funeral (Iommi, Osbourne, Butler, Ward)</td>
	<td>4:53</td>
</tr>
<tr>
	<th scope="row">6</th>
	<td>Hand of Doom (Iommi, Osbourne, Butler, Ward)</td>
	<td>7:08</td>
</tr>
<tr>
	<th scope="row">7</th>
	<td>Rat Salad (Iommi, Osbourne, Butler, Ward)</td>
	<td>2:30</td>
</tr>
<tr>
	<th scope="row">8</th>
	<td>Fairies Wear Boots (Iommi, Osbourne, Butler, Ward)</td>
	<td>6:15</td>
</tr>
</tbody>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  