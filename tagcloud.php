<?php
require('dbconnection.php');
$mongo=DBConnection::instantiate();
$db=$mongo->database;
$map=new MongoCode("function(){"for(i=0;i<this.tags.length;i++){"emit(this.tags[i],1);"}"}");
$reduce=new MongoCode("function(key,value){".
		                "var count=0;".)