<?php

require_once (__DIR__ . '/vendor/autoload.php');
function convertToHTML(\App\Control $control) {
    if ($control instanceof \App\Button) {
        return "<button style=\"background: {$control->getBackground()}; width: {$control->getWidth()}px; height: {$control->getHeight()}px;\" type=\"" . ($control->getSubmitState() ? "submit" : "button") . "\">{$control->getValue()}</button>";
    } elseif ($control instanceof \App\Text) {
        return "<input type=\"text\" style=\"background: {$control->getBackground()}; width: {$control->getWidth()}px; height: {$control->getHeight()}px;\" name=\"{$control->getName()}\" value=\"{$control->getValue()}\" placeholder=\"{$control->getPlaceholder()}\" />";
    } elseif ($control instanceof \App\Label) {
        return "<label style=\"background: {$control->getBackground()}; width: {$control->getWidth()}px; height: {$control->getHeight()}px;\" for=\"{$control->getParentName()}\">{$control->getParentName()}</label>";
    }
    return "";
}

$button = new \App\Button("cyan", 200, 50, "submitButton", "Submit", true);
$text = new \App\Text("white", 200, 30, "username", "", "Enter your name");
$label = new \App\Label("white", 200, 30, $text);

echo convertToHTML($button);
echo "</br>";
echo convertToHTML($text);
echo convertToHTML($label);

?>