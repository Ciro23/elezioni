<?= view_cell("\App\Libraries\ViewCells::header") ?>

<form action="/signup-action">
    <label for="tessera-elettorale">Numero tessera elettorale</label>
    <input type="text" name="tessera-elettorale" id="tessera-elettorale">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">

    <label for="cognome">Cognome</label>
    <input type="text" name="cognome" id="cognome">

    <label for="eta">Età</label>
    <input type="number" name="eta" id="eta">

    <label for="sesso-m">Maschio</label>
    <input type="radio" name="sesso" id="sesso-m" value="m">
    
    <label for="sesso-f">Femmina</label>
    <input type="radio" name="sesso" id="sesso-f" value="f">

    <input type="submit" name="submit" value="Registrati">
</form>

<?= view_cell("\App\Libraries\ViewCells::footer") ?>