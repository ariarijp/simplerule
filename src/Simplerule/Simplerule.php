<?php

namespace Simplerule;

class Simplerule
{
    private $conditions = [];

    public function __construct(array $conditions)
    {
        $this->parse($conditions);
    }

    public function addCondition(\Closure $f)
    {
        $this->conditions[] = $f;
    }

    public function addConditions(array $fs)
    {
        $this->conditions = array_merge($this->conditions, $fs);
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function clearConditions()
    {
        $this->conditions = [];
    }

    public function parse(array $conditions)
    {
        foreach ($conditions as $condition) {
            list($prop, $operator, $value) = explode(' ', $condition);

            if (in_array($operator, Operators::$supportedOperators)) {
                $this->conditions[] = Operators::$operator($prop, $value);
                continue;
            }

            throw new \Exception('This operator is not supported.');
        }
    }

    public function evaluate(\stdClass $obj)
    {
        return $this->andEvaluate($obj);
    }

    public function andEvaluate(\stdClass $obj)
    {
        $result = true;

        foreach ($this->conditions as $condition) {
            $result = $result && $condition($obj);
        }

        return $result;
    }

    public function orEvaluate(\stdClass $obj)
    {
        $result = false;

        foreach ($this->conditions as $condition) {
            $result = $result || $condition($obj);
        }

        return $result;
    }
}
