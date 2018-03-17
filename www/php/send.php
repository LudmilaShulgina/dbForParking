<? 
require_once("../php/MySiteDB.php");
// ----------------------------конфигурация-------------------------- // 
$date=date("d.m.y"); // число.месяц.год 
$backurl="../index.php ";  // На какую страничку переходит после отправки письма 

//----------------------Добавляем информацию в БД "Заявки"--------------------------- // 
$name=$_POST['firstname'];  
$mail=$_POST['email'];  
$phone=$_POST['tel']; 
$oplata_check=$_POST['pay'];
if ($oplata_check=="Единовременная")
{
$oplata='one';
$oplatach='Единовременная';
}
elseif ($oplata_check=="Рассрочка")
{
$oplata='ras';
$oplatach='Рассрочка';
}

$sec_buy= $_POST['sec_buy'];
// определям id скидки
if ($oplata=='one' and $sec_buy=='1')
{
$sale_id='3';
}
elseif($oplata=='one')
{
$sale_id='1';
}
elseif ($sec_buy=='1')
{
$sale_id='2';
}
else
{
$sale_id='4';
};
echo $oplata;
//echo $sec_buy;
//echo $sale_id;

// Определяем способ связи
$how_call_check=$_POST['call'];
if ($how_call_check=="Телефон")
{
$how_call='t';
$callch='По телефону';
}
else
{
$how_call='e';
$callch='Электронная почта';		
};
// Подписка на новости
$news=$_POST['subscribe'];
//echo $news;
// ID выбранного места
$spot_id=$_POST['spot_number'];	
//echo $spot_id;

//Вывести номер места, номер стоянки и адрес помещения.				
//echo "<tr><td>",$zayavki['spot_id'],"</td><td></td>"; 

$query_spot = "SELECT number, section,building_id,price FROM spot WHERE id=$spot_id";   
$select_spot=mysqli_query($link,$query_spot);
$spot=mysqli_fetch_array($select_spot);						
//Вытаскиваем адрес объекта
$buich=$spot['building_id'];
$query_bui = "SELECT title, adres FROM building WHERE id=$buich";   
$select_bui=mysqli_query($link,$query_bui);
$bui=mysqli_fetch_array($select_bui);
//echo "<tr><td>мм №",$spot['number'],", секция ",$spot['section'],"<br>",$bui['title'],"</td><td>",$spot['price']," руб.</td>";

if(($name)&&($mail)&&($phone)){
$query="INSERT INTO zayavki(id,sale_id,spot_id,name,phone,mail,oplata ,sec_buy, how_call,news) VALUES(NULL,'$sale_id','$spot_id','$name','$phone','$mail','$oplata','$sec_buy','$how_call','$news')";
$result=mysqli_query($link,$query);


//Отправка электронного письма
$to = '@'; //Почта получателя, через запятую можно указать сколько угодно адресов
$subject = 'Заявка на бронирование парковочного места'; //Заголовок сообщения
$message = '
<html>
<head>
<title>'.$subject.'</title>
</head>
<body>
<article>

<h3>Контактные данные</h3>
<p>Имя: '.$name.'</p>
<p>Телефон: '.$phone.'</p> 
<p>E-mail: '.$mail.'</p>
<p>Предпочтительный способ связи: '.$callch.'</p>

<h3>Парковочное место:</h3>	
<p>Стоимость:<b>'.$spot['price'].'</b></p>
<p>Номер:'.$spot['number'].'</p>
<p>Секция:'.$spot['section'].'</p>
<p>Очередь:'.$bui['title'].'</p>
<p>Адрес объекта:'.$bui['adres'].'</p>

<h3>Детали заявки:</h3>	
<p>Способ оплаты: '.$oplatach.'</p>
<p>Дата заявки: '.$date.'</p>
</article>
</body>
</html>'; //Текст нащего сообщения можно использовать HTML теги
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
$headers .= "From: Отправитель <mechanical_whale@mail.ru>\r\n"; //Наименование и почта отправителя
if (mail($to, $subject, $message, $headers)) //Отправка письма с помощью функции mail
{ 
print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 2000); 
//--></script> 					 
$msg 					 
<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу</p>";  
exit; 
} 
else 
{ 
echo "при отправке сообщения возникли ошибки"; 
}
};

?>