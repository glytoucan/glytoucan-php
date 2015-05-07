<h1 class="page-header"><?php echo __('User List') ?> </h1>
<h4><?php echo __('All users in repository.') ?></h1>

<div class="container" style="padding:20px 0">
<?php $hit = count($userList); ?>
<h3><?php echo __('Count') . ':' . $hit; ?></h3>
<table class="table table-striped">
<thead>
<tr>
<th><?php echo __('#')?></th>
<th><?php echo __('Username')?></th>
<th><?php echo __('User ID')?></th>
<th><?php echo __('Name')?></th>
<th><?php echo __('email')?></th>
<th><?php echo __('Validated')?></th>
<th><?php echo __('Last Logged In')?></th>
</thead>
<tbody>
<?php foreach ($userList as $key => $value): ?>

<tr>
<?php if (!preg_match ( "/1/", $value['validated']) ) { ?>

<?php echo $this->Form->create( false, array('type'=>'post','action'=>'validateUser' )); ?>
<?php echo $this->Form->hidden( 'userId', array('value' => $value['userId'] ) ); ?>
<?php } ?>

<td><?php echo ($key+1) ?></td>
<td><?php echo $value['loginId'] ?></td>
<td><?php echo $value['userId'] ?></td>
<td><?php echo $value['userName'] ?></td>
<td><?php echo $value['email'] ?></td>
<td><?php echo $value['validated'] ?></td>
<td><?php echo isset($value['lastLoggedIn']) ? $value['lastLoggedIn'] : '' ?></td>
<td>
<?php if (!preg_match ( "/1/", $value['validated']) ) { ?>

<?php echo $this->Form->submit('validate', array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
<?php } ?>

</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
