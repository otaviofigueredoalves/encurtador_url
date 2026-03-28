<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Conversor de URL</h1>
    <form action="/url/convert" method="POST">
        <label for="url_input">Insira a URL que quer converter</label><br>
        <input type="text" name="url_input" id="url_input">
        <button type="submit">Encurtar URL</button>
    </form>
    <?php if(!empty($view_data['url_simplify'])): ?>
        <h2>URL PRONTA: </h2>
        <p><strong>URL: </strong><?= config('domain').$view_data['url_simplify']['code'] ?></p>
    <?php endif ?>
    <h2>Lista de URLs</h2>

    <?php if(!empty($view_data['urls_list'])): ?>

        <?php foreach($view_data['urls_list'] as $dado): ?>
            <ul>
                <li><?= config('domain').$dado['code'] ?></li>
            </ul>
        <?php endforeach; ?>

    <?php elseif(!empty($view_data)): ?>

        <?php foreach($view_data as $dado): ?>
            <ul>
                <li><?= config('domain').$dado['code'] ?></li>
            </ul>
        <?php endforeach; ?>

    <?php else: ?>
        <p style="color: red">Nenhuma URL encontrada</p>
    <?php endif; ?>

    
</body>
</html>