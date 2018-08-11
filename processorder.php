<?php 
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$find = $_POST['find'];
$address = $_POST['address'];
$date=date("H:i,jS F Y");
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
<title>Bob's Auto Parts-Order Results</title>
</head>

<body>

<h1>Bob's Auto Parts</h1>
<h2>Order Results:</h2>
<?php 
echo "<p>Order processed at".date('H:i,jS F Y')."</p>";
echo '<p> Your order is as follows:</p>';

$totalqty = 0;
$totalqty = $tireqty+$oilqty+$sparkqty;
echo"Items ordered:".$totalqty."<br/>";

if($totalqty==0){
    echo 'you did not order anything on the previous page!<br/>';
}
else{
    if($tireqty>0)
        echo $tireqty.' tires<br/>';
    if($oilqty>0)
        echo $oilqty.' bottles of oil<br/>';
    if($sparkqty>0)
        echo "$sparkqty spark plugs<br/>";
}

echo "<br/>";

$totalamount=0.00;
// define unvariable
define('TIREPRICE', 100);
define('OILPRICE',10);
define('SPARKPRICE',4);
$totalamount= $tireqty*TIREPRICE+$oilqty*OILPRICE+$sparkqty*SPARKPRICE;
echo "Subtotal:$".number_format($totalamount,2)."<br/>";

$taxrate=0.10;
$totalamount=$totalamount*(1+$taxrate);
echo"Total including tax:$".number_format($totalamount,2)."<br/>";
echo '<br/>';

/* echo 'isset($tireqty):'.isset($tireqty).'<br/>'; */
/* echo 'isset($nothere):'.isset($nothere).'<br/>'; */
/* echo 'empty($tireqty):'.empty($tireqty).'<br/>'; */
/* echo 'empty($nothere):'.empty($nothere).'<br/>'; */
/* if($tireqty<10){ */
/*     $discount=0; */
/* }elseif($tireqty<50){ */
/*     $discount=5; */
/* }elseif($tireqty<100){ */
/*     $discount=10; */
/* }else{ */
/*     $discount=15; */ 
/* } */
/* echo '$discount:'.$discount; */
/* if($find=='a'){ */
/*     echo "<p> Regular customer.</p>"; */
/* }elseif($find=='b'){ */
/*     echo "<p>Customer referred by TV advert.</p>"; */
/* }elseif($find=='c'){ */
/*     echo "<p>Customer referred by phone directory.</p>"; */
/* }elseif($find=='d'){ */
/*     echo "<p>Customer referred by word of mouth.</p>"; */
/* }else{ */
/*     echo "<p>We do not know how this customer found us.</p>"; */
/* } */

switch($find){
    case"a":
        echo "<p>Regular customer.</p>";
        break;
    case"b":
        echo "<p>Customer referred by TV advert.</p>";
        break;
    case"c":
        echo "<p>Customer referred by phone directory.</p>";
        break;
    case"d":
        echo "<p>Customer referred by word of mouth.</p>";
        break;
    default:
        echo "<p>We do not konw how this customer found us.</p>";
        break;
}
// while 循环
/* $num=1; */
/* while($num <=5){ */
/*     echo$num."<br/>"; */
/*     $num++; */
/* } */
echo "Address to ship to is ".$address."<br/>";

// write into file
$outputstring=$date."\t".$tireqty."tires\t".$oilqty."oil\t".$sparkqty."spark plugs\t\$".$totalamount."\t".$address."\n";
@$fp=fopen("/Users/aimee/code/php_project/orders/orders.txt","ab");

flock($fp,LOCK_EX);
if(!$fp){
    echo"<p><strong>Your order could not be processed at this time.</strong></p>";
    exit;
}else{
    echo"<p>yeah, this is here.</p>";
}
fwrite($fp,$outputstring,strlen($outputstring));
flock($fp,LOCK_UN);
fclose($fp);
echo"<p>Order written</p>";
//echo"$DOCUMENT_ROOT";
?>
</body>

</html>
