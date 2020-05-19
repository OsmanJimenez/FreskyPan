<?php
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$dura=date("Y-m-d",strtotime($fec."+ ".$dur." days") );

  $Datein                    = date('d/m/Y H:i:s', strtotime($fec));
    $Datefi                    = date('d/m/Y H:i:s', strtotime($dura));
    $inicio = _formatear($Datein);
    // y la formateamos con la funcion _formatear
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}
    $final  = _formatear($Datefi);

$query_last = "SELECT MAX(id) AS id FROM Agenda";
$result_last = mysqli_query($conn, $query_last);
$fila_last = mysqli_fetch_array($result_last);
if(empty($fila_last)){$last_age=1;}else{$last_age=$fila_last['id']+1;}

$query_age="INSERT INTO `Agenda`( `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`)VALUES('$tit','$bod','http://localhost/linea/backend/Calendario/descripcion_evento.php?id=$last_age','event-success','$inicio','$final','$fec','$dura')";
mysqli_query($conn,$query_age);

?>