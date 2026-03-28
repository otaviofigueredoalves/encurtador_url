<?php 
$lista_de_urls = __DIR__ . '/components/url_list.php'; 
?>
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

    <?php if($url_simplify['domain'].$url_simplify['code']): ?>
        <h2>Sua nova URL: <strong><?= $url_simplify['domain'].$url_simplify['code']?></strong></h2>
    <?php endif; ?>

    <?php require $lista_de_urls ?>
    
</body>
</html>