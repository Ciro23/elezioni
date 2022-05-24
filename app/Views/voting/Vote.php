<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form method="post" action="vote" style="width: 600px" class="mx-auto mt-4 h-100 d-flex flex-column justify-content-between">
    <h1 class="text-center">Votazione</h1>

    <p class="text-center">
        Seleziona un partito e segna fino a due preferenze per i candidati del partito selezionato.
        È anche possibile non esprimere alcuna preferenza
    </p>

    <label class="form-label" for="partito">Partito</label>
    <select id="partito" class="form-select form-select mb-3" name="partito">
        <option value="">-- seleziona un partito --</option>
        <?php
        foreach($parties as $party){
            echo "<option value='{$party->id}'>{$party->nome}";
        }
        ?>
    </select>

    <label for="lista-candidati-1" class="form-label">Candidato 1</label>
    <select id="lista-candidati-1" name="candidato-1" class="lista-candidati form-select form-select mb-3">
        <option value="">-- seleziona prima un partito --</option>
    </select>

    <label for="lista-candidati-2" class="form-label">Candidato 2</label>
    <select id="lista-candidati-2" name="candidato-2" class="lista-candidati form-select form-select mb-3">
        <option value="">-- seleziona prima il candidato 1 --</option>
    </select>

    <button class="btn px-5" type="submit" style="background-color: #00b8e6; border-color:#008fb3; color:white">Vota</button>
</form>

<script>
    $(document).ready(function () {

        $("#partito").on("change", function (){
            $("#lista-candidati-1").load(
                "/assets/included/candidate_list.php",
                {
                    "party": partito.value,
                    "candidates": <?= json_encode($candidates) ?>,
                }
            );
        })

        $("#lista-candidati-1").on("change", function (){
            $("#lista-candidati-2").load(
                "/assets/included/candidate_list.php",
                {
                    "party": partito.value,
                    "candidates": <?= json_encode($candidates) ?>,
                    "already_selected_candidate": document.getElementById("lista-candidati-1").value
                }
            );
        })
    });
</script>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>