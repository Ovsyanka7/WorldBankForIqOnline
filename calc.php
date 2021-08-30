<?php

//Ставка банка.
$PRECENT = 0.1;
// День оформления вклада.
$date = intval(substr($_POST['date'], 0, 2)); 
// Месяц оформления вклада.
$mounth = intval(substr($_POST['date'], 3, 2)); 
// Год оформления вклада.
$year = intval(substr($_POST['date'], 6, 4));
// Сумма вклада.
$summn = $_POST['summa_vklada'];
// Срок вклада (в месяцах).
$srok_vklada = $_POST['srok_vklada'];
// Пополнение вклада (boolean).
$popolneniye_vklada_bool = $_POST['popolneniye_vklada_bool'];

// Сумма пополнения вклада.
if ($popolneniye_vklada_bool == "true"){
    $summadd = $_POST['summa__popolneniya_vklada'];
} else{
    $summadd = 0;
}

// Рассчитать количество дней в году и в месяце.
yearAndMounthUpdate(); 

// В первый месяц не учитывается сумма пополнения вклада.
$summn = $summn + $summn * $daysn * ($PRECENT / $daysy);

// Цикл по всем месяцам.
for ($i = 2; $i <= $srok_vklada; $i++){
    // Переходим на следующий месяц.
    if ($mounth == 12) {
        $mounth = 1;
        $year = $year+1;
    } else {
        $mounth = $mounth +1;
    }

    // Обновляем переменные.
    yearAndMounthUpdate(); 
    
    $summn = $summn + $summadd +  ($summn + $summadd) * $daysn * ($PRECENT / $daysy);
}

// Рассчитать количество дней в году и в месяце.
function yearAndMounthUpdate()
{
    // Количество дней в году.
    global $daysy;
    global $year;   
    if($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0){
        $daysy = 366;
    }
    else {
        $daysy = 365;
    }

    // Количество дней в месяце.
    global $daysn;
    global $mounth;
    switch ($mounth) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $daysn = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $daysn = 30;
            break;
        case 2:
            if ($daysy == 365)
                $daysn = 28;
            else
                $daysn = 29;
            break;
        default:
            $daysn = 30;
            break;
    }
}

// Возврат итоговой суммы на страницу.
echo json_encode(intval($summn)); 
