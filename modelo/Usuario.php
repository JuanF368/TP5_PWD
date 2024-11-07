<?php

class Usuario{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    private $mensajeOperacion;

    public function __construct(){
        $this->idUsuario="";
        $this->usNombre="";
        $this->usPass="";
        $this->usMail="";
        $this->usDeshabilitado="";
        $this->mensajeOperacion="";
    }

    public function setear($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado){
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }

    //metodos de acceso

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($param){
        $this->idUsuario=$param;
    }

    public function getUsNombre(){
        return $this->usNombre;
    }
    public function setUsNombre($param){
        $this->usNombre=$param;
    }

    public function getUsPass(){
        return $this->usPass;
    }
    public function setUsPass($param){
        $this->usPass=$param;
    }

    public function getUsMail(){
        return $this->usMail;
    }
    public function setUsMail($param){
        $this->usMail=$param;
    }

    public function getUsDeshabilitado(){
        return $this->usDeshabilitado;
    }
    public function setUsDeshabilitado($param){
        $this->usDeshabilitado=$param;
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
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdUsuario();
        if($base->Iniciar()){
            $res=$base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    $resp=true;//se setea la resp como true para demostrar que la carga fue exitosa
                }
            }
        }else{
            $this->setMensajeOperacion("usuario->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp=false;
        $base = new BaseDatosPDO();
        $sql="INSERT INTO usuario (usnombre, uspass, usmail, usdeshabilitado)
                VALUES ('".$this->getUsNombre()."', '".$this->getUsPass()."', '".$this->getUsMail()."', '".$this->getUsDeshabilitado()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuario->insertar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuario->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="UPDATE usuario SET
            idusuario='".$this->getIdUsuario()."', usnombre='".$this->getUsNombre()."', uspass='".$this->getUsPass()."', usmail='".$this->getUsMail()."', usdeshabilitado='".$this->getUsDeshabilitado()."' WHERE idusuario='".$this->getIdUsuario()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuario->modificar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuario->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp=false;
        $base=new BaseDatosPDO();
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getIdUsuario();
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMensajeOperacion("usuario->eliminar: ".$base->getError());
            }
        }else{
            $this->setMensajeOperacion("usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro=""){
        $arreglo=array();
        $base=new BaseDatosPDO();
        $sql="SELECT * FROM usuario ";
        if($parametro!=""){
            $sql.='WHERE '.$parametro;
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Usuario();
                    $obj->setear( $row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        }else{
            $this->setMensajeOperacion("usuario->listar: ".$base->getError());
        }
        return $arreglo;
    }
}