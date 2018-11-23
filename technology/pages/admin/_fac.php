<?
include("inc/_admin_menu.php");
?>


<div class="container">
<div class="page-content">

<?php
if (isset($_POST['text'])) {
$text = $_POST['text'];
$title = $_POST['title'];
$date = time();

$qwe = $db->Query("INSERT INTO db_fac (date,title,text) VALUES ('$date','$title','$text')");
echo "<center><b>Вопрос добавлен.</b></center>";

}

if(isset($_POST['id'])) {
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_fac WHERE id = $id");
echo "<center><b>Удален вопрос №</b></center>".$id;
}
?>

<form method="POST" id="fac">
Название:
<br />
<input class="form-control" type="text" name="title">
<br />
Текст:
<br />
<textarea class="form-control" name="text" required rows="5"></textarea> 

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('fac')){ submit(); }">Добавить</a>
</form>

<table class="table table-striped">
<thead>
  <tr>
<th>Дата</th>
<th>Название</th>
<th>Текст</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$con = $db->Query("SELECT * FROM db_fac");
while($fac = $db->FetchArray()) {
$date = date("d.M.y", $fac['date']);
?>
	
<form method="POST" id="delete">
<input type="hidden" name="id" value="<?=$fac['id']; ?>">
<td><?=date("d.m.Y",$fac["date"]); ?></td>
<td><?=$fac['title']; ?></td>
<td><?=$fac['text']; ?></td>
<td><a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a></td>
</tr>
</form>
<? } ?>

</table>

</div>
</div>
