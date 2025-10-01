<?php 
$arr = [];
$x=0;
while(count($arr)<=10){
    if($x%2==0){
        $arr[]=$x;
    }
    $x++;
}
//ar_dump($arr);
for($y=0; $y<count($arr); $y++){
 echo $arr[$y]."<br>";
}

$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach($v as $key=>$value){
    echo $key." ".$value. "<br>";
}

$multi = ["john"=>["email"=>"john@demo.com","website"=>"www.john.com","age"=>22,"password"=>"pass"],"anna"=>["email"=>"anna@demo.com","website"=>"www.anna.com","age"=>24,"password"=>"pass"] ];
foreach($multi as $key=>$value){
    echo $key." ";
    print_r($value);
    echo "<br>";
}

$z=[];
for($x=0; $x<30; $x++){
    $z[]=rand(0,20);
}
print_r($z);
echo "<br>";

$heros=["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];
print_r($heros);
echo "<br>";
array_pop($heros);
print_r($heros);
echo "<br>";
for($x=0; $x<count($heros); $x++){
    if($heros[$x]=="Superman"){
        echo "La posición del heroe en la matriz es: ".($x+1)."<br>";
    }
}

array_push($heros, 'Carl', 'Lenny', 'Burns', 'Lisa');

print_r($heros);
echo "<br>";
sort($heros);
print_r($heros); 

array_unshift($heros, 'Apple', 'Melon', 'Watermelon');
echo "<br>";
print_r($heros); 
echo "<br>";
$copia=array_slice($heros,2,4);
print_r($copia);
?>