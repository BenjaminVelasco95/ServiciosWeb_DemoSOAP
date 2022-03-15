<?php
    class Calculadora{
        public function Saludar($nombre){
            return "Hola Mundo ".$nombre;
        }
        public function Sumar($numero1, $numero2){
            return $numero1+$numero2;
        }
        public function Restar($numero1, $numero2){
            return $numero1-$numero2;
        }
        public function Multiplicar($numero1, $numero2){
            return $numero1*$numero2;
        }
        public function Dividir($numero1, $numero2){
            return $numero1/$numero2;
        }
    }
    try {
        $server=new SoapServer(
            null,
            [
                'uri'=>'http://localhost/SW/DemoSOAP/Servidor/CalculadoraServer.php',
            ]
        );
        $server->SetClass('Calculadora');
        $server->handle();
    } catch (SOAPFault $th) {
        print $th->faultstring;
    }
?>