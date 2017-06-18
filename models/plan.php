<?php

class Plan {
  private $id;
  private $title;
  private $price;
  private $period;

  public function Plan($id, $title, $price, $period){
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->period = $period;
  }

  public function getid(){
    return $this->id;
  }
  public function setid($id){
    $this->id = $id;
  }

  public function gettitle(){
    return $this->title;
  }
  public function settitle($title){
    $this->title = $title;
  }

  public function getprice(){
    return $this->price;
  }
  public function setprice($price){
    $this->price = $price;
  }

  public function getperiod(){
    return $this->period;
  }
  public function setperiod($period){
    $this->period = $period;
  }

  // business model
  public function save($conexao){
    $inserir = mysqli_query($conexao, "
                              INSERT INTO plan (title, price, period) VALUES(
                                '".$this->gettitle()."',
                                '".$this->getprice()."',
                                '".$this->getperiod()."'
                              );
                            ");

    return ($inserir) ? 'Plano inserido' : "Erro ao inserir".mysqli_error($conexao);
  }
}
