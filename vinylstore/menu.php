<?php
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">//navigation bar
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Vinul Store</a>//The <a> tag defines a hyperlink, which is used to link from one page to another.
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>// A <span> element which is used to color a part of a text. Etoima apo to bootstrap ta pirame 
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">//ul kai li pane mazi me to nav
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Αρχική</a>//aria-current
            //χρησιμοποιειται Κάθε φορά που χρειάζεται να υποδείξετε την τρέχουσα σελίδα μέσα σε ένα σύνολο συνδέσμων σελιδοποίησης
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Σύνδεση</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Επικοινωνία</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php

  ?>