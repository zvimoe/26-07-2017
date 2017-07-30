<?php
require_once "DAL.php";


$cnnct=new Connection();   
if(isset($_POST['insert'])){             
$cnnct->insert($_POST['head'],$_POST['para']);
}
else{
  $cnnct ->getAll();

}


?>