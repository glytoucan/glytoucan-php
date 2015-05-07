<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>
<div class="container" style="padding:20px 0">
<?php echo $doc{'Top'}[0]; ?>
<?php echo $this->Form->create( false, array('type'=>'post','action'=>'editpassword' )); ?>
<?php echo $common_doc['currentPassword'] ?><br>
<?php echo $this->Form->password( 'current', array('value' => "", 'id' => 'current')  ); ?><br>
<?php echo $common_doc['newPassword'] ?><br>
<?php echo $this->Form->password( 'password', array('value' => "", 'id' => 'newpassword')  ); ?><br>
<?php echo $common_doc['confirmPassword'] ?><br>
<?php echo $this->Form->password( 'confirmpassword', array('label' => "Confirm New Password", 'id' => 'confirmnewpassword')  ); ?><br>
<?php echo $this->Form->submit($common_doc['change'], array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>
</script>
