<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $contactType = htmlspecialchars($_POST['contact_type']);
    $contactValue = htmlspecialchars($_POST['contact_value']);
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
    $someWords = htmlspecialchars($_POST['some_words']);
    $agreement = isset($_POST['agreement']) ? 'Yes' : 'No';


    $uploadDir = 'images/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFile = $_FILES['photo'];
    $filePath = '';
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($uploadedFile['name']);
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
            echo "File uploaded successfully to: $filePath<br>";
        } else {
            echo "Error uploading file.<br>";
        }
    } else {
        echo "No file uploaded or error during upload.<br>";
    }

    echo "<h2>Form Submitted Data:</h2>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Gender: $gender<br>";
    echo "Birthdate: $birthdate<br>";
    echo "Contact: $contactType - $contactValue<br>";
    echo "Hobbies: " . implode(", ", $hobbies) . "<br>";
    echo "Some Words: $someWords<br>";
    echo "Agreement: $agreement<br>";
    echo $filePath ? "Photo: $filePath<br>" : "No photo uploaded.<br>";

    exit;
}

