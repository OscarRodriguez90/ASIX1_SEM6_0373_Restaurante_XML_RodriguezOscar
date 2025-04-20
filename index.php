<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="./img/pan.png" type="image/x-icon"> <!-- Add favicon -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="?filter=Entrante">Entrantes</a></li>
                <li><a href="?filter=Primer Plato">Primer Plato</a></li>
                <li><a href="?filter=Segundo Plato">Segundo Plato</a></li>
                <li><a href="?filter=Postre">Postres</a></li>
                <li><a href="index.php">CARTA COMPLETA</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Lahore Karahi</h1>
        <div class="menu">
            <?php
            $xml = simplexml_load_file('./xml/XML.xml');
            $filter = isset($_GET['filter']) ? $_GET['filter'] : null;

            if ($filter) {
                foreach ($xml->plato as $plato) {
                    if ((string)$plato['tipoPlato'] === $filter) {
                        echo '<div class="plato">';
                        echo '<h2>' . $plato->nombrePlato . '</h2>';
                        echo '<img src="' . str_replace('../', './', (string)$plato->imagen) . '" alt="Imagen de ' . $plato->nombrePlato . '">';
                        echo '<p><strong>Precio:</strong> ' . $plato->precio . '</p>';
                        echo '<p><strong>Descripción:</strong> ' . $plato->descripcion . '</p>';
                        echo '<p><strong>Calorías:</strong> ' . $plato->calorias . '</p>';
                        echo '<p><strong>Categorías:</strong> ';
                        foreach ($plato->caracteristicas->categoria as $categoria) {
                            echo $categoria . ', ';
                        }
                        echo '</p>';
                        echo '</div>';
                    }
                }
            } else {
                foreach ($xml->plato as $plato) {
                    echo '<div class="plato">';
                    echo '<h2>' . $plato->nombrePlato . '</h2>';
                    echo '<img src="' . str_replace('../', './', (string)$plato->imagen) . '" alt="Imagen de ' . $plato->nombrePlato . '">';
                    echo '<p><strong>Precio:</strong> ' . $plato->precio . '</p>';
                    echo '<p><strong>Descripción:</strong> ' . $plato->descripcion . '</p>';
                    echo '<p><strong>Calorías:</strong> ' . $plato->calorias . '</p>';
                    echo '<p><strong>Categorías:</strong> ';
                    foreach ($plato->caracteristicas->categoria as $categoria) {
                        echo $categoria . ', ';
                    }
                    echo '</p>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </main>
</body>
</html>
