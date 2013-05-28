<?php

class FindGuitarTester
{
    public static function main()
    {
        $inventory = new Inventory();
        self::initializeInventory($inventory);

        $what_erin_likes = new Guitar\Spec(Guitar\Builder::FENDER, 'Stratocastor', Guitar\Type::ELECTRIC, Guitar\Wood::ALDER, Guitar\Wood::ALDER, 6);
        $guitars = $inventory->search($what_erin_likes);
        if (0 < count($guitars)) {
            echo 'Erin, you might like these guitars: ' . PHP_EOL;
            foreach ($guitars as $guitar) {
                $spec = $guitar->getSpec();
                echo 'We have a ' . $spec->getBuilder() . ' ' . $spec->getModel() . ' ' . $spec->getType() . ' guitar:' . PHP_EOL;
                echo $spec->getBackWood() . ' back and sides, ' . PHP_EOL;
                echo $spec->getTopWood() . ' top, ' . PHP_EOL;
                echo 'You can have it for only \\' . $guitar->getPrice() . '!' . PHP_EOL . '---' . PHP_EOL;
            }
        } else {
            echo 'Sorry, Erin, we have nothing for you.' . PHP_EOL;
        }
    }

    private static function initializeInventory($inventory)
    {
        $inventory->addGuitar('V95693', 149900, new Guitar\Spec(Guitar\Builder::FENDER, 'Stratocastor', Guitar\Type::ELECTRIC, Guitar\Wood::ALDER, Guitar\Wood::ALDER, 6));
        $inventory->addGuitar('V9512', 154900, new Guitar\Spec(Guitar\Builder::PRS, 'Stratocastor', Guitar\Type::ELECTRIC, Guitar\Wood::MAHOGANY, Guitar\Wood::MAHOGANY, 6));
        $inventory->addGuitar('V96693', 189900, new Guitar\Spec(Guitar\Builder::FENDER, 'Stratocastor', Guitar\Type::ELECTRIC, Guitar\Wood::ALDER, Guitar\Wood::ALDER, 6));
    }
}

spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . '/' . $class . '.php')) {
        require __DIR__ . '/' . $class . '.php';
        return;
    }

    $dir = str_replace('\\', '/', $class);
    if (file_exists(__DIR__ . '/' . $dir . '.php')) {
        require __DIR__ . '/' . $dir . '.php';
        return;
    }
});

FindGuitarTester::main();
