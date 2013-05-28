<?php

class Inventory
{
    private $guitars;

    public function __construct()
    {
        $this->guitars = [];
    }

    public function addGuitar($serial_number, $price, $spec)
    {
        $guitar = new Guitar($serial_number, $price, $spec);
        $this->guitars[] = $guitar;
    }

    public function getGuitar($serial_number)
    {
        foreach ($this->guitars as $guitar) {
            if ($guitar->getSerialNumber() == $serial_number) {
                return $guitar;
            }
        }
        return null;
    }

    public function search(Guitar\Spec $search_spec)
    {
        $found_guitar = array();
        foreach ($this->guitars as $guitar) {
            $spec = $guitar->getSpec();

            if ($spec->matches($search_spec)) {
                $found_guitar[] = $guitar;
            }
        }
        return $found_guitar;
    }
}
