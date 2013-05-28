<?php

class Guitar
{
    private $serial_number;
    private $price;
    private $spec;

    public function __construct($serial_number, $price, $spec)
    {
        $this->serial_number = $serial_number;
        $this->price = $price;
        $this->spec = $spec;
    }

    public function getSerialNumber()
    {
        return $this->serial_number;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($new_price)
    {
        $this->price = $new_price;
    }

    public function getSpec()
    {
        return $this->spec;
    }
}
