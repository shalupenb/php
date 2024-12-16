<?php
session_start();

// Класс Product
class Product {
    public $name;
    public $price;

    // Конструктор
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    // Метод для получения продукта в виде строки
    public function getProduct() {
        return "Name: {$this->name}; Price: {$this->price}";
    }

    // Метод для поиска продукта по названию
    public static function searchByName($products, $name) {
        foreach ($products as $product) {
            if (strtolower($product->name) === strtolower($name)) {
                return $product;
            }
        }
        return null;
    }
}

// Инициализация продуктов в сессии
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

// Добавление нового продукта
if (isset($_POST['add'])) {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';

    if (!empty($name) && is_numeric($price)) {
        $product = new Product($name, $price);
        $_SESSION['products'][] = serialize($product); // Сохраняем сериализованный объект
    }
}

// Десериализация продуктов из сессии
$products = array_map('unserialize', $_SESSION['products']);

// Поиск продукта по названию
$searchResult = null;
if (isset($_POST['search'])) {
    $searchName = $_POST['searchName'] ?? '';
    if (!empty($searchName)) {
        $searchResult = Product::searchByName($products, $searchName);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
<h1>Product Management</h1>

<!-- Форма для добавления продукта -->
<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="price">Price:</label>
    <input type="text" name="price" id="price" required>

    <button type="submit" name="add">Add</button>
</form>

<h2>Product List</h2>
<ul>
    <?php foreach ($products as $product): ?>
        <li><?php echo htmlspecialchars($product->getProduct()); ?></li>
    <?php endforeach; ?>
</ul>

<!-- Форма для поиска продукта -->
<h2>Search Product</h2>
<form method="post">
    <label for="searchName">Product Name:</label>
    <input type="text" name="searchName" id="searchName" required>

    <button type="submit" name="search">Search</button>
</form>

<?php if ($searchResult): ?>
    <h3>Search Result:</h3>
    <p><?php echo htmlspecialchars($searchResult->getProduct()); ?></p>
<?php elseif (isset($_POST['search'])): ?>
    <p>No product found with that name.</p>
<?php endif; ?>
</body>
</html>