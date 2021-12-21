<?php

namespace App\Services;

class Combinations // Giải thuật combination (Randiom mảng theo xác suất tỉ lệ xuất hiện)
{
  public static function makeCombinations($arrays) { // Mảng (Có thể chưa một mảng trở lên)
        $result = array(array());// Mảng chứa mảng
        foreach ($arrays as $property => $property_values) { // Thực hiện vòng lặp
            $tmp = array(); // $propety_value : value (dạng mảng) sau khi thực hiện foreach
            foreach ($result as $result_item) { // thực hiện foreach result để lấy key
                foreach ($property_values as $property_value) {  // thực hiện vòng lặp cho các mảng $property_value
                    $tmp[] = array_merge($result_item, array($property => $property_value)); // lấy value trong $property_value
                    // thực hiện merge các giá trị lại với nhau (a*b a*c a*d)
                    // cho vào mảng $tmp
                }
            }
            $result = $tmp; // gán giá trị $tmmp cho $result
        }
        return $result; // trả về kết quả $result
    }
}
