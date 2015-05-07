<!-- Sign in Modal form -->

<div id="SignIn">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3><?php echo __('Sign In') ?></h3>
	</div>

<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/in', 'id' => 'indexForm_signin' )); ?>
    <div class="modal-body">
            <?php echo $this->Form->input(__('Username'),array('value' => "", 'id' => 'SigninUsername', 'label' => array( 'text' => 'Username') )); ?>
            <?php echo $this->Form->input(__('Password'),array('type' => 'password' , 'value' => "", 'id' => 'SigninPassword', 'label' => array( 'text' => 'Password') )); ?>
    </div>
    <div class="modal-footer">
            <?php echo $this->Html->link(__('email password'), '/Users/emailpwform', array('class' => 'btn')); ?>
            <?php echo $this->Html->link(__('recover username'), '/Users/recoveruserform', array('class' => 'btn')); ?>
            <?php echo $this->Form->button(__('submit'), array('class' => 'btn')); ?>
    </div>
<?php echo $this->Form->end(); ?>

</div>