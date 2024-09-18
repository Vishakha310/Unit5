<?php 
	require 'dbconnection.php';
	$mongo=DBConnection::stantiate();
	$gridFS=$mongo->database->getgridFS();
	$objects=$gridFS->find();
?>
<body>
	<div id="contentarea">
			<div id="innercontentarea">
			<h1>uploaded images</h1>
				<table class="table-list" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
					<th width="40%">Caption</th>
					<th width="30%">Filename</th>
					<th width="*">Size</th>
					</tr>
					</thead>
					<tbody>
					<?php while($object=$objects->getNext()):?>
					<tr>
						<td>
							<?php echo($object->file['Caption'];?>
							</td>
							<td>
								<a href="image.php?id=<?php echo $object->file['_id'];?>">
								<?php echo $object->file['filename'];?>
								</a>
							</td>
							<td>
								<?php echo ceil($object->file['length']/1024).'KB';?>
							</td>
							</tr>
							<?php endwhile;?>
							</tbody>
							</table>
							</div>
							</div>
							</body>