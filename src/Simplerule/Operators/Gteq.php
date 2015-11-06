<?php

namespace Simplerule\Operators;

trait Gteq
{
    public static function gteq($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop >= $value) {
                return true;
            }

            return false;
        };
    }
}
