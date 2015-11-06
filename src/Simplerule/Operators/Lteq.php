<?php

namespace Simplerule\Operators;

trait Lteq
{
    public static function lteq($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop <= $value) {
                return true;
            }

            return false;
        };
    }
}
