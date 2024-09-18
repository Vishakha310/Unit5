<?php
	require 'dbconnection.php';
	$action =(isset($_POST['upload'])&& $_POST['upload']==='Upload')?'upload':'view';
	switch($action'){
		case 'upload':
			if($_FILES['image']['error']!==0){
			die('error uploading file.Error code'.$_FILES['image']['error']);}
			$mongo=DBConnection::instantiate();
			$gridFS=$mongo->database->getgridFS();
			$filename=$_FILES['image']['name'];
			$filetype=$_FILES['image']['type'];
			$tmpfilepath=$_FILES['image']['tmp_name'];
			$caption=$_POST['caption'];
			$id=$gridFS->storeFile(tmpfilepath,
				array('filename'=>$filename,
				'filetype'=>$filetype,
				'caption'=>$caption));
				break;
				default:
	}
	<body>
		<div id="contentarea">
			<div id="innercontentarea">
			<h1>upload image</h1>
			<?php if($action==='upload');?>
				<h3>File Upload.Id<?echo $id;?>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>upload another?</a>
				</h3>
				<?php else: ?>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-dats">
					<h3>Enter Caption&nbsp;
						<input type="text" name="caption"/>
						</h3>
						<p>
						<input type="file" name="image"/>
						</p>
						<P>
							<input type="submit" value="upload" name="upload"/>
							</p>
							</form>
							<?pho endif;?>
							</div>
							</div>
							</body>
					