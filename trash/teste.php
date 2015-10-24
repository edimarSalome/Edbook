<?php

$usuario = 'Edimar';

$data = new DateTime();
/* Comentarios */
$mes = date_format($data, 'M');

echo $mes."<br>";

switch($mes){
    case 'Feb' : echo 'Fev'; break;
    case 'Apr' : echo 'Abr'; break;
    case 'May' : echo 'Mai'; break;
    case 'Sep' : echo 'Set'; break;
    case 'Oct' : echo 'Out'; break;
    case 'Dec' : echo 'Dez'; break;
    default : echo date_format($data, 'M');
}


$num1 = 10;
$num2 = 30;

echo '<h1>Hello '.$usuario.'</h1>';

echo $num1+$num2."<br>";
echo $num1-$num2."<br>";
echo $num1/$num2."<br>";
echo $num1*$num2."<br><br>";

if($num1 > $num2){
    echo 'Eureka';
}else{
    echo 'Senao';
}

for($i = 0; $i<10; $i++){
    echo $i."<br>";
}


$lista = array(
    'a' => 'Edimar',
    'b' => 'Cleiton',
    'c' => 'Andrey',
    'd' => 'Ítalo'
);

echo "<br><br><br><br><br><br><br><br><br>";
echo "Arrays ---------------<br>";

foreach($lista as $chave => $valor){
    echo $chave.' = '.$valor.'<br>';
}

echo array_key_exists('c', $lista)."<br>";

echo array_search('Andrey', $lista);

echo "<br><br><br><br><br><br><br><br><br><br><br><br>";


?>










