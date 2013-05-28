<?php
namespace Guitar;

class Spec
{
    private $builder;
    private $model;
    private $type;
    private $back_wood;
    private $top_wood;
    private $num_strings;

    public function __construct($builder, $model, $type, $back_wood, $top_wood, $num_strings)
    {
        $this->builder = $builder;
        $this->model = $model;
        $this->type = $type;
        $this->back_wood = $back_wood;
        $this->top_wood = $top_wood;
        $this->num_strings = $num_strings;
    }

    public function getBuilder()
    {
        return $this->builder;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getBackWood()
    {
        return $this->back_wood;
    }

    public function getTopWood()
    {
        return $this->top_wood;
    }

    public function getNumStrings()
    {
        return $this->num_strings;
    }

    public function matches(\Guitar\Spec $target_spec)
    {
        $builder = $target_spec->getBuilder();
        if ($builder != $this->getBuilder()) {
            return false;
        }

        $model = strtolower($target_spec->getModel());
        if ((!is_null($model)) and ($model != '') and ($model != strtolower($this->getModel()))) {
            return false;
        }

        $type = $target_spec->getType();
        if ($type != $this->getType()) {
            return false;
        }

        $back_wood = $target_spec->getBackWood();
        if ($back_wood != $this->getBackWood()) {
            return false;
        }

        $top_wood = $target_spec->getTopWood();
        if ($top_wood != $this->getTopWood()) {
            return false;
        }

        return true;
    }
}
