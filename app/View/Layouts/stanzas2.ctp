<!DOCTYPE html>
<html lang="ja">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo __('Glycan') ?> <?php echo __('Repository') ?></title>
	<?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css');?>
	<?php echo $this->Html->css('GTC'); ?>
	<?php echo $this->Html->css('glycan_list_new'); ?>
</head>

<body><div id="container"><div id="contents">

<?php $user = $this->Session->check ( 'user' ) ?>
<?php $mod = $this->Session->check ( 'mod' ) ?>

<div class="navbar navbar-fixed-top navbar-static-top navbar-inner" role="navigation">
<div class="nav-collapse">
	<ul class="nav navbar-nav">
	<?php echo '<li><a href="/">' . __('Home') . '</a></li>'; ?>

<?php if($user) { ?>
	<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Registration') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">

	<?php echo '<li><a href="/Registries/index"> ' . __('Glycan') . ' ' . __('String') . '</a></li>'; ?>
	<?php echo '<li><a href="/Registries/graphical"> ' . __('Glycan') . ' ' . __('Graphical') . '</a></li>'; ?>
	<?php echo '<li><a href="/Registries/upload"> ' . __('File Upload') . '</a></li>'; ?>

	</ul>
	</li>

<?php } ?>

<?php if($mod) { ?>
	<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Admin') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">

	<?php echo '<li><a href="/Users/listAll"> ' . __('User List') . '</a></li>'; ?>
	<?php echo '<li><a href="/Registries/motif"> ' . __('Motif Management') . '</a></li>'; ?>
	<?php echo '<li><a href="/Structures/glycansList"> ' . __('Glycans List') . '</a></li>'; ?>

	</ul>
	</li>

<?php } ?>

<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Search') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">
	<?php echo '<li><a href="/Structures/structureSearch">' . __('Structure Search') . '</a></li>'; ?>
	<?php echo '<li><a href="/Structures/searchComp">' . __('Composition Search') . '</a></li>'; ?>
	<?php echo '<li><a href="/Motifs/search">' . __('Motif Search') . '</a></li>'; ?>
	<?php echo '<li><a href="/Structures/graphical">' . __('Graphical Search') . '</a></li>'; ?>
	</ul>
</li>

<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('View All') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">
	<?php echo '<li><a href="/Motifs/listAll">' . __('Motif List') . '</a></li>'; ?>
	<!-- Glycan List by Stanza -->
	<?php echo '<li><a href="/Structures2">' . __('Glycan List') . '</a></li>'; ?>
	<!-- Glycan List by exhibit facet -->
	<?php //echo '<li><a href="#" onClick="confirmation()">Glycan List</a></li>'; ?>
	</ul>
</li>

<!-- Accession Number search form -->
<li>
	<div class="nav"><?php echo $this->Session->flash() ?></div>
    <form class="navbar-form navbar-left" method="POST" action="/Structures/Glycans">
        <div class="form-group">
            <input type="text" name="aNum" class="form-control input-medium" placeholder="Accession Number" />
        	<button type="submit" class="btn btn-default">Search</button>
        </div>
    </form>
</li>
	</ul>

	<ul class="nav pull-right">
	<!-- Preference -->
	<?php echo '<li><a href="/Preferences/index">' . __('Preferences') . '</a>'; ?>
	<div class="nav"><?php echo $this->Session->flash() ?></div></li>
	<?php if($user) echo '<li><a href="/Users/profile">' . __('Profile') . '</a></li>'; ?>
	<?php if(!$user) echo '<li><a data-toggle="modal" href="#SignIn">' . __('SignIn') . '</a></li>'; ?>
	<?php if(!$user) echo '<li><a data-toggle="modal" href="#SignUp">' . __('SignUp') . '</a></li>'; ?>
	<?php if($user) echo '<li><a href="/Users/out">' . __('SignOut') . '</a></li>'; ?>
	
	<!-- language 
	<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('language') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">
    <?php echo '<li><a href="/Languages/en">' . __('English') . '</a></li>'; ; ?>
    <?php echo '<li><a href="/Languages/ch1">' . __('中文(简体)') . '</a></li>'; ; ?>
    <?php echo '<li><a href="/Languages/ch2">' . __('中文(繁體)') . '</a></li>'; ; ?>
    </ul>
    </li>-->
	
	</ul>
</div>
</div>

<div class="container"><?php echo $this->fetch('content'); ?></div>


<!-- Sign up Modal form -->
<div class="modal hide fade" id="SignUp">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3><?php echo __('SignIn') ?></h3>
	</div>
	<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/up', 'id' => 'indexForm_signup' )); ?>
    <div class="modal-body">
        <br>
        <?php echo __('The username can contain uppercase/lowercase letters, numbers, and the special chars (-, _) only.  The length should be between 3 to 15 characters.') ?>
        <?php echo $this->Form->input(__('Username'),array('value' => "", 'id' => 'SignupUsername')); ?>
        <br>
        <?php echo __('The password length must be longer than four characters, have both uppercase and lowercase characters, one numeric, and one or more of the following special characters (!@#$%^&amp;*).') ?>
        <?php echo $this->Form->input(__('Password'),array('type' => 'password' , 'value' => "", 'id' => 'SignupPassword', 'label' => array( 'text' => 'Password') )); ?>
        <?php echo $this->Form->input(__('Confirm Password'),array('type' => 'password' , 'value' => "", 'id' => 'Confirm_Password', 'label' => array( 'text' => 'Confirm Password') )); ?>
        <?php echo $this->Form->input(__('Full Name'),array('value' => "", 'id' => 'Full_Name', 'label' => array( 'text' => 'Full Name') )); ?>
        <?php echo $this->Form->input(__('Email'),array('value' => "", 'id' => 'SignupEmail', 'label' => array( 'text' => 'Email') )); ?>
        <?php echo $this->Form->input(__('Affiliation'),array('value' => "", 'id' => 'Affiliation', 'label' => array( 'text' => 'Affiliation') )); ?>
    </div>
    <div class="modal-footer">
        <?php echo $this->Form->submit(__('submit'), array('class' => 'btn')); ?><br>
        <?php echo __('Please note that even after registration, you will not be able to access until a moderator has authorized the login.') ?>
    </div>
<?php echo $this->Form->end(); ?>
</div>

<!-- Sign in Modal form -->

<div class="modal hide fade" id="SignIn">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3><?php echo __('SignIn') ?></h3>
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
<?php echo $this->Html->script('//code.jquery.com/jquery-1.10.2.min.js'); ?>
<?php echo $this->Html->script('//code.jquery.com/ui/1.11.1/jquery-ui.js'); ?>

<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('confirmation'); ?>
<?php echo $this->Html->script('glycan_list_new'); ?>
<script>
	$('.dropdownj-toggle').click(function() {
		$('.dropdown-toggle').dropdown('toggle');
	});
</script>
    </div>
    <div id="footer">
    <label>&nbsp;&nbsp;&nbsp;Copyright &copy; 2014 GlyTouCan</label>         

<!-- google analytics tracking javascript -->
     
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54566807-1', 'auto');
  ga('send', 'pageview');
</script>
     
     
    </div>
  </div>
</body>
</html>
