<!-- Sign up Modal form -->
<div id="SignUp">
<h1 class="page-header">
	<?php echo $doc{'Title'}[0] ?>
</h1>

	<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/up', 'id' => 'indexForm_signup' )); ?>
        <?php echo $doc{'Top'}[0] ?>
        <?php echo $this->Form->input($common_doc['username'], array('value' => "", 'id' => 'SignupUsername')); ?>
        <?php echo $doc{'Top'}[1] ?>
        <?php echo $this->Form->input($common_doc['password'], array('type' => 'password' , 'value' => "", 'id' => 'SignupPassword', 'label' => array( 'text' => $common_doc['password']) )); ?>
        <?php echo $this->Form->input($common_doc['confirmPassword'],array('type' => 'password' , 'value' => "", 'id' => 'Confirm_Password', 'label' => array( 'text' => $common_doc['confirmPassword']) )); ?>
        <?php echo $this->Form->input($common_doc['fullName'], array('value' => "", 'id' => 'Full_Name', 'label' => array( 'text' => $common_doc['fullName']) )); ?>
        <?php echo $this->Form->input($common_doc['email'], array('value' => "", 'id' => 'SignupEmail', 'label' => array( 'text' => $common_doc['email']) )); ?>
        <?php echo $this->Form->input($common_doc['affiliation'], array('value' => "", 'id' => 'Affiliation', 'label' => array( 'text' => $common_doc['affiliation']) )); ?>
        <?php echo $this->Form->submit($common_doc['submit'], array('class' => 'btn')); ?><br>
<h3> 
     <?php echo $doc{'Bottom'}[0] ?>
</h3>
<?php echo $this->Form->end(); ?>
</div>
