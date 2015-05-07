<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>

<div class="container" style="padding:20px 0">

<table class="table table-striped">
<tbody>
<tr>
<td><?php echo $common_doc['username'] ?></td>
<td><?php echo $user["userName"] ?></td>
</tr>
<tr>
<td><?php echo $common_doc['userId'] ?></td>
<td><?php echo $user["loginId"] ?></td>
</tr>
<tr>
<td><?php echo $common_doc['email'] ?></td>
<td><?php echo $user["email"] ?></td>
</tr>
<tr>
<td><?php echo $common_doc['affiliation'] ?></td>
<td><?php echo $user["affiliation"] ?></td>
</tr>
<!--
<tr>
<td><?php echo __('Active')?></td>
<td><?php echo $user["active"] ?></td>
</tr>
-->
<tr>
<td><?php echo $common_doc['lastLoggedIn'] ?></td>
<td><?php echo $user["lastLoggedIn"] ?></td>
</tr>
<tr>
<td><?php echo $common_doc['dateRegistered']?></td>
<td><?php echo $user["dateRegistered"] ?></td>
</tr>
</tbody>
</table>

<?php echo $this->Html->link($common_doc['changePassword'], '/Users/editpassword', array('class' => 'btn')); ?>

<?php //echo $this->Html->link( __('Delete Account'), '/Users/delete', array('class' => 'btn' )); ?> 



<?php $hit = count($glycanList); ?>
<?php if ($hit != 0) { ?>
<h2 class="page-header"><?php echo __('Contributed Structures:') ?> </h2>

<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th><?php echo __('accessionNumber') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($glycanList as $key => $value): ?>
<tr>
<td><?php echo ($key+1) ?></td>
<td><?php echo $value ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<h3><?php echo __('Total Count') . ':' . $hit; ?></h3>
<?php }?>
</div>
