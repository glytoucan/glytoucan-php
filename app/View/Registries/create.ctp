<h1 class="page-header"><?php echo __('Motif') . ' ' . __('Management') ?></h1>
<div class="container" style="padding:20px 0">

<table class="table table-striped">
<thead>
<tr><th>
<?php echo __('Name') ?>
</th><th>
<?php echo __('Sequences') ?>
</th><th>
<?php echo __('Reducing') ?>
</th><th>
<?php echo __('Tags') ?>
</th>
</tr>
</thead>
<tbody>
<?php echo $this->Form->create( false, array('type'=>'post','action'=>'create' )); ?>

<tr>
<td>
<?php echo $this->Form->text( 'name', array( 'disabled' => 'disabled' ) ); ?>
</td>
<td>
<?php echo $this->Form->text( 'sequences', array( 'disabled' => 'disabled' ) ); ?>
</td>
<td>
<?php echo $this->Form->checkbox( 'endings', array( 'disabled' => 'disabled' ) ); ?>
</td>
<td>
<?php echo $this->Form->text( 'tags', array( 'disabled' => 'disabled' ) ); ?>
</td>
<td>
<?php echo $this->Form->end(); ?>

</td>
</tr>
</tbody>
</table>
</div>
