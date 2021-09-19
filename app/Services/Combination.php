<?php

namespace App\Services;

class Combination
{
    // Recursively get combination of 2d array
    public function combinationMultiline($items, $mutated = [], $recursionCount = 0)
    {
        $key1 = $recursionCount;
        $key2 = $key1 + 1;
        // initial value of the $mutated must be the 1st row
        $mutated = $recursionCount === 0 ? $items[0] : $mutated;
        
        if (empty($items[$key2])) {
            return $mutated;
        } else {
            $mutated = $this->combination($mutated, $items[$key2]);
            return $this->combinationMultiline($items, $mutated, $key2);
        }
    }

    // Getting combination of 2 rows
    private function combination($first, $second)
    {
        $combination = [];
        foreach ($first as $key => $item) {
            foreach ($second as $key2 => $item2) {
                if (is_array($item)) {
                    $combination[] = [...$item, $item2];
                } else {
                    $combination[] = [$item, $item2];
                }
            }
        }
        return $combination;

    }
}
