<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skleb</title>
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <nav>
            <div class="navbar">
                <br>
                <?php include("./assets/img/logo.svg");?>
                
                <br>

                <div class="navbar-icons">
                    <div class="navbar-icon">
                        <a href="http://localhost/beneush/sklep/index.php"><?php include("./assets/img/back.svg");?></a>
                    </div>
                </div>

                <br>
            </div>
        </nav>

        <div class="add-product-title">
            <h2>Dodaj produkt</h2>
        </div>

        <div class="add-product-form">
            <form action="http://localhost/beneush/sklep/api/productAdd.php" method="POST" enctype="multipart/form-data">
                <label for="productName">Nazwa:</label><br>
                <input type="text" id="productName" name="productName" required><br><br>

                <label for="productPrice">Cena:</label><br>
                <input type="number" id="productPrice" name="productPrice" min="1" step="0.01" required><br><br>

                <label for="productCountry">Kraj:</label><br>
                <input type="text" id="productCountry" name="productCountry" required><br><br>

                <label for="productDescription">Opis:</label><br>
                <textarea id="productDescription" name="productDescription" rows="5" required></textarea><br><br>

                <label for="productIcon">Ikona:</label><br>
                <div class="addFileInput">
                    <input type="file" id="productIcon" name="productIcon" accept="image/png" required><br><br>
                </div>

                <button type="submit">Dodaj</button>
            </form>
        </div>
    </body>
</html>
