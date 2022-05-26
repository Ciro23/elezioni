<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form action="/signup" method="post" style="width: 800px" class="w-30 center mt-4 mx-auto d-flex flex-column justift-content-between">

    <h2 class="text-center" style="color:#00b8e6">Registrazione</h2>
    <p class="text-center">Registrati per ottenere il pin per la votazione</p>

    <?php
    if (isset($errors)) {
        echo $errors;
    }
    ?>

    <div class="d-flex justify-content-between" style="gap: 30px">
        <div class="w-50">
            <div class="form-group pb-3">
                <label class="form-label" for="numero_scheda">Numero scheda elettorale</label>
                <input type="text" id="numero_scheda" name="tessera_elettorale" class="form-control" maxlength="9" placeholder="021108800">
            </div>
            
            <div class="form-group pb-3">
                <label class="form-label" for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" maxlength="30" placeholder="Mario">
            </div>
            
            <div class="form-group pb-3">
                <label class="form-label" for="cognome">Cognome</label>
                <input type="text" id="cognome" name="cognome" class="form-control" maxlength="30" placeholder="Rossi">
            </div>
            
            <div class="form-group pb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" maxlength="30" placeholder="m.rossi@gmail.com">
            </div>
        </div>

        <div class="w-50">
            <div class="form-group pb-3">
                <label class="form-label" for="eta">Età</label>
                <input type="number" id="eta" name="eta" class="form-control">
            </div>
            
            <div class="form-group pb-3">
                <label class="form-label" for="sesso">Sesso</label>
                <select class="form-select" id="sesso" name="sesso">Sesso
                    <option value="">-- seleziona sesso --</option>
                    <option value="F">Femmina</option>
                    <option value="M">Maschio</option>
                </select>
            </div>
            
            <div class="form-group pb-3">
                <label class="form-label" for="numScheda">Regione</label>
                <select class="form-select" name="regione">
                    <?php
                foreach ($regions as $region) {
                    echo "<option value='{$region->id}'>{$region->nome}</option>";
                }
                ?>
                </select>
            </div>
        </div>
    </div>

    <button class="btn px-5" id="registrati" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Registrati</button>

    <a href="/signup" class="mt-3 text-center">Hai già il pin per votare? Clicca qui</a>
</form>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>