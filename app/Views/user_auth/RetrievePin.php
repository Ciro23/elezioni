<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form action="/retrieve-pin" method="post" style="width: 400px" class="w-30 center mt-4 mx-auto d-flex flex-column justift-content-between">
    <h2 class="text-center" style="color:#00b8e6">Recupera pin</h2>
    <p class="text-center">
        Verrà inviata un'email al tuo indirizzo contentente il pin per votare
    </p>

    <?php
    if (isset($errors)) {
        echo $errors;
    }
    ?>
    
    <div class="form-group mb-3">
        <label class="form-label" for="email">email</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>

    <button class="btn px-5" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Invia email di recupero</button>

</form>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>