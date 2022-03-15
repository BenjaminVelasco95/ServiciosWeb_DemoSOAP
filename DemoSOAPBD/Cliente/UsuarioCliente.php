<?php
$cliente=new SoapClient(null,array(
    'location'=>"http://localhost/SW/DemoSOAPBD/Servidor/ServidorWS.php",
    'uri'=> "http://localhost/SW/DemoSOAPBD/Servidor/ServidorWS.php",
    'trace'=>1)
);

try {
    echo $saludo=$cliente->__soapCall("Saludar",["Benja"]).'<br>';
    $nombre=$_POST['nombre'];
    $calle=$_POST['calle'];
    $colonia=$_POST['colonia'];
    echo $addUsuario=$cliente->__soapCall("AddUsuario",[$nombre, $calle, $colonia]).'<br>';
} 
catch (SOAPFault $e) {
    echo "Error! ";
    echo $e->getMessage();
}
?>