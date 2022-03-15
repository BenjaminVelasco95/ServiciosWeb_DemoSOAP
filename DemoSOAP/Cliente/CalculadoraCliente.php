<?php
//Configurar cliente SOAP
$cliente=new SoapClient(null, array(
'location'=>"http://localhost/SW/DemoSOAP/Servidor/CalculadoraServer.php",
'uri'=>"http://localhost/SW/DemoSOAP/Servidor/CalculadoraServer.php",
'trace'=>1
)
); 
try {
    $num1=$_POST['numero1'];
    $num2=$_POST['numero2'];
    echo $saludo=$cliente->__soapCall("Saludar",["Benja"]);
    echo '</br>';
    echo $suma=$cliente->__soapCall("Sumar",[$num1,$num2]);
    echo '</br>';
    echo $resta=$cliente->__soapCall("Restar",[$num1,$num2]);
    echo '</br>';
    echo $multipli=$cliente->__soapCall("Multiplicar",[$num1,$num2]);
    echo '</br>';
    echo $divicion=$cliente->__soapCall("Dividir",[$num1,$num2]);
} catch (SoapFault $th) {
    echo "Error";
    echo $th->getMessage();
}

?>