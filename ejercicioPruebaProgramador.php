<?php
error_reporting(0);
class Archivo
{
    public function __construct()
{

    }

   public function leerArchivo($archivo){
   
        $fp = fopen("$archivo", "r");
        $registros=0;
        $total=0;
        $table ="<table border='1'>
                <tr>
                    <th> Numero de transaccion  </th>
                    <th> Monto </th>
                    <th> Identificador </th>
                    <th> Fecha de pago </th>
                    <th> Medio de pago </th>
                </tr>";
        while(!feof($fp)) {
            $registros++;
            $linea = fgets($fp);
            $n_transaccion=substr($linea, 4,21); // identificacion del cliente
            $monto=substr($linea, 25, 13);
            $fecha=substr($linea, 294, 8);
            $identificador=substr($linea, 52, 15); //referencia univoca
            $modo_pago=substr($linea, 8, 1);
            $total+=$monto;
            intval($total);
            $table .= "
                <tr>
                    <td>$n_transaccion</td>
                    <td>$monto</td>
                    <td>$identificador</td>
                    <td>$fecha</td>
                    <td>$modo_pago</td>
                </tr>
           
            ";
           
        }

        $table .= '</table>';
        echo $table;
        echo "Total de registros cobrados:"." ".$registros;
        echo "<br>";
        echo "Monto total de la cobranza:"." ".$total;
        echo "<br>";
        echo "Promedio:"." ".$promedio=$total/$registros;
        fclose($fp);
        return true;

   }

   public function leerOtroArchivo(){

    $fp = fopen("888ENTES5723_308.txt.2021", "r");
    $registros=0;
    $total=0;
    $table ="<table border='1'>
                <tr>
                    <th> Numero de transaccion  </th>
                    <th> Monto </th>
                    <th> Identificador </th>
                    <th> Fecha de pago </th>
                    <th> Medio de pago </th>
                </tr>";
    while(!feof($fp)) {
        $registros++;
        $linea = fgets($fp);
        $n_transaccion=substr($linea, 40,7);
        $monto=substr($linea, 77, 10);
        $monto1=ltrim($monto,0);
        $fecha=substr($linea, 224, 6);
        $identificador=substr($linea, 58, 8);
        $modo_pago=substr($linea, 231, 1);
        $total+=$monto;
        $table .= "
            <tr>
                <td>$n_transaccion</td>
                <td>$monto1</td>
                <td>$identificador</td>
                <td>$fecha</td>
                <td>$modo_pago</td>
            </tr>
       
        ";
       
    }
       
        $table .= '</table>';
        echo $table;
        echo "Total de registros cobrados:"." ".$registros;
        echo "<br>";
        echo "Monto total de la cobranza:"." ".$total;
        echo "<br>";
        echo "Promedio:"." ".$promedio=$total/$registros;
        fclose($fp);
       

    }

}

    $archivo =new Archivo();
    $nombre_archivo="REND.COB-COBC8496.COB-20191125.TXT.2019";
    $nombre_archivo2="REND.REV-REVC8496.REV-20191125.TXT";
    $nombre_archivo3="888ENTES5723_308.txt.2021";
    $archivo->leerArchivo($nombre_archivo);
    $archivo->leerArchivo($nombre_archivo2);
    $archivo->leerOtroArchivo($nombre_archivo3);

?>
