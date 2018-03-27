<?php 
$mass = [960,123,435,546,123,345,565,765,876,345,234,657,768,478,967,456,321];

echo 'Исходные данные: '.json_encode($mass);

$maxSumm = 0;
$number = 0;
for ($i = 0; $i < counts($mass); $i++){
    $answer = numberOfDividers($mass[$i]);
    if ($maxSumm < $answer['summ']){
        $maxSumm = $answer['summ'];
        $number = $mass[$i];
        $mass_number = $answer['mass'];
    }
}

echo '<br>Число с наибольшей суммой простых делителей '.$number.'; Максимальная сумма делителей числа: '.$maxSumm.'; Делители: '.json_encode($mass_number);

// сумма простых делителий числа
function numberOfDividers ($number){
    $numbers = [];
    $summ = 0;
    for ($i = 1; $i < $number; $i++){
        if ($number % $i == 0){
            if (primeNumber($i)){
                $summ += $i;
                $numbers[] = $i;
            }            
        }
    }
    $answer = array(
        'summ' => $summ,
        'mass' => $numbers
    );

    return $answer;
}

function primeNumber ($number){
    $answer = [];
    for ($i = 2; $i < $number; $i++){
        if ($number % $i == 0){
            return false;
        }
    }
    return true;
}

function counts($mass){
    $i = 1;            
    while ($mass[$i].'' != ''){
        $i++;
    }
    return $i;
}

?>