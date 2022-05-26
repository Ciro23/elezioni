<?= view_cell("\App\Libraries\ViewCells::header") ?>

<div style="width: 800px" class="container mt-4 mx-auto">
    <h2 class="text-center">Benvenuto nel sito delle votazioni parlamentari</h2>
    <p>
        Registrati per ottenere il pin con cui autenticarsi al momento della votazione.<br>
        Clicca quindi su "Registrati" e inserisci i tuoi dati. Un pin unico, non legato
        alla tua persona, ti sarà inviato via email.
        Il pin serve per assicurarsi che ogni cittadino voti solo una volta.<br>
        I tuoi dati personali saranno utilizzati solo per creare le statistiche
        visualizzabili nella sezione "Risultati".
    </p>

    <div class="container mt-4 text-center">
        <div class="row mb-2 d-flex" style="gap: 6px">
            <a href="/signup" class="col btn px-5" style="border: solid 3px #76eb44">Registrati</a>
            <a href="/login" class="col btn px-5" style="border: solid 3px #cfe1e3">Vota tramite pin</a>
        </div>

        <div class="row">
            <a href="/results" class="col btn px-5" style="border: solid 3px #f5206a">Vedi risultati</a>
        </div>
    </div>
</div>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>
