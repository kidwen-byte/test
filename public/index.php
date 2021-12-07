<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=" description" content="Интернет магазин">
    <meta name=" keywords" content="ключи">
    <meta property="og:title" content="Интернет магазин">
    <meta name="robots" content="..." />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Интернет магазин</title>
</head>
  
<body>
    <?php

    use app\engine\Autoload;
    use app\models\Products;

    include "../config/config.php";
    include "../engine/Autoload.php";

    spl_autoload_register([new Autoload(), 'loadClass']);

    $products = new Products();
    ?>
    <header>
        <div class="container">
            <h1 class="mb-4">Интернет магазин</h1>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <?php if (!$_GET) : ?>
                            <?php foreach ($products->getAll() as $item) : ?>
                                <div class="mb-4 shadow-sm bg-light rounded">
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <img src="../image/1621544556_10-phonoteka_org-p-starii-televizor-fon-12.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                                <?php foreach ($products->getChar($item['id']) as $params) : ?>
                                                    <p class="card-text"><?= $params['char'] . ' : ' . $params['value'] ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <?php foreach ($products->filter($_GET['value']) as $item) : ?>
                                <div class="mb-4 shadow-sm bg-light rounded">
                                    <div class="row g-1">
                                        <div class="col-md-3">
                                            <img src="../image/1621544556_10-phonoteka_org-p-starii-televizor-fon-12.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $products->getProduct($item['products_id'])->name ?></h5>
                                                <?php foreach ($products->getChar($item['products_id']) as $char) : ?>
                                                    <p class="card-text"><?= $char['value'] . ' : ' . $char['char'] ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <aside class="col-4 shadow-sm p-3 mb-5 bg-light rounded">
                        <form action="/" method="GET">
                            <P>Фильтр свойств</P>
                            <select name="value" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option value="43">Диагональ 43</option>
                                <option value="2K">Разрешение 2K</option>
                            </select>
                            <button class="btn btn-primary">Применить</button>
                        </form>
                    </aside>
                </div>
            </div>
        </section>
    </main>
</body>

</html>