<?php

// classes e configs
require_once "connection.php";
require_once 'models/user.php';
require_once 'models/plan.php';
require_once 'models/signature.php';

echo 'Olá<br>';
echo 'Teste de recorrencia com PayPal.<br>';
echo 'Desenvolvedor: thiago_salper@hotmail.com<br><br>';

// inserir um usuario
// $usuario = new User(null, 'Maria', 'maria@hotmail.com', '102030');
// echo $usuario->save($CONEXAO);
// unset($usuario);

// inserir um plano
// $plano = new Plan(null, 'Plano basico', 29.90, '1');
// echo $plano->save($CONEXAO);
// unset($plano);

// salvar uma assinatura
// depois de chamar o SetExpressCheckout.php, o retorno deve ser salvo como abaixo
// $assinatura = new Signature(null, $idusuario, $PROFILEID,$PROFILESTATUS,$TIMESTAMP,$CORRELATIONID,$ACK,$VERSION,$BUILD);
// echo $assinatura->save($CONEXAO);
// unset($assinatura);

// botao para ir ao checkout de assinatura
echo '<a href="paypal/setExpressCheckout.php?idusuario=1" >Gerar nova assinatura</a>';

if($_GET['acao']=='removerassinatura'){
  mysqli_query($CONEXAO, "DELETE FROM signature WHERE id='".$_GET['id']."' LIMIT 1");
}
// lista de assinaturas
$assinaturas = mysqli_query($CONEXAO, "SELECT * FROM signature ORDER BY id DESC");
echo '<table width="100%">';
while($res = mysqli_fetch_array($assinaturas)){
  echo '<tr>';
  echo '<td>'.$res["id"].'</td>';
  echo '<td>'.$res["TOKEN"].'</td>';
  echo '<td>'.$res["PROFILEID"].'</td>';
  echo '<td>'.$res["PROFILESTATUS"].'</td>';
  echo '<td>'.$res["TIMESTAMP"].'</td>';
  echo '<td>'.$res["CORRELATIONID"].'</td>';
  echo '<td>'.$res["ACK"].'</td>';
  echo '<td>'.$res["VERSION"].'</td>';
  echo '<td>'.$res["BUILD"].'</td>';
  echo '<td><a href="paypal/getExpressCheckoutDetails.php?token='.urlencode($res['TOKEN']).'">Detalhes</a></td>';
  echo '<td><a href="?acao=removerassinatura&id='.$res['id'].'">X</a></td>';
  echo '</tr>';
}
echo '</table>';
