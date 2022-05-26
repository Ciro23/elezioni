<option value="">-- nessuno --</option>

<?php
foreach ($_POST['candidates'] as $candidate) {
    if (
        $candidate['partito'] === $_POST['party']
        && $candidate['id'] != $_POST['already_selected_candidate']
    ) {
        echo "<option value='{$candidate['id']}'>{$candidate['cognome']} {$candidate['nome']}</option>";
    }
}