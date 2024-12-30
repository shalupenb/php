<?php

require_once 'Category.php';

session_start();

if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [];
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_name'])) {
    $categoryName = trim($_POST['category_name']);

    if (!empty($categoryName)) {
        $newCategory = new Category($categoryName, $_SESSION['products']);
        $_SESSION['categories'][] = $newCategory;
        $_SESSION['products'] = [];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'])) {
    $productName = trim($_POST['product_name']);
    if (!empty($productName)) {
        $_SESSION['products'][] = $productName;
    }
}

$searchResult = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_category'])) {
    $searchCategoryName = trim($_POST['search_category']);
    if (!empty($searchCategoryName)) {
        $searchResult = Category::findCategory($_SESSION['categories'], $searchCategoryName);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories and Products</title>
</head>
<body>
<h1>Категории и Продукты</h1>

<form method="POST">
    <input type="text" name="product_name" placeholder="Название продукта" required>
    <button type="submit">Добавить продукт</button>
</form>

<h2>Продукты</h2>
<ul>
    <?php foreach ($_SESSION['products'] as $product): ?>
        <li><?= htmlspecialchars($product) ?></li>
    <?php endforeach; ?>
</ul>

<form method="POST">
    <input type="text" name="category_name" placeholder="Название категории" required>
    <button type="submit">Добавить категорию</button>
</form>

<h2>Категории</h2>
<ul>
    <?php foreach ($_SESSION['categories'] as $index => $category): ?>
        <li>
            <a href="?category=<?= $index ?>"><?= htmlspecialchars($category->getCategoryName()) ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Поиск категории</h2>
<form method="POST">
    <input type="text" name="search_category" placeholder="Введите название категории" required>
    <button type="submit">Найти категорию</button>
</form>

<?php if ($searchResult !== null): ?>
    <h3>Результаты поиска</h3>
    <?php if ($searchResult): ?>
        <p>Категория: <?= htmlspecialchars($searchResult->getCategoryName()) ?></p>
        <h4>Продукты в категории:</h4>
        <ul>
            <?php foreach ($searchResult->getCategoryProducts() as $product): ?>
                <li><?= htmlspecialchars($product) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Категория не найдена.</p>
    <?php endif; ?>
<?php endif; ?>

<?php
if (isset($_GET['category'])) {
    $index = (int)$_GET['category'];
    if (isset($_SESSION['categories'][$index])) {
        $selectedCategory = $_SESSION['categories'][$index];
        echo "<h3>Продукты в категории: " . htmlspecialchars($selectedCategory->getCategoryName()) . "</h3>";
        echo "<ul>";
        foreach ($selectedCategory->getCategoryProducts() as $product) {
            echo "<li>" . htmlspecialchars($product) . "</li>";
        }
        echo "</ul>";
    }
}
?>
</body>
</html>
