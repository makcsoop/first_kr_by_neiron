<?php
// correct_solution.php

/**
 * Задача 1: Анализатор оценок
 */
function analyzeGrades(array $grades): array {
    if (empty($grades)) {
        return [
            'average' => 0.0,
            'max' => 0,
            'min' => 0,
            'count_excellent' => 0,
            'count_unsatisfactory' => 0
        ];
    }
    
    $total = 0;
    $count = count($grades);
    $max = $grades[0];
    $min = $grades[0];
    $count_excellent = 0;
    $count_unsatisfactory = 0;
    
    foreach ($grades as $grade) {
        $total += $grade;
        
        if ($grade > $max) $max = $grade;
        if ($grade < $min) $min = $grade;
        
        if ($grade === 5) $count_excellent++;
        if ($grade <= 2) $count_unsatisfactory++;
    }
    
    return [
        'average' => round($total / $count, 2),
        'max' => $max,
        'min' => $min,
        'count_excellent' => $count_excellent,
        'count_unsatisfactory' => $count_unsatisfactory
    ];
}

/**
 * Задача 2: Поиск уникальных элементов
 */
function findUniqueElements(array $numbers): array {
    $unique = [];
    $seen = [];
    
    foreach ($numbers as $number) {
        if (!in_array($number, $seen)) {
            $seen[] = $number;
            $unique[] = $number;
        }
    }
    
    return $unique;
}

/**
 * Задача 3: Фильтр товаров по цене
 */
function filterProductsByPrice(array $products, float $minPrice, float $maxPrice): array {
    $filtered = [];
    
    foreach ($products as $product) {
        if (isset($product['price']) && 
            $product['price'] >= $minPrice && 
            $product['price'] <= $maxPrice) {
            $filtered[] = $product;
        }
    }
    
    return $filtered;
}