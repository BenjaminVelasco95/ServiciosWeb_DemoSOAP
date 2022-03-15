<?php
class Usuario{
    public function Saludar($nombre){
        return "Hola".$nombre;
    }

    public function AddUsuario($nombre, $calle, $colonia){
        include 'Conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("INSERT INTO usuarios(nombre, calle, colonia)
        VALUES(:nombre, :calle, :colonia)");
        $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $consulta->bindParam(":calle",$calle,PDO::PARAM_STR);
        $consulta->bindParam(":colonia",$colonia,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
}
try {
    $server=new SoapServer(
        null,
        [
            'uri'=>'http://localhost/SW/DemoSOAPBD/Servidor/ServidorWS.php',
        ]
    );
    $server->setClass('Usuario');
    $server->handle();
}
catch (SOAPFault $th) {
    print $th->faulstring;
}
?>