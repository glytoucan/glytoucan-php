<!DOCTYPE html>
<html lang="ja">
<!-- $domain = 'http://glytoucan.org' -->
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo __('Glycan') ?> <?php echo __('Repository') ?></title>
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('GTC'); ?>
    <link href="/Facets/glycansJson.json" type="application/json" rel="exhibit/data" />
  
    <script src="/js/exhibit/src/webapp/api/exhibit-api.js" type="text/javascript"></script>
    <!--  <script src="http://api.simile-widgets.org/exhibit/2.2.0/exhibit-api.js" type="text/javascript"></script> -->

    <style>
      body {
        /*margin:1in;*/
        margin-top:72px;
        margin-bottom: 72px;
        padding:0;
      }
      table.glycanlist {
        border:     1px solid #ddd;
        padding:    0.5em;
      }
      table.glycantable {
      	margin: 72px;
      	padding: 0;	
      }
    </style>
</head>

<body>

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

	<?php echo '<li><a href="/registries/text"> ' . __('Glycan') . ' ' . __('String') . '</a></li>'; ?>
	<?php //echo '<li><a href="/registries/graphical"> ' . __('Glycan') . ' ' . __('Graphical') . '</a></li>'; ?>
	<?php echo '<li><a href="/registries/upload"> ' . __('File Upload') . '</a></li>'; ?>

	</ul>
	</li>

<?php } ?>

<?php if($mod) { ?>
	<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Admin') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">

	<?php echo '<li><a href="/Users/listAll"> ' . __('User List') . '</a></li>'; ?>
	<?php echo '<li><a href="/registries/motif"> ' . __('Motif Management') . '</a></li>'; ?>
	<?php echo '<li><a href="/Structures/glycansList"> ' . __('Glycans List') . '</a></li>'; ?>

	</ul>
	</li>

<?php } ?>

<li class="dropdown">
	<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Search') ?><b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu">
	<?php echo '<li><a href="/Structures/structureSearch">' . __('Structure Search') . '</a></li>'; ?>
	<?php echo '<li><a href="/Structures/searchComp">' . __('Glycan Composition Search') . '</a></li>'; ?>
	<?php echo '<li><a href="/Motifs/listAll">' . __('Motif List') . '</a></li>'; ?>
	<?php echo '<li><a href="/Motifs/search">' . __('Motif Search') . '</a></li>'; ?>
	</ul>
</li>

<!-- Glycan List by exhibit facet -->
<?php echo '<li><a href="/Facets/glycansFacet">Glycan List</a></li>'; ?>

<!-- Accession Number search form -->
<li>
	<div class="nav"><?php echo $this->Session->flash() ?></div>
    <form class="navbar-form navbar-left" method="POST" action="/Structures/Glycans">
        <div class="form-group">
            <input type="text" name="gid" class="form-control input-medium" placeholder="Accession Number" />
        	<button type="submit" class="btn btn-default">Search</button>
        </div>
    </form>
</li>

	</ul>
	<ul class="nav pull-right">
	<!-- Preference -->
	<?php echo '<li><a href="/Preferences/index">' . __('Preference') . '</a></li>'; ?>
	<div class="nav"><?php echo $this->Session->flash() ?></div>
	<?php if($user) echo '<li><a href="/Users/profile">' . __('Profile') . '</a></li>'; ?>
	<?php if(!$user) echo '<li><a data-toggle="modal" href="#SignIn">' . __('SignIn') . '</a></li>'; ?>
	<?php if(!$user) echo '<li><a data-toggle="modal" href="#SignUp">' . __('SignUp') . '</a></li>'; ?>
	<?php if($user) echo '<li><a href="/Users/out">' . __('SignOut') . '</a></li>'; ?>
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
	<div class="modal-body">
		<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/up' )); ?>
		<a href="#" data-toggle="tooltip" title="<?php echo __('The username can contain uppercase/lowercase letters, numbers, and the special chars (-, _) only.  The length should be between 3 to 15 characters.') ?>">
			<?php echo $this->Form->input(__('Username'),array('value' => "")); ?>
		</a>
		<a href="#" data-toggle="tooltip" title="<?php echo __('The password length must be longer than four characters, have both uppercase and lowercase characters, one numeric, and one or more special characters.') ?>">
			<?php echo $this->Form->input(__('Password'),array('type' => 'password' , 'value' => "", 'label' => array( 'text' => 'Password') )); ?>
		</a>
		<?php echo $this->Form->input(__('Confirm Password'),array('type' => 'password' , 'value' => "")); ?>
		<?php echo $this->Form->input(__('Full Name'),array('value' => "")); ?>
		<?php echo $this->Form->input(__('Email'),array('value' => "")); ?>
		<?php echo $this->Form->input(__('Affiliation'),array('value' => "")); ?>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->submit(__('submit'), array('class' => 'btn')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<!-- Sign in Modal form -->
<div class="modal hide fade" id="SignIn">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3><?php echo __('SignIn') ?></h3>
	</div>
	<div class="modal-body">
		<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/in' )); ?>
		<?php echo $this->Form->input('Username',array('value' => "", 'id' => 'SigninUsername')); ?>
		<?php echo $this->Form->input('Password',array('type' => 'password' , 'value' => "")); ?>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->button(__('email password'), array('class' => 'btn')); ?>
		<?php echo $this->Form->button(__('recover username'), array('class' => 'btn')); ?>
		<?php echo $this->Form->submit(__('submit'), array('class' => 'btn')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
<?php echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<script>
	$('.dropdownj-toggle').click(function() {
		$('.dropdown-toggle').dropdown('toggle');
	});
</script>
</body>
</html>
