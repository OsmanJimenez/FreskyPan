<?php
session_start();
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$canini= $_POST['ci'];	
$uni=$_POST['uni'];
$fec=$_POST['fecha'];	

$ids = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$query4="SELECT nombre,duracion FROM catproducto WHERE ID_CATPRODUCTO='$cod_pro'";
 $result6=mysqli_query($conn,$query4);
 if ($row2 = mysqli_fetch_array($result6)) {
$id2 =$row2['nombre'];
$dur= $row2['duracion'];
}

$dura=date("Y-m-d",strtotime($fec."+ ".$dur." days") );
$desc="Se ha añadido un lote de produccion para ".$id2." con la cantidad ".$canini;
$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$ids')";

$tit="Duracion lote ".$id2;
$bod="Duracion de la produccion de ".$id2." de la fecha ".$fec;
  $Datein                    = date('d/m/Y H:i:s', strtotime($fec));
    $Datefi                    = date('d/m/Y H:i:s', strtotime($dura));
    $inicio = _formatear($Datein);
    // y la formateamos con la funcion _formatear
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}
    $final  = _formatear($Datefi);

echo $fec."<br>".$dura;

$query3="INSERT INTO `agenda`( `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES    ('$tit','$bod','','event-success','$inicio','$final','$fec',                  '$dura')";
                                $result2=mysqli_query($conn,$query3);

        $im = $conn->query("SELECT MAX(id) AS id FROM agenda");
    $row = $im->fetch_row();
    $id = trim($row[0]);

    // para generar el link del evento
    $link = "descripcion_evento.php?id=$id";

    // y actualizamos su link
    $querya = "UPDATE agenda SET url = '$link' WHERE id = $id";

    // Ejecutamos nuestra sentencia sql
    $conn->query($querya);
    echo $link;
    


$query1="Insert into produccion (FK_ID_AGENDA,fechaProduccion,unidades,cantidadInicial,FK_ID_CATPRODUCTO)values                     ('$id',            '$fec',         '$uni',   '$canini'         ,'$cod_pro')";
$result1=mysqli_query($conn,$query1);
if(!$result1){
echo "no se pudo",mysqli_error($conn);

}else{
            $result90=mysqli_query($conn,$query90);
        if(!$result90){
          echo "error",mysqli_error($conn);
        }
$query="UPDATE catproducto SET stock=stock+'$canini' where ID_CATPRODUCTO='$cod_pro'";
$result=mysqli_query($conn,$query);	
echo "registro insertado";
header('location:../backend/lotes_ver.php');
}

?>