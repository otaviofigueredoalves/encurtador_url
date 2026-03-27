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

    <h2>URL PRONTA: </h2>
    <p><strong>URL: </strong><?= config('domain').$code ?></p>
    <!-- <?php var_dump($dados) ?> -->

</body>
</html>