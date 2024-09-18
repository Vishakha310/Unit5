<?php
 $id=$_GET['id'];
 require 'dbconnection.php';
	$mongo=DBConnection::stantiate();
	$gridFS=$mongo->database->getgridFS();
	$object=$gridFS->findOne(array('_id'=>new MongoId($id)));
	header('Content-type:'.$object->file['filetype']);
	echo $object->getBytes();
?>
 