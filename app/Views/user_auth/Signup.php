<?= view_cell("\App\Libraries\ViewCells::header") ?>

<body style="background-color: #e6ffff;">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 row d-flex justify-content-center align-items-center col-12 col-md-8 col-lg-6 col-xl-5 card bg-light">
            <div class="card-body p-5 text-center">
                <form class="mb-md-5 mt-md-4 pb-5" action="/signup-action" method="post">

                    <h2 class="fw-bold mb-2 text-uppercase" style="color:#008fb3">Registrati</h2>
                    <hr>

                    <?php
                    if (isset($errors)) {
                        echo $errors;
                    }
                    ?>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Numero Scheda Elettorale</label>
                        <input type="text" id="numScheda" name="tessera_elettorale" class="form-control form-control-lg" maxlength="10" placeholder="Inserisci Numero Scheda Elettorale">
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control form-control-lg" maxlength="30" placeholder="Inserisci Nome" />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Cognome</label>
                        <input type="text" id="cognome" name="cognome" class="form-control form-control-lg" maxlength="30" placeholder="Inserisci Cognome" />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Età</label>
                        <input type="number" id="eta" name="eta" class="form-control form-control-lg" placeholder="Inserisci Età" />
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Sesso</label>
                        <select class="form-select form-select-lg" name="sesso" placeholder="Inserisci Sesso">Sesso
                            <option value="F">Femmina</option>
                            <option value="M">Maschio</option>
                        </select>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <label class="form-label" for="numScheda">Regione</label>
                        <select class="form-select form-select-lg" name="regione" placeholder="Inserisci Regione">
                            <?php
                            foreach ($regions as $region) {
                                echo "<option value='{$region->id}'>{$region->nome}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button class="btn px-5" id="registrati" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Registrati</button>

                </form>
            </div>
        </div>
    </section>
</body>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>