<?php
error_reporting(0);
 function leer($archivo){
    
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

   $archivo=array("REND.COB-COBC8496.COB-20191125.TXT.2019","REND.REV-REVC8496.REV-20191125.TXT") ;
   for ($i=0; $i < count($archivo); $i++) { 
        leer($archivo[$i]);
        
   }

?>