<?php

require_once "config.php";

$CONEXAO = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("erro de conexao");
