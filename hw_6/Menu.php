<?php

require_once 'MenuItem.php';

class Menu {
    private $listItems = [];

    public function AddMenuItem($name, $url) {
        $menuItem = new MenuItem($name, $url);
        $this->listItems[] = $menuItem;
    }

    public function PrintMenu($width, $height, $backgroundColor, $color) {
        echo "<nav style='position: fixed; top: 0; left: 0; width: 100%; background-color: {$backgroundColor}; height: {$height}px; display: flex; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1);'>";
        echo "<ul style='list-style: none; display: flex; margin: 0; padding: 0; width: {$width}px;'>";
        foreach ($this->listItems as $item) {
            echo "<li style='margin: 0 15px;'>";
            echo "<a href='" . htmlspecialchars($item->url) . "' style='text-decoration: none; color: {$color}; font-size: 16px; font-weight: bold;'>";
            echo htmlspecialchars($item->name);
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</nav>";
    }
}

?>
