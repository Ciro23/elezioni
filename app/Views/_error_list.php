<div>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li style="text-decoration: none" class="text-danger"><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
</div>