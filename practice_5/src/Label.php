<?php

namespace App;

class Label extends Control {
    private $for;

    public function __construct($background, $width, $height, $forObject) {
        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setParentName($forObject);
    }

    public function getParentName() {
        return $this->for;
    }

    public function setParentName($forObject) {
        if (method_exists($forObject, 'getName')) {
            $this->for = $forObject->getName();
        }
    }
}