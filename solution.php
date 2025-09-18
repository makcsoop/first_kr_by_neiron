<?php
// solution.php

/**
 * Задача 1: Анализатор оценок
 */
function analyzeGrades(array $grades): array
{
    return [
        'average' => array_sum($grades) / count($grades),
        'max' => max($grades),
        'min' => min($grades),
        'count_excellent' => array_count_values($grades)[5],
        'count_unsatisfactory' => array_count_values($grades)[1] + array_count_values($grades)[2]
    ];
}

/**
 * Задача 2: Поиск уникальных элементов
 */
function findUniqueElements(array $numbers): array
{
    $result = [];
    foreach ($numbers as $number) {
        if (in_array($number, $result)) {
            continue;
        }
        $result[] = $number;
    }
    return $result;
}

/**
 * Задача 3: Фильтр товаров по цене
 */
function filterProductsByPrice(array $products, float $minPrice, float $maxPrice): array
{
    $nnj = [];
    foreach ($products as $product) {
        if ($product['price'] >= $minPrice && $product['price'] <= $maxPrice) {
            $nnj[] = $product;
        }
    }
    return $nnj;
}
