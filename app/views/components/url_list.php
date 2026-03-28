<h2>Lista de URLS: </h2>
<?php if ($view_data['urls_list']): ?>

    <?php foreach ($view_data['urls_list'] as $url): ?>
        <ul>
            <li><?= $url['domain'] . $url['code'] ?></li>
        </ul>
    <?php endforeach; ?>
    
<?php else: ?>
    <p style="color: red">Nenhuma URL encontrada!</p>
<?php endif; ?>