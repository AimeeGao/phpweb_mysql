<?php

$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
// 读文件

@$fp=fopen("$DOCUMENT_ROOT/../test.txt","ab");
if(!$fp){
    echo"<p><strong>Your order could not be processed at this time.</strong></p>";
}else{
    echo"<h1>this is the page.</h1>";
}
$outputstring=$date."\t".$tireqty."tires\t".$oilqty."oil\t".$sparkqty."spark plugs\t\$".$totalamount."\t".$address."\n";
fwrite($fp,$outputstring);
?>

