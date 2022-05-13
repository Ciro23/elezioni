<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form action="/signup-action" method="post">
    <?php
    if (isset($errors)) {
        echo $errors;
    }
    ?>

    <label for="tessera-elettorale">Numero tessera elettorale</label>
    <input type="text" name="tessera-elettorale" id="tessera-elettorale" maxlength="10">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" maxlength="30">

    <label for="cognome">Cognome</label>
    <input type="text" name="cognome" id="cognome" maxlength="30">

    <label for="eta">Età</label>
    <input type="number" name="eta" id="eta">

    <label for="sesso-m">Maschio</label>
    <input type="radio" name="sesso" id="sesso-m" value="m">
    
    <label for="sesso-f">Femmina</label>
    <input type="radio" name="sesso" id="sesso-f" value="f">

    <input type="submit" name="submit" value="Registrati">
</form>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>