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
                
                <div class="navbar-search-bar">
                    <form action="search.php" method="get">
                        <input type="text" name="search" id="search" placeholder="Wyszukaj...">
                        <button type="submit">Szukaj</button>
                    </form>
                </div>

                <div class="cart-icon">
                    <?php include("./assets/img/shopping-cart.svg");?>
                </div>
                <br>
            </div>
        </nav>

        <div class="card-container">
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
            <div class="card">
                <img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">
                <h3>13,58zł</h3>
                <p>Cegła w kartonie po mleku</p>
            </div>
        </div>
    </body>
</html>