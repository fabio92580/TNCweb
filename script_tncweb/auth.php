<?php
session_start();
include("./function.php");
$con=connect();
$query="select * from super_user where EMAIL='".$_POST['EMAIL']."' AND PASSWORD='".$_POST['PASSWORD']."'";
$ris=run_query($query,$con);

$er=array();

if(mysql_num_rows($ris)>0)
{
	$r=mysql_fetch_array($ris);
    $er['FULLNAME']=$r['FULLNAME'];
    $er['EMAIL']=$r['EMAIL'];
    $er['ERROR']='none';
	$_SESSION['FULLNAME']=$er['FULLNAME'];
	$_SESSION['EMAIL']=$r['EMAIL'];
	//header('Location: ../pages/index.html');
}
else
	$er['ERROR']='Riprova. Credenziali errate!';
echo json_encode($er);
close_connection($ris,$con);
?>