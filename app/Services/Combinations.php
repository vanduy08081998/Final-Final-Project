<?php

namespace App\Services;

class Combinations // Giải thuật combination (Randiom mảng theo xác suất tỉ lệ xuất hiện)
{
  public static function makeCombinations($arrays) {
        $result = array(array());// Mảng chứa mảng
        foreach ($arrays as $property => $property_values) { // Thực hiện vòng lặp 
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }
}
