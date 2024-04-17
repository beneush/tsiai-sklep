<?php
if (!isset($_GET["id"])) {
    header("Location: http://localhost/beneush/sklep/index.php");
    die();
}
$id = $_GET["id"];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bnsh_skleb";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "SELECT * FROM product WHERE ID=\"$id\";";
$result = $conn->query($sql);

if ($result->num_rows < 1) {
    header("Location: http://localhost/beneush/sklep/index.php");
    die();
}

$row = $result->fetch_assoc();

$name = $row["name"];
$iconPath = './assets/img/productIcons/' . $row["ID"] . '.png';
$price = $row['price'];
$ordersCount = $row['orders_count'];
$country = $row['country'];
$description = $row['description']
?>

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

                <div class="navbar-icons">
                    <div class="navbar-icon">
                        <?php include("./assets/img/shopping-cart.svg");?>
                    </div>
                    <div class="navbar-icon">
                        <a href="http://localhost/beneush/sklep/createOffer.php"><?php include("./assets/img/plus.svg");?></a>
                    </div>
                    <div class="navbar-icon">
                        <a href="http://localhost/beneush/sklep/index.php"><?php include("./assets/img/back.svg");?></a>
                    </div>
                </div>

                <br>
            </div>
        </nav>

        <div class="product-info-flex-container">
            <div class="product-photo">
                <h2><?php echo "$name"; ?></h2>
                <img src="<?php echo "$iconPath"; ?>" alt="Ikona produktu">
            </div>

            <div class="productOrder">
                <h2><?php echo "$name"; ?></h2>
                <h2><?php echo "$price"; ?>zł</p>
                <p><?php echo "$ordersCount"; ?> osób kupiło</p>

                <div class="buyProduct">
                    <form method="post" action="process.php">
                        <div class="amount-selection">
                            <button type="button" onclick="decrement()">-</button>
                            <input type="number" id="quantity" value="1" name="quantity" min="1" max="100" placeholder="Enter quantity (1-100)" required>
                            <button type="button" onclick="increment()">+</button>
                        </div>
                        <div class="buyButtons">
                            <button type="submit" name="addToCart">DODAJ DO KOSZYKA</button>
                            <button type="submit" name="buyNow">KUP TERAZ</button>
                        </div>
                        <p>Po naciśnięciu KUP TERAZ przejdziesz do podsumowania dostawy i płatności za zakup. Twoje konto bankowe nie zostanie jeszcze obciążone.</p>
                    </form>
                </div>
            </div>
        </div>

        <div class="product-info-flex-container">
            <div class="product-description">
                <p>Kraj wysyłki: <?php echo "$country"; ?></p>
                <h2>OPIS:</p>
                <p><?php echo "$description"; ?></p>
            </div>
        </div>
        <script>
            function increment() {
                var quantityInput = document.getElementById('quantity');
                var currentValue = parseInt(quantityInput.value);
                if (currentValue < 100) {
                    quantityInput.value = currentValue + 1;
                }
            }

            function decrement() {
                var quantityInput = document.getElementById('quantity');
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }
        </script>
    </body>
</html>