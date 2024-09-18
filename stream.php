<?php 	
	$id=$_GET['id'];
	require 'dbconnection.php';
	$mongo=DBConnection::stantiate();
	$gridFS=$mongo->database->getgridFS();
	$object=$gridFS->findOne(array('_id'=>new MongoId($id)));
	header('Content-type:'.$object->file['filetype']);
	$chunks=$mongo->database->fs->chunks->find(array('files_id'=>$object->file['_id']))->sort(array('n'=>1));
	header('Content-type:'.$object->file['filetype']);
	foreach($chunks as $chunk)
	{ echo $chunk['data']->bin;}
?>
 