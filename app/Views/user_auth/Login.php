<?= view_cell("\App\Libraries\ViewCells::header") ?>

<body style="background-color: #e6ffff;">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase" style="color:#008fb3">Login</h2>
                                <hr>

                                <?php
                                if (isset($errors)) {
                                    echo $errors;
                                }
                                ?>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="pin">Pin</label>
                                    <input type="text" id="pin" class="form-control form-control-lg" placeholder="Inserisci Pin" />
                                </div>

                                <button class="btn px-5" id="registrati" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Registrati</button>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?= view_cell("\App\Libraries\ViewCells::footer") ?>