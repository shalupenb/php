<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_id = $_POST['hotel_id'];
    $user_name = $_POST['user_name'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (hotel_id, user_name, comment) VALUES ('$hotel_id', '$user_name', '$comment')";
    if ($conn->query($sql) === TRUE) {
        header("Location: hotelinfo.php?id=" . $hotel_id);
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

$hotels_result = $conn->query("SELECT id, name FROM hotels");

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати коментар</title>
</head>
<style>

 * {
   box-sizing: border-box;
}
body {
   background: #f69a73;
}
.decor {
   position: relative;
   max-width: 400px;
   margin: 50px auto 0;
   background: white;
   border-radius: 30px;
}
.form-left-decoration, .form-right-decoration {
   content: "";
   position: absolute;
   width: 50px;
   height: 20px;
   background: #f69a73;
   border-radius: 20px;
}
.form-left-decoration {
   bottom: 60px;
   left: -30px;
}
.form-right-decoration {
   top: 60px;
   right: -30px;
}
.form-left-decoration:before, .form-left-decoration:after, .form-right-decoration:before, .form-right-decoration:after {
   content: "";
   position: absolute;
   width: 50px;
   height: 20px;
   border-radius: 30px;
   background: white;
}
.form-left-decoration:before {
   top: -20px;
}
.form-left-decoration:after {
   top: 20px;
   left: 10px;
}
.form-right-decoration:before {
   top: -20px;
   right: 0;
}
.form-right-decoration:after {
   top: 20px;
   right: 10px;
}
.circle {
   position: absolute;
   bottom: 80px;
   left: -55px;
   width: 20px;
   height: 20px;
   border-radius: 50%;
   background: white;
}
.form-inner {
   padding: 50px;
}
.form-inner input, .form-inner textarea {
   display: block;
   width: 100%;
   padding: 0 20px;
   margin-bottom: 10px;
   background: #E9EFF6;
   line-height: 40px;
   border-width: 0;
   border-radius: 20px;
   font-family: 'Roboto', sans-serif;
}
.form-inner input[type="submit"] {
   margin-top: 30px;
   background: #f69a73;
   border-bottom: 4px solid #d87d56;
   color: white;
   font-size: 14px;
   cursor: pointer;
}
.form-inner textarea {
   resize: none;
}
.form-inner h3 {
   margin-top: 0;
   font-family: 'Roboto', sans-serif;
   font-weight: 500;
   font-size: 24px;
   color: #707981;
}
select {
   border: none;
   margin-bottom: 15px;
   width: 100%;
   padding: 13px;
   border-radius: 20px;
   background: #E9EFF6;
   font-size: 15px;
   font-weight: 550;   
}

</style>
<body>
   <form class="decor" action="comments.php" method="POST">
   <div class="form-left-decoration"></div>
   <div class="form-right-decoration"></div>
   <div class="circle"></div>
   <div class="form-inner">
      <h3>Написать нам</h3>
      <select name="hotel_id" id="hotel_id" required>
         <?php
         if ($hotels_result->num_rows > 0) {
               while ($row = $hotels_result->fetch_assoc()) {
                  echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
               }
         }
         ?>
      </select>
      <input type="text" name="user_name" id="user_name" required>
      <textarea name="comment" id="comment" required></textarea>
      <input type="submit" value="Отправить">
   </div>
   </form>
</body>
</html>

<?php
$conn->close();
?>
