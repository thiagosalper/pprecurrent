<?php

require_once "../connection.php";
// tabela de usuarios
$table_user = mysqli_query($CONEXAO, "
                          CREATE TABLE user (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(250) NOT NULL,
                            email VARCHAR(150) NOT NULL UNIQUE,
                            password VARCHAR(100) NOT NULL
                          );
                          ");

if($table_user){
  echo "user ok<br>";
}else{
  echo mysqli_error($CONEXAO);
}

// tabela de planos de assinatura
$table_plan = mysqli_query($CONEXAO, "
                          CREATE TABLE plan (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            title VARCHAR(250) NOT NULL,
                            price FLOAT(10,2) NOT NULL,
                            period INT
                            )
                          ");
if($table_plan){
  echo "plan ok<br>";
}else{
  echo mysqli_error($CONEXAO);
}

// tabela de assinaturas realizadas
$table_signature = mysqli_query($CONEXAO, "
                          CREATE TABLE signature (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            id_user INT NOT NULL,
                            TOKEN VARCHAR(100) NOT NULL,
                            PROFILEID VARCHAR(100) NOT NULL,
                            PROFILESTATUS VARCHAR(100) NOT NULL,
                            TIMESTAMP VARCHAR(100) NOT NULL,
                            CORRELATIONID VARCHAR(100) NOT NULL,
                            ACK VARCHAR(50) NOT NULL,
                            VERSION VARCHAR(50) NOT NULL,
                            BUILD VARCHAR(50) NOT NULL
                          );
                          ");
if($table_signature){
  echo "signature ok<br>";
}else{
  echo mysqli_error($CONEXAO);
}

echo ';)';
