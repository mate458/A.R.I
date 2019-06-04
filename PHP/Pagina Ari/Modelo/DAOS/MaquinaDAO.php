<!-- Clase para mapear y acceder a los datos de la tabla Maquina -->
<?php

//Incluimos nuestra conexión a la BD
include_once("../Modelo/Conexion/Connection.php");

class MaquinaDAO
{

    //Se mapean los atributos de la tabla junto con unas variables para la conexión,
    //los mensajes que se devolverán y el tipo de alerta(succes o danger)
    private $idMaq;
    //private $idEmp;
    private $pesoOrg;
    private $pesoPlast;
    private $pesoPapel;
    private $ubicacion;
    private $opcion;
    private $conexion;
    public $mensaje;
    public $alerta;

    
//Método para ejecutar el CRUD dependiendo de la opción que se mande
    public function ejecutarCRUD()
    {

        
        //Se obtiene la conexión con la BD
        $conexion = new Connection();

        $mysqliC = $conexion->getConnection();

        //Se prepara la sentencia parametrizada para ejecutar el CRUD
        $pSqlQuery = $mysqliC->prepare("call bd_ari.CRUDMaquina(?,?,?,?,?,?);");

        //Se mandan los paramátros a la sentencia parametrizada
        $pSqlQuery->bind_param("idddss",$this->idMaq,$this->pesoOrg,$this->pesoPlast,$this->pesoPapel,$this->ubicacion,$this->opcion);

        //Se ejecuta la sentencia parametrizada
        $pSqlQuery->execute();


        //Se obtienen los resultados de la sentencia
        $res = $pSqlQuery->get_result();
        //Condiciones para mostrar los mensajes y alertas dependiendo de cual opción se ejecutó 
        //Si se trae más de un resultado se mostrará un mensaje y alerta de succes
        //de lo contrario se traera el mensaje de error de la BD y se mostrará como alerta danger
        $opcionVal = $this->opcion;

        switch($opcionVal){
            case "guardar":
                if($res->field_count > 1){
                 $this->mensaje = "La máquina ha sido guardada correctamente";
                 $this->alerta = "success";
                }else{            
                 $this->mensaje = $res->fetch_row()[0];
                 $this->alerta = "danger";
                }
                break;
            case "actualizar":
                if($res->field_count > 1){
                    $this->mensaje = "La máquina ha sido actualizada correctamente";
                    $this->alerta = "success";
                }else{
            
                    $this->mensaje = $res->fetch_row()[0];
                    $this->alerta = "danger";
                }
               break;
            case "eliminar":
                if($res->field_count > 1){
                    $this->mensaje = "La máquina ha sido eliminada correctamente";
                    $this->alerta = "success";
                }else{
                    $this->mensaje = "La máquina no se encuentra registrada o no ha podido ser eliminada";
                    $this->alerta = "danger";
                }
                break;
            default:
               $this->mensaje = "Error al intentar ejecutar los procedimientos";
               $this->alerta = "danger";
        }

       
        //Se cierra la sentencia parametrizada
        $pSqlQuery->close();
        //Se cierra la conexión con la BD
        $conexion->closeConnection();
    }
    


    /* #region Setters y Getters*/
    public function setIdMaq($id)
    {
        $this->idMaq = $id;
    }

    public function getIdMaq()
    {
        return $this->idMaq;
    }

    public function setPesoOrg($peso)
    {
        $this->pesoOrg = $peso;
    }

    public function getPesoOrg()
    {
        return $this->pesoOrg;
    }

    public function setPesoPlast($peso)
    {
        $this->pesoPlast = $peso;
    }

    public function getPesoPlast()
    {
        return $this->pesoPlast;
    }

    public function setPesoPapel($peso)
    {
        $this->pesoPapel = $peso;
    }

    public function getPesoPapel()
    {
        return $this->pesoPapel;
    }

    public function setUbicacion($ubi)
    {
        $this->ubicacion = $ubi;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;
    }

    public function getOpcion()
    {
        return $this->opcion;
    } 
    /* #endregion */
}
