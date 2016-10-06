<?php

namespace Tetris\Numbers;


trait Filterable
{
    static function filterRows(array $rows, array $filters): array
    {
        $matches = [];
        foreach ($rows as $row) {
            foreach ($filters as $filter) {
                $field = $filter['id'];

                if ($field === 'id') continue;

                $operator = $filter['values'][0];

                $A = $filter['values'][1];
                $B = $filter['values'][2];

                $rowValue = $row->{$field};

                if (is_int($rowValue)) {
                    $A = isset($A) ? (int)$A : PHP_INT_MIN;
                    $B = isset($B) ? (int)$B : PHP_INT_MAX;
                }

                if (is_float($rowValue)) {
                    $A = isset($A) ? (float)$A : PHP_INT_MIN;
                    $B = isset($B) ? (float)$B : PHP_INT_MAX;
                }

                if ($operator === 'equals' && $rowValue != $A) {
                    break 2;
                }

                if ($operator === 'greater than' && $rowValue < $A) {
                    break 2;
                }

                if ($operator === 'less than' && $rowValue > $A) {
                    break 2;
                }

                if ($operator === 'between' && !($rowValue >= $A && $rowValue <= $B)) {
                    break 2;
                }

                if ($operator === 'contains' && stripos($rowValue, $A) === FALSE) {
                    break 2;
                }
            }

            $matches[] = $row;
        }

        return $matches;
    }
}
