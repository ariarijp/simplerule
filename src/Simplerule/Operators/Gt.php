<?php

namespace Simplerule\Operators;

trait Gt
{
    public static function gt($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop > $value) {
                return true;
            }

            return false;
        };
    }
}
