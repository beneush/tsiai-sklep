<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bnsh_skleb";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "SELECT * FROM product;";
$result = $conn->query($sql);
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
                </div>

                <br>
            </div>
        </nav>

        <div class="card-container">
            <?php
            while ($row = $result->fetch_assoc()) {
                $id = $row["ID"];
                echo "<a href=\"http://localhost/beneush/sklep/product.php?id=$id\"><div class=\"card\">";
                $iconPath = './assets/img/productIcons/' . $row["ID"] . '.png';
                if (file_exists($iconPath)) {
                    echo '<img src="' . $iconPath . '" alt="Ikona produktu">';
                } else {
                    echo '<img src="./assets/img/product-icon-placeholder.png" alt="Ikona produktu">';
                }
                echo '<h3>' . $row["price"] . 'zł</h3>';
                echo '<p>' . $row["name"] . '</p>';
            echo '</div></a>';
            }
            ?>
        </div>
    </body>
</html>

<?php 
$conn->close();
?>