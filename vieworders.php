<?php
// read file
$DOCUMENT_ROOT=$_SERVER["DOCUMENT_ROOT"];
?>

<html>
<head>
<title>Bob's Auto Parts-Customer Orders</title>
</head>

<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>

<?php
$fp=fopen("/Users/aimee/code/php_project/orders/orders.txt", "rb");
if(!$fp){
    echo"<p><strong>No orders pending. Please try again later.</strong></p>";
    exit;
}else{
    echo nl2br(fread($fp,filesize("/Users/aimee/code/php_project/orders/orders.txt")));
    echo"Final position of the file pointer is ".(ftell($fp));
    echo "<br/>";
    rewind($fp);
    echo'After rewind, the position is '.(ftell($fp));
    echo "<br/>";


    /* while(!feof($fp)){ */
    /*     $order=fread($fp,1024); */
    /*     echo $order."<br/>"; */
        /* $order=fgets($fp, 999); */
        /* $order=file($fp); */
        /* echo $order."<br/>"; */
        /* $char=fgetc($fp); */
        /* if(!feof($fp)) */
        /*     echo $char; */
    //}
}
?>
</body>
</html>
