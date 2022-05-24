<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form action="/login" method="post" style="width: 400px" class="w-30 center mt-4 mx-auto d-flex flex-column justift-content-between">
    <h2 class="text-center" style="color:#00b8e6">Accedi tramite pin unico</h2>

    <?php
    if (isset($errors)) {
        echo $errors;
    }
    ?>
    
    <div class="form-group mb-3">
        <label class="form-label" for="pin">Pin unico</label>
        <input type="text" id="pin" name="pin" class="form-control" maxlength="10">
    </div>

    <button class="btn px-5" id="registrati" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Entra</button>

    <a href="/signup" class="mt-3 text-center">Non hai il pin? Registrati</a>
</form>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>