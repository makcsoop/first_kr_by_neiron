<?php
// solution.php

/**
 * Задача 1: Анализатор оценок
 */
function analyzeGrades(array $grades): array {
    $avg = 0; 
    $max = -1; 
    $min = 6; 
    $c_e = 0; 
    $c_u = 0; 
    for ($i = 0; $i < count($grades); $i++){ 
        $avg += $grades[$i]; 
        $max = max($max, $grades[$i]); 
        $min = min($min, $grades[$i]); 
        if ($grades[$i] === 5){ 
            $c_e++; 
        }
        if ($grades[$i] === 1 or $grades[$i] === 2){
            $c_u++; 
        }

    }

    
    return [
        'average' => ($avg / count($grades)),
        'max' => $max,
        'min' => $min,
        'count_excellent' => $c_e,
        'count_unsatisfactory' => $c_u 
    ];
}

/**
 * Задача 2: Поиск уникальных элементов
 */
function findUniqueElements(array $numbers): array {
    $res = []; 
    for ($i = 0; $i < count($numbers); $i++){ 
        if (!in_array($numbers[$i], $res)){ 
            array_push($res, $numbers[$i]); 
        }
    }
    return $res;
}

/**
 * Задача 3: Фильтр товаров по цене
 */
function filterProductsByPrice(array $products, float $minPrice, float $maxPrice): array {
    $res = [];
    for ($i = 0; $i < count($products); $i++){ 

        if ($products[$i]['price'] == $minPrice){ 
            array_push($res, $products[$i]);
        }
        if ($products[$i]['price'] == $maxPrice){ 
            array_push($res, $products[$i]);
        }
    }


    return $res;
}
