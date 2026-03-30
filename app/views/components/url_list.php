<?php if ($view_data['urls_list']): ?>

    <?php foreach ($view_data['urls_list'] as $url): ?>
        <?php $converted_url = $url['domain'] . $url['code']?>
        <ul>
            <li><a href="http://<?= $converted_url ?>"><?= $converted_url . ' - '. 'ACESSADO: '. $url['click_count']?></a></li>
        </ul>
    <?php endforeach; ?>
    
<?php else: ?>
    <p style="color: red">Nenhuma URL encontrada!</p>
<?php endif; ?>