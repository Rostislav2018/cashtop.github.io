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

$qwe = $db->Query("INSERT INTO db_news (date,title,text) VALUES ('$date','$title','$text')");
echo "<center><b>Новость добавлена.</b></center>";

}

if(isset($_POST['id'])) {
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_news WHERE id = $id");
echo "<center><b>Удалена новость №</b></center>".$id;
}
?>

<form method="POST" id="news">
Название:
<br />
<input class="form-control" type="text" name="title">
<br />
Текст:
<br />
<textarea class="form-control" name="text" required rows="5"></textarea>

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('news')){ submit(); }">Добавить</a>
</form>

<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Название</th>
<th>Текст</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$con = $db->Query("SELECT * FROM db_news");
while($c = $db->FetchArray()) {
$date = date("d.M.y", $c['date']);
?>
	
<form method="POST" id="delete">
<input type="hidden" name="id" value="<?=$c['id']; ?>">
<td><?=$c['id']; ?></td>
<td><?=date("d.m.Y",$c["date"]); ?></td>
<td><?=$c['title']; ?></td>
<td><?=$c['text']; ?></td>
<td><a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a></td>
</tr>
</form>
<? } ?>

</table>

</div>
</div>