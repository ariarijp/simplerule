<?php

namespace Simplerule;

class Operators
{
    use Operators\Eq;
    use Operators\Neq;
    use Operators\Lt;
    use Operators\Lteq;
    use Operators\Gt;
    use Operators\Gteq;

    const OPERATOR_EQ = 'eq';
    const OPERATOR_NEQ = 'neq';
    const OPERATOR_GT = 'gt';
    const OPERATOR_GTEQ = 'gteq';
    const OPERATOR_LT = 'lt';
    const OPERATOR_LTEQ = 'lteq';

    public static $supportedOperators = [
        Operators::OPERATOR_EQ,
        Operators::OPERATOR_NEQ,
        Operators::OPERATOR_GT,
        Operators::OPERATOR_GTEQ,
        Operators::OPERATOR_LT,
        Operators::OPERATOR_LTEQ,
    ];
}
