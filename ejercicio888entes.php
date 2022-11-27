<?php 

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
    

?>