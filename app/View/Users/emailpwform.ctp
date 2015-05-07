<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>
<div class="container" style="padding:20px 0">
	<?php echo $doc{'Top'}[0]; ?>
	<?php echo $this->Form->create( false, array('type'=>'post','action'=>'emailpw' )); ?>
	<?php echo $doc{'Top'}[1]; ?>
	<?php echo $this->Form->text( 'name' ); ?>
	<?php echo $this->Form->submit($common_doc['email'], array('class' => 'btn btn-primary')); ?>
	<?php echo $this->Form->end(); ?>
</div>