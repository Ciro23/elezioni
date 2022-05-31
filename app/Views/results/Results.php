<?= view_cell("\App\Libraries\ViewCells::header") ?>

<div style="gap: 30px; width: 1000px" class="mt-3 container d-flex flex-column">
    
    <span>
        <h4>Attenzione</h4>
        <p>
            A fine di rendere quest'applicazione un prototipo funzionante e testante, i dati vengono aggiornati in tempo reale ogni volta che un voto viene inviato.
        </p>
    </span>
    <table class="table">
        <caption>Numero voti per partito</caption>
        <thead>
            <tr>
                <th>Partito</th>
                <th>Percentuale</th>
                <th>Numero voti</th>
            </tr>
        </thead>

        <tbody> 
            <?php
            foreach ($votes_for_parties as $party) {
                echo "<tr>";
                echo "<td>{$party->nome}</td>";
                echo "<td>{$party->percentuale}</td>";
                echo "<td>{$party->n_voti}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <table class="table">
        <caption>Numero voti e percentuale per candidato</caption>
        <thead>
            <tr>
                <th>Cognome</th>
                <th>Nome</th>
                <th>Partito</th>
                <th>Percentuale</th>
                <th>Numero voti</th>
            </tr>
        </thead>

        <tbody> 
            <?php
            foreach ($votes_for_candidates as $candidate) {
                echo "<tr>";
                echo "<td>{$candidate->cognome}</td>";
                echo "<td>{$candidate->nome}</td>";
                echo "<td>{$candidate->partito}</td>";
                echo "<td>{$candidate->percentuale}</td>";
                echo "<td>{$candidate->n_voti}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <table class="table">
        <caption>Numero voti e percentuale per sesso</caption>
        <thead>
            <tr>
                <th>Sesso</th>
                <th>Percentuale</th>
                <th>Numero voti</th>
            </tr>
        </thead>

        <tbody> 
            <?php
            foreach ($votes_for_gender as $gender) {
                echo "<tr>";
                echo "<td>{$gender->sesso}</td>";
                echo "<td>{$gender->percentuale}</td>";
                echo "<td>{$gender->n_voti}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>
