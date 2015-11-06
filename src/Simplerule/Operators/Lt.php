<?php

namespace Simplerule\Operators;

trait Lt
{
    public static function lt($prop, $value)
    {
        return function ($obj) use ($prop, $value) {
            if ($obj->$prop < $value) {
                return true;
            }

            return false;
        };
    }
}
