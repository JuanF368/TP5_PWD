<?php

class Rol{
    private $idRol;
    private $rolDescripcion;
    private $mensajeOperacion;

    public function __construct(){
        $this->idRol="";
        $this->rolDescripcion="";
        $this->mensajeOperacion="";
    }

    public function setear($idRol, $rolDescripcion){
        $this->setIdRol($idRol);
        $this->setRolDescripcion($rolDescripcion);
    }

    //metodos de acceso

    public function getIdRol(){
        return $this->idRol;
    }
    public function setIdRol($param){
        $this->idRol=$param;
    }

    public function getRolDescripcion(){
        return $this->rolDescripcion;
    }
    public function setRolDescripcion($param){
        $this->rolDescripcion=$param;
    }

    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($param){
        $this->mensajeOperacion=$param;
    }

    public function cargar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM rol WHERE idrol = ".$this->getIdRol();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idrol'], $row['roldescripcion']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setMensajeOperacion("rol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO rol (idrol, roldescripcion)
                VALUES ('".$this->getIdRol()."', '".$this->getRolDescripcion()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("rol->insertar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("rol->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE rol SET
            idrol='".$this->getIdRol()."', roldescripcion='".$this->getRolDescripcion()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("rol->modificar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("rol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM rol WHERE idrol=".$this->getIdRol();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("rol->eliminar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("rol->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM rol ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Rol();
                    $obj->setear( $row['idrol'], $row['roldescripcion']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setMensajeOperacion("rol->listar: ".$base->getError());
        }
        return $arreglo;
    }
}