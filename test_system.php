<?php
// test_system.php

//require_once 'solution.php';
//require_once 'correct_solution.php';

class TestSystem {
    
    public function runAllTests() {
        $results = [];
        
        $results['analyzeGrades'] = $this->testAnalyzeGrades();
        $results['findUniqueElements'] = $this->testFindUniqueElements();
        $results['filterProductsByPrice'] = $this->testFilterProductsByPrice();

        return $results;
    }

    private function testAnalyzeGrades() {
        $grades = [5, 4, 3, 5, 2, 1, 4, 5, 3];
        $result = analyzeGrades($grades);
        
        return isset($result['average']) &&
               abs($result['average'] - 3.56) < 0.01 &&
               $result['max'] === 5 &&
               $result['min'] === 1 &&
               $result['count_excellent'] === 3 &&
               $result['count_unsatisfactory'] === 2;
    }

    private function testFindUniqueElements() {
        $numbers = [1, 2, 3, 2, 4, 1, 5, 3, 6];
        $result = findUniqueElements($numbers);
        $expected = [1, 2, 3, 4, 5, 6];
        
        return $result === $expected;
    }

    private function testFilterProductsByPrice() {
        $products = [
            ['name' => 'Товар 1', 'price' => 100],
            ['name' => 'Товар 2', 'price' => 250],
            ['name' => 'Товар 3', 'price' => 50],
            ['name' => 'Товар 4', 'price' => 300]
        ];
        
        $result = filterProductsByPrice($products, 100, 250);
        $expected = [
            ['name' => 'Товар 1', 'price' => 100],
            ['name' => 'Товар 2', 'price' => 250]
        ];
        
        return $result === $expected;
    }

    public function printResults($results) {
        echo "=== РЕЗУЛЬТАТЫ ТЕСТИРОВАНИЯ ===\n\n";
        
        $passed = 0;
        $total = count($results);
        
        foreach ($results as $testName => $passedTest) {
            $status = $passedTest ? '✅ ПРОЙДЕН' : '❌ НЕ ПРОЙДЕН';
            echo str_pad($testName, 25) . ": $status\n";
            if ($passedTest) $passed++;
        }
        
        echo "\n=== ИТОГ ===\n";
        echo "Пройдено тестов: $passed/$total\n";
        echo "Процент успеха: " . round(($passed/$total)*100, 2) . "%\n";
        
        if ($passed === $total) {
            echo "\n🎉 ВСЕ ТЕСТЫ ПРОЙДЕНЫ УСПЕШНО!\n";
        } else {
            echo "\n⚠️  Есть ошибки в решении\n";
        }
    }
}

// Запуск тестов
$testSystem = new TestSystem();
$results = $testSystem->runAllTests();
$testSystem->printResults($results);

// Дополнительный вывод для отладки
echo "\n=== ДЕМОНСТРАЦИЯ РАБОТЫ ФУНКЦИЙ ===\n\n";

// Тест analyzeGrades
$grades = [5, 4, 3, 5, 2, 1, 4, 5, 3];
echo "analyzeGrades:\n";
print_r(analyzeGrades($grades));
echo "\n";

// Тест findUniqueElements
$numbers = [1, 2, 3, 2, 4, 1, 5, 3, 6];
echo "findUniqueElements:\n";
print_r(findUniqueElements($numbers));
echo "\n";

// Тест filterProductsByPrice
$products = [
    ['name' => 'Товар 1', 'price' => 100],
    ['name' => 'Товар 2', 'price' => 250],
    ['name' => 'Товар 3', 'price' => 50],
    ['name' => 'Товар 4', 'price' => 300]
];
echo "filterProductsByPrice (100-250):\n";
print_r(filterProductsByPrice($products, 100, 250));