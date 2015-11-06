<?php

namespace Simplerule\Operators;

trait Neq
{
    public static function neq($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop != $value) {
                return true;
            }

            return false;
        };
    }
}
