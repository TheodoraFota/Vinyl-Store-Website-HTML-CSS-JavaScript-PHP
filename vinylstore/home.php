<?php
session_start();//Session variables hold information about one single user, and are available to all pages in one application.
?>
<!DOCTYPE html>
<html lang="el">//language ellinika
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">//gia na leitourgei se kathe siskevi

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">//xrisimopoieitai gia to bootstramp an anoixe to arxeio swsta, kati tetoio
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">// to rel deixnei tin sxesi toy parontos arxeiou kai tou arxeio poy kalw me to href
		
<title>Αρχική</title>
<link rel="stylesheet" href="myCss.css">//kalei to arxeio myCss
<script type="text/javascript">//to vazw to script mesa sto head giati thelw na ginontai kapoies diergasies otan anigei h selida
	//gia tin enallagi ton eikonon
          var images = new Array();//pinakas me ti 8esi ton eikonon
	  var links = new Array();//pinakas me ti 8esi ton selidon pou epexigoun to disko
	  var names = new Array();//pinakas me ta onomata ton eikonon
	  images[0] = "images/acdc-powerup.jpg";
	  images[1] = "images/blacksabbathParanoid.jpg";
	  images[2] = "images/eagles-milleniumConcert.jpg";
	  links[0]="acdcPowerUp.php";
	  links[1]="blacksabbathParanoid.php";
	  links[2]="#";
	  names[0]="AC DC - Power up";
	  names[1]="Black Sabbath - Paranoid";
	  names[2]="Eagles - Millenium Concert";
          var x = 1;

      function changeImage() {
        //gia tin enallagi ton eikonon
	//allazo tin eikona, to onoma tis eikonas kai to link
		document.getElementById('imgsrc').src = images[x];
		document.getElementById('vinylName').value = names[x];
		document.getElementById('vinylLink').value = links[x];
		changeLink(x);//kalo kai ti function gia tin allagi sto onclick
        if (x < 2) {//exo balei 3 eikones ,an paei to x>2 to kanw 0 gia na paizoun oi eikones apo tin arxi
          x += 1;
        } else {
          x = 0;
        }
      }

	  function changeLink(x1){//gia tin allagi tou action onclick
		  if (links[x1]!="#"){//an iparxei selida pou perigrafei tin eikona
			document.getElementById('imgsrc').onclick = function(){  window.open(links[x1]); };
			
		  }
		  else //diaforetika den exo action, diladi an kano click stin eikona den pao pou8ena
		  	document.getElementById('imgsrc').onclick ="";
	  }

      window.onload = function() {
		//gia na doso arxikes times stis eikones kai sto link
		document.getElementById('imgsrc').src = images[0];
		document.getElementById('imgsrc').onclick = function(){  window.open(links[0]); };
		document.getElementById('vinylName').value = names[0];
		document.getElementById('vinylLink').value = links[0];
        setInterval(function () {//method will continue calling the function until clearInterval() is called, or the window is closed.
          changeImage();
        }, 4000); //kathe 4 sec na kalo tin function changeImage
      }
    </script>
</head>
<body>
<?php
//kwdikas gia tin prosthiki sta agapimena(edw ginetai kai h sindesi me thn vasi mas, elexoume an to agapimeno yparxei hdh gia ton xristi,allliws to prosthetoume)
if(isset($_POST['AddToMyList'])) {//an o xristis exei patisei to button gia pros8iki sti lista
	if (isset($_SESSION["userName"])){//an exei kanei login 8a iparxei to username sto SESSION
                //isset() συναρτηση επιστρέφει true εάν η μεταβλητή υπάρχει και δεν είναι NULL, διαφορετικά επιστρέφει false.
		$u=$_SESSION["userName"];//kratao username , onoma cd, link gia ti selida pou to perigrafei
		$vName=$_POST['vinylName'];
		$vLink=$_POST['vinylLink'];
		if ($vLink=="#")
			$vLink="";
		require_once 'db.php';//to arxeio pou exoume ftiaksei gia vasi,The require_once keyword
                // is used to embed PHP code from another file. If the file is not found, a fatal error is 
                //thrown and the program stops. If the file was already included previously, this statement
                // will not include it again.
		$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_BASE);
		//Έλεγχος σύνδεσης
		if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
		}
		/*ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα
		ελληνικά σωστά*/
		mysqli_set_charset($conn, "utf8");
		//elegxos an iparxei idi sti basi dedomenon
		$result = mysqli_query ($conn, "select * from myList where userName='$u' and vinylName='$vName'");
    	
		if (mysqli_num_rows($result) == 0){//an den iparxei to pros8eto
			mysqli_query($conn, "insert into myList (userName, vinylName,page) values ('$u','$vName','$vLink')");
			echo '<script>alert("Ο δίσκος προστέθηκε")</script>';
		}
		else{//an iparxei emfanizo enimerotiko minima
			echo '<script>alert("Ο δίσκος υπάρχει ήδη στα αγαπημένα σας.")</script>';
			mysqli_free_result($result);
		}
		
		
		
		//αποδέσμευση μεταβλητής σύνδεσης
		mysqli_close($conn);
	}
	else{//an o xristis den exei kanei login
		echo '<script>alert("Για να προσθέσετε δίσκο στα αγαπημένα πρέπει να έχετε συνδεθεί")</script>';
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
<div class="row">//bootstramp
	<p class="myTitle myCenter">
	Καλώς ήλθατε στο δισκοπωλείο Vinyl Store
	</p>
	<div class="col-md-8 offset-md-2 myJustify">//bootstramp gia grammatoseira
	<p>Καλωσορίσατε στο δισκοπωλείο μας. Το Vinyl Store ιδρύθηκε το 1980 στην Πάτρα στην οδό Μαιζώνος 186. 
	Το 2010 δημιουργήθηκε το ηλεκτρονικό μας κατάστημα και πλέον εξυπηρετούμε όλους τους πελάτες μας εντός 
	Ελλάδας αλλά και εκτός από αυτή. Το 2020, το ηλεκτρονικό μας κατάστημα αναβαθμίστηκε για να μπορέσει να 
	ανταπεξέλθει την αυξημένη επισκεψιμότητα. </p>
	<p>Στο φυσικό αλλά και στο ηλεκτρονικό μας κατάστημα, μπορείτε να βρείτε δίσκους, αλλά και CD από όλο 
		το φάσμα της μουσικής. Μπορείτε να αναζητήσετε δίσκους και συγκροτήματα από rock, pop, jazz, soul, 
		funk και blues. Βέβαια, δεν μπορούμε να κρύψουμε, την ιδιαίτερή μας αγάπη σε συγκροτήματα της rock 
		και metal σκηνής.</p>
	<p>Επισκεφθείτε μας και αναζητήστε τη μουσική που θέλετε. Αν δεν το έχουμε, θα προσπαθήσουμε να σας 
		εξυπηρετήσουμε, αναζητώντας το σε φιλικά δισκοπωλεία αλλά και συλλέκτες.</p>
	<p>Κατά την επίσκεψή σας μην ξεχάσετε να δείτε και τη <b>συλλογή μας με σπάνια βινύλια</b>!</p>

	</div>
</div>
<div class="row mt-3"></div>
<div class="row">
	<div class="col-lg-4 col-sm-12 myCenter"><!-- to div gia tis eikones tvn diskon-->
		<img class="img-fluid" id='imgsrc' src="" onclick=""/>
		
	</div>
	<div class="col-lg-2 col-sm-12 myCenter"><!-- forma gia to button pros8iki sta agapimena me dio hidden
		pedia gia na kratao to onoma tou cd kai to link gia ti selida pou to perigrafei-->
		<form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" 
		method="post" role="form">// server[php self...]...klp gia na emfanizetai to minima lathous sthn selida ths formas  kai oxi se allh
                //Η συνάρτηση htmlspecialchars () μετατρέπει ειδικούς χαρακτήρες σε οντότητες HTML.
                // Αυτό σημαίνει ότι θα αντικαταστήσει χαρακτήρες HTML όπως <και> με & lt; και & gt ;.
                // Αυτό εμποδίζει τους επιτιθέμενους να εκμεταλλευτούν τον κώδικα με την έγχυση κώδικα HTML ή Javascript (επιθέσεις σεναρίων μεταξύ ιστότοπων) σε φόρμες.
                //na rwtisw tin paraskeuh ligo gia auto
		<input type="hidden" name="vinylName" id="vinylName" value="">
		<input type="hidden" name="vinylLink" id="vinylLink" value="">
		<div class="form-group  mb-3">
		<div class="col-sm-12 text-center">
			<input type="submit" id="AddToMyList" value="Αγαπημένος" name="AddToMyList" class="btn btn-success btn-lg">
		</div>
		</div>
		</form>
	</div>
	<div class="col-lg-5 col-sm-12" style="height: 300px;"> <!-- gia ta simantika gegonota -->
		<p class="myCenter mySubTitle">Σημαντικά γεγονότα</p>
		<div class="collapse1">.
		<table class="table table-striped" style="max-height:300px">
		<thead>//χρησιμοποιείται για την ομαδοποίηση περιεχομένου κεφαλίδας σε έναν πίνακα HTML.
			<tr>
			<th scope="col">Ημερομηνία</th>//to scope kathorizei an tha bei se grammh h sthlh 
			<th scope="col">Συγκρότημα</th>
			<th scope="col">Μουσική σκηνή</th>
			</tr>
		</thead>
		<tbody>//χρησιμοποιείται για την ομαδοποίηση περιεχομένου σωματος σε έναν πίνακα HTML.
		<tr>//grammi pinaka
			<th scope="row">16/10/2021</th>//The <th> tag defines a header cell in an HTML table.
                        //The text in <th> elements are bold and centered by default.The text in <td> elements are regular and left-aligned by default.
			<td>Υπόγεια Ρεύματα</td>
			<td>Κύταρρο</td>
		</tr>
		<tr>
			<th scope="row">16/10/2021</th>
			<td>Παύλος Παυλίδης</td>
			<td>Gazarte</td>
		</tr>
		<tr>
			<th scope="row">27/10/2021</th>
			<td>Magic de Spell, Μίμης Καλαντζής, Γυμνά Καλώδια</td>
			<td>Κύταρρο</td>
		</tr>
		<tr>
			<th scope="row">28/10/2021</th>
			<td>UFO</td>
			<td>Principal Club Theater/Θεσσαλονίκη</td>
		</tr>
		<tr>
			<th scope="row">13/11/2021</th>
			<td>Nightfall</td>
			<td>Gagarin 205</td>
		</tr>
		<tr>
			<th scope="row"> 3/12/2021</th>
			<td>Paradise Lost</td>
			<td>Fuzz Club</td>
		</tr>
		</tbody>
		</table>
	</div>
	</div>
</div>
<div class="row mt-3"></div>
<div class="row mt-3"></div>
</div>
<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">VinylStore - Μαιζώνος 186 Πάτρα<br/>τηλ. 2610334455</span>//Η ετικέτα <span> είναι ένα ενσωματωμένο κοντέινερ που χρησιμοποιείται για τη σήμανση ενός μέρους ενός κειμένου ή ενός μέρους ενός εγγράφου.
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>  