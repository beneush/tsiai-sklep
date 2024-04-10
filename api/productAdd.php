<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bnsh_skleb";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productCountry = $_POST['productCountry'];
    $productDescription = $_POST['productDescription'];

    // Upload Product Icon
    $targetDir = "./assets/img/productIcons/";
    $fileName = basename($_FILES["productIcon"]["name"]);
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["productIcon"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only PNG files
    if($imageFileType != "png") {
        echo "Sorry, only PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Insert product data into database
        $sql = "INSERT INTO product (name, price, country, description)
                VALUES ('$productName', '$productPrice', '$productCountry', '$productDescription')";

        if ($conn->query($sql) === TRUE) {
            // Retrieve the auto-incremented ID
            $last_id = $conn->insert_id;

            // Rename file with product ID
            $newFileName = $targetDir . $last_id . ".png";

            // Move uploaded file to destination with new name
            if (move_uploaded_file($_FILES["productIcon"]["tmp_name"], $newFileName)) {
                // Update the product row with the icon filename
                $sql = "UPDATE products SET icon='$newFileName' WHERE id='$last_id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Product added successfully.";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
