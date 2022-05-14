<?= view_cell("\App\Libraries\ViewCells::header") ?>
<body style="background-color: #e6ffff;">
<section class="vh-100 gradient-custom">
<div class="container py-5 h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-12 col-md-8 col-lg-6 col-xl-5">
<div class="card bg-light" style="border-radius: 1rem;">
<div class="card-body p-5 text-center">

<div class="mb-md-5 mt-md-4 pb-5">

<h2 class="fw-bold mb-2 text-uppercase" style="color:#008fb3">Registrati</h2>
<hr>

<?php
if (isset($errors)) {
  echo $errors;
}
?>

<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda" >Numero Scheda Elettorale</label>
<input type="email" id="numScheda" class="form-control form-control-lg" />
</div>

<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda" >Nome</label>
<input type="text" id="nome" class="form-control form-control-lg" />
</div>



<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda">Cognome</label>
<input type="text" id="cognome" class="form-control form-control-lg" />
</div>

<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda" >Età</label>
<input type="number" id="eta" class="form-control form-control-lg" />
</div>

<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda" >Sesso</label>
<select class="form-select form-select-lg" name="sesso">Sesso
<option value="F">Femmina</option>
<option value="M">Maschio</option>
</select>
</div>

<div class="form-outline form-white mb-4">
<label class="form-label" for="numScheda">Regione</label>
<select class="form-select form-select-lg" name="regione">Sesso
<option value="Abruzzo">Abruzzo</option>
<option value="Basilicata">Basilicata</option>
<option value="Calabria">Calabria</option>
<option value="Campania">Campania</option>
<option value="Emilia_Romagna">Emilia Romagna</option>
<option value="FFriuli-Venezia_Giulia">Friuli-Venezia Giulia</option>
<option value="Lazio">Lazio</option>
<option value="Liguria">Liguria</option>
<option value="Lombardia">Lombardia</option>
<option value="Marche">Marche</option>
<option value="Molise">Molise</option>
<option value="Piemonte">Piemonte</option>
<option value="Puglia">Puglia</option>
<option value="Sardegna">Sardegna</option>
<option value="Sicilia">Sicilia</option>
<option value="Toscana">Toscana</option>
<option value="Trentino-Alto-Adige">Trentino-Alto-Adige</option>
<option value="Umbria">Umbria</option>
<option value="Val_d'Aosta">Val d'Aosta</option>
<option value="Veneto">Veneto</option>
</select>
</div>

<button class="btn px-5" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Registrati</button>

<div class="d-flex justify-content-center text-center mt-4 pt-1">
<a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
<a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
<a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</section>
</body>
<?= view_cell("\App\Libraries\ViewCells::footer") ?>