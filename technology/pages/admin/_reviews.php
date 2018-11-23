<?
include("inc/_admin_menu.php");
?>

<div class="container">
<div class="page-content">

<?PHP



if(isset($_POST['approve'])) {

$approve = intval($_POST['approve']);

$db->Query("UPDATE db_reviews SET status = 1 WHERE id = '$approve'");



}



if(isset($_POST['delete'])) {

$delete = intval($_POST['delete']);

$db->Query("DELETE FROM db_reviews WHERE id = '$delete'");



}



$db->Query("SELECT * FROM db_reviews WHERE status = 0 ORDER BY id DESC");



if($db->NumRows() > 0){



	while($reviews = $db->FetchArray()){

	

	?>


<table class="table table-striped">
<thead>
  <tr>
<th>Дата</th>
<th>Пользователь</th>
<th>Текст</th>
<th>Одобрить</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>
  <td><?=date("d",$reviews["date"]); ?>/<?=date("m",$reviews["date"]); ?>/<?=date("Y",$reviews["date"]); ?></td>
  <td><?=$reviews["name"]; ?></td>
  <td><?=$reviews["text"]; ?></td>

    <td>
	<form method="post" action="" id="approve">

	<input type="hidden" name="approve" value="<?=$reviews['id']; ?>">

	<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('approve')){ submit(); }"><i class="fa fa-check"></i></a>

	</form>
    </td>
	
	<td>
	<form method="post" action="" id="delete">

	<input type="hidden" name="delete" value="<?=$reviews['id']; ?>">

	<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a>

	</form>
    </td>
	
	</tr>
	</tbody>
	</table>
    
	<BR />

	<?PHP

	

	}



}else echo "<center>Заявок на модерацию отзывово нет.</center>";

?>

<BR />

<?php
if(isset($_POST['id'])){
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_reviews WHERE id = $id");
echo "<center><b>Удален отзыв №</b></center>".$id;
}
?>

<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Пользователь</th>
<th>Текст</th>
<th>Удалить</th>
 </tr>
  </thead>
  <tbody>
    <tr>

<?
$con = $db->Query("SELECT * FROM db_reviews");
while($c = $db->FetchArray()) {
$date = date("d.M.y", $c['date']);
?>
	
<form method="POST" id="delete">
<input type="hidden" name="id" value="<?=$c['id']; ?>">
<td><?=$c['id']; ?></td>
<td><?=date("d.m.Y",$news["date"]); ?></td>
<td><?=$c['name']; ?></td>
<td><?=$c['text']; ?></td>
<td><a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a></td>
</tr>
</form>
<? } ?>

</table>

</div>
</div>