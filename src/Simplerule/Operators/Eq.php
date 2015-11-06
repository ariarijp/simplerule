<?php

namespace Simplerule\Operators;

trait Eq
{
    public static function eq($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop == $value) {
                return true;
            }

            return false;
        };
    }
}
