<?php /*archivo q tiene funcionalidad de php*/ 
include_once 'db.php'; /*include: funcion que permite hacer la llamada de un archivo
                        e incluirlo
                        once: lo va a cargar una vez(si mas adelante cargo
                        ese mismo archivo no detectara las nuevas variables sino
                        que permanecera el anterior)*/
                        /*RESUMEN: CREA LA CONEXION CON LA BD*/
if(isset($_POST['save']))/*codigo para guardar*/ 
                        /*isset: si se hizo click en el boton "save" debe registrar*/
{
    $fn=$MySQLiconn->real_escape_string($_POST['fn']);/*asignar el valor q recibe por POST a una variable fn*/
    $ln=$MySQLiconn->real_escape_string($_POST['ln']);/* " a una variable ln*/
            /*real_escape_string:(no obligatorio) valida que no halla una data basura sino solo texto*/
    $SQL=$MySQLiconn->query("Insert INTO data(fn,ln)
    VALUES('$fn','$ln')");
    /*$SQL: consulta sql*/
    /*query: realizar consulta a la conexion mysql*/
    /*data: tabla q creamos en la db semana 5 creada en phpMyadmin*/
    /*fn, fl: campos de la tabla*/
    /*$fn, $ln: valores asignados desde la linea 11 y 12*/
    if(!$SQL)/*si no se a ejecutado...*/
    {
        echo $MySQLiconn->error;/*escribir en pantalla el error q ocurrio con el objeto*/
    }
}

if(isset($_GET['del']))/*cod para eliminar*/
                        /*isset: si se hizo click en el enlace de 'del' se eliminara la fila*/
{
    $SQL=$MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
    /*$_GET['del']: lo q esta viniendo por url de la variable "del"
    (por url estamos enviando el id del registro sobre el cual hicimos click para eliminar) */
    header("Location: index.php"); /*indicar la ubicacion con la q va a finalizar la linea 30 */
    /*header: funcion q permite enviar cosas por header*/
    /*cuando estamos eliminando una data 8:41 MIN REPETIR*/
}

if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();

}
if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."',
     ln='".$_POST['ln']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
?>