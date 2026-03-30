<?php
$lista_de_urls = __DIR__ . '/components/url_list.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kore Code - Encurtador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width: 800px;">

        <h1 class="text-center mb-4 fw-bold">Conversor de URL</h1>

        <div class="card shadow-sm mb-4">
            <div class="card-body p-4">

                <form action="/url/convert" method="POST">
                    <label for="url_input" class="form-label fw-bold">Insira a URL que quer converter</label>

                    <div class="d-flex flex-column flex-sm-row gap-2">

                        <input type="text" name="url_input" id="url_input" class="form-control form-control-lg w-100" placeholder="Ex: https://site-gigante.com.br/artigo-longo">

                        <button type="submit" class="btn btn-dark btn-lg fw-bold px-4">Encurtar</button>

                    </div>
                </form>

            </div>
        </div>

        <?php if (!empty($url_simplify)): ?>
            <div class="alert alert-success text-center shadow-sm" role="alert">
                Sua nova URL encurtada: <br>
                <a href="http://<?= $url_simplify['domain'] . $url_simplify['code'] ?>?1" class="alert-link fs-4" target="_blank">
                    <?= $url_simplify['domain'] . $url_simplify['code'] ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="bg-white p-4 rounded shadow-sm">
            <h4 class="mb-3 fw-bold">Últimos links gerados</h4>
            <?php require $lista_de_urls ?>
        </div>

    </div>
</body>

</html>