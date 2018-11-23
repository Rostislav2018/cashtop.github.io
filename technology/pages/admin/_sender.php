<?
include("inc/_admin_menu.php");
?>

<div class="container">
<div class="page-content">

<?PHP

if(isset($_POST["title"])){

$title = strval($_POST["title"]);
$mess = $func->TextClean($_POST["mess"]);

	if(strlen($title) > 3){
	
		if(strlen($mess) > 10){
		
		$db->Query("INSERT INTO db_sender (name, mess, date_add) VALUES ('$title','$mess','".time()."')");
		
		echo "<center><b>Рассылка поставлена в очередь на выполнение.</b></center><BR />";
		
		}else echo "<center><b>Сообщение должно быть больше 10 символов.</b></center><BR />";
	
	}else echo "<center><b>Заголовок должен быть больше 3 символов.</b></center><BR />";

}


?>


<form action="" method="post" id="sender">
Заголовок сообщения:
<br/>
<input class="form-control" type="text" name="title"/>
<br/>
Текст сообщения:
<br/>
<textarea class="form-control" name="text" required rows="5"></textarea>

<br/>

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('sender')){ submit(); }">Добавить</a>
</form>

<BR />
<BR />

<?PHP
if(isset($_POST["del"])){

	$db->Query("DELETE FROM db_sender WHERE id = '".intval($_POST["del"])."'");	
	echo "<center><b>Рассылка удалена.</b></center><BR />";

}

$db->Query("SELECT * FROM db_sender ORDER BY id DESC");

if($db->NumRows() > 0){



?>

<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Название</th>
<th>Отправлено</th>
<th>Статус</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?PHP

while($data = $db->FetchArray()){

?>
	<tr>
    <td><?=$data["id"]; ?></td>
    <td><?=$data["name"]; ?></td>
    <td><?=$data["sended"]; ?> шт.</td>
	<td><?=$data["status"] == 0 ? "Отправка" : "Завершено"; ?></td>
	<td>
		<form action="" method="post" id="delete">
			<input type="hidden" name="del" value="<?=$data["id"]; ?>" />
			<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a>
		</form>
	</td>
  	</tr>
<?PHP

}

?>
</tr>
</tbody>
</table>

<BR />

<?PHP

}else echo "<center><b>Рассылок нет.</b></center><BR />";

?>

</div>
</div>