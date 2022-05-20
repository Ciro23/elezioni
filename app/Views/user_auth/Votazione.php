<?= view_cell("\App\Libraries\ViewCells::header") ?>

<body style="background-color: #e6ffff;">
    <form>
        <div class="container">
            <h1>Votazione</h1>
            <hr>
            <label class="form-label" for="partito">Partito</label>
            <select  id = "partito" class="form-select form-select-lg " name="partito">
                <?php
                $db = db_connect();
                $ris = $db->query("SELECT * FROM partiti")->getResultArray();
                foreach($ris as $riga){
                    echo "<option value='{$riga['nome_partito']}'>{$riga['nome_partito']}";
                }
                ?>
            </select>
            <div id="din">

            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $("#partito").change(function(){
                $("#din").load("../Views/user_auth\Votazione.php");
            })
        });
    </script>
</body>
<?= view_cell("\App\Libraries\ViewCells::footer") ?>