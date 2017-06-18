<?php

class Signature {
  private $id;
  private $idusuario;
  private $TOKEN;
  private $PROFILEID;
  private $PROFILESTATUS;
  private $TIMESTAMP;
  private $CORRELATIONID;
  private $ACK;
  private $VERSION;
  private $BUILD;

  public function __construct($id, $idusuario, $TOKEN, $PROFILEID, $PROFILESTATUS, $TIMESTAMP, $CORRELATIONID, $ACK, $VERSION, $BUILD){
    $this->id = $id;
    $this->idusuario = $idusuario;
    $this->PROFILEID = $PROFILEID;
    $this->TOKEN = $TOKEN;
    $this->PROFILESTATUS = $PROFILESTATUS;
    $this->TIMESTAMP = $TIMESTAMP;
    $this->CORRELATIONID = $CORRELATIONID;
    $this->ACK = $ACK;
    $this->VERSION = $VERSION;
    $this->BUILD = $BUILD;
  }

  public function getid(){
    return $this->id;
  }
  public function setid($id){
    $this->id = $id;
  }

  public function getidusuario(){
    return $this->idusuario;
  }
  public function setidusuario($idusuario){
    $this->idusuario = $idusuario;
  }

  public function getPROFILEID(){
    return $this->PROFILEID;
  }
  public function setPROFILEID($PROFILEID){
    $this->PROFILEID = $PROFILEID;
  }

  public function getTOKEN(){
    return $this->TOKEN;
  }
  public function setTOKEN($TOKEN){
    $this->TOKEN = $TOKEN;
  }

  public function getPROFILESTATUS(){
    return $this->PROFILESTATUS;
  }
  public function setPROFILESTATUS($PROFILESTATUS){
    $this->PROFILESTATUS = $PROFILESTATUS;
  }

  public function getTIMESTAMP(){
    return $this->TIMESTAMP;
  }
  public function setTIMESTAMP($TIMESTAMP){
    $this->TIMESTAMP = $TIMESTAMP;
  }

  public function getCORRELATIONID(){
    return $this->CORRELATIONID;
  }
  public function setCORRELATIONID($CORRELATIONID){
    $this->CORRELATIONID = $CORRELATIONID;
  }

  public function getACK(){
    return $this->ACK;
  }
  public function setACK($ACK){
    $this->ACK = $ACK;
  }

  public function getVERSION(){
    return $this->VERSION;
  }
  public function setVERSION($VERSION){
    $this->VERSION = $VERSION;
  }

  public function getBUILD(){
    return $this->BUILD;
  }
  public function setBUILD($BUILD){
    $this->BUILD = $BUILD;
  }

  public function save($conexao){
    $inserir = mysqli_query($conexao, "
                              INSERT INTO signature (TOKEN, PROFILEID, PROFILESTATUS, TIMESTAMP, CORRELATIONID, ACK, VERSION, BUILD)
                              VALUES(
                                '".$this->TOKEN."',
                                '".$this->PROFILEID."',
                                '".$this->PROFILESTATUS."',
                                '".$this->TIMESTAMP."',
                                '".$this->CORRELATIONID."',
                                '".$this->ACK."',
                                '".$this->VERSION."',
                                '".$this->BUILD."'
                              );
                            ");

    return ($inserir) ? 'Assinatura inserida' : "Erro ao inserir".mysqli_error($conexao);
  }

  
}
