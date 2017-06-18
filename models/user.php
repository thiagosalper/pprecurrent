<?php

class User {
  private $id;
  private $name;
  private $email;
  private $password;

  public function __construct($id, $name, $email, $pass){
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $pass;
  }

  public function getid(){
    return $this->id;
  }
  public function setid($id){
    $this->id = $id;
  }

  public function getname(){
    return $this->name;
  }
  public function setname($name){
    $this->name = $name;
  }

  public function getemail(){
    return $this->email;
  }
  public function setemail($email){
    $this->email = $email;
  }

  public function getpassword(){
    return $this->setMd5($this->password);
  }
  public function setpassword($password){
    $this->password = $password;
  }

  // business model here
  private function setMd5($val){
    return md5($val);
  }

  public function save($conexao){
    $inserir = mysqli_query($conexao, "
                              INSERT INTO user (name, email, password) VALUES(
                                '".$this->getname()."',
                                '".$this->getemail()."',
                                '".$this->getpassword()."'
                              );
                            ");

    return ($inserir) ? 'Usuario inserido' : "Erro ao inserir".mysqli_error($conexao);
  }
}
