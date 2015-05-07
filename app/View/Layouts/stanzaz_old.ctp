<!DOCTYPE html>
<html lang="ja">

<head>
	<?php echo $this->Html->charset(); ?>
	<title>GlyTouCan</title>
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('GTC'); ?>
	<!--<script src="http://glytoucan.org/scripted/exhibit-api.js" type="text/javascript"></script>-->
</head>

<body>


<div class="navbar navbar-fixed-top navbar-static-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav">
				<li><a href="http://www.glytoucan.org/">GlyTouCan</a></li>
                <li class="dropdown">
          			<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
						Contents
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
<?php if($this->Session->check('user')) echo "<li><a href=\"http://www.glytoucan.org/GTC_viewer/registries/\"> glycan registry </a></li>"; ?>
                   		<li><a href="http://www.glytoucan.org/GTC_viewer/Structures/searchExact"> glycan search </a></li>
                   		<li><a href="http://www.glytoucan.org/GTC_viewer/Structures/searchBySubstructure"> substructure search </a></li>
                   		<li><a href="http://www.glytoucan.org/GTC_viewer/Structures/glycansList"> glycans list </a></li>
                   		<!--li><a href="http://www.glytoucan.org/GTC_viewer/Structures/compositonSearch"> compositon search </a></li-->
                   		<li><a href="http://www.glytoucan.org/GTC_viewer/Motifs/motifsList"> motifs list </a></li>
                   		<li><a href="http://www.glytoucan.org/GTC_viewer/Motifs/motifsSearch"> motif search </a></li>
						<!--li><a data-toggle="modal" href="#searchBySubstructure"> substructure search </a></li-->
                 	</ul>
            	</li>
<?php if(!$this->Session->check('user')) echo "<li><a  data-toggle=\"modal\" href=\"#SignIn\"> SignIn </a></li>"; ?>
<?php if(!$this->Session->check('user')) echo "<li><a  data-toggle=\"modal\" href=\"#SignUp\"> SignUp </a></li>"; ?>
<?php if($this->Session->check('user')) echo "<li><a href=\"http://www.glytoucan.org/GTC_viewer/Users/out\"> SignOut </a></li>"; ?>
          	</ul>
     	</div>
  	</div>
</div>


<div class="container">
	<?php echo $this->fetch('content'); ?>
</div>

<div class="modal hide fade" id="Mess">
    <div class="modal-header">
	    <button class="close" data-dismiss="modal">x</button>
	</div>
	<div class="modal-body">
		<?php echo $this->Session->flash(); ?>
	</div>
</div>


<div class="modal hide fade" id="SignUp">
    <div class="modal-header">
	    <button class="close" data-dismiss="modal">x</button>
	    <h3>SignIn</h3>
	</div>
	<div class="modal-body">
	    <?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/up' )); ?>
	    <?php echo $this->Form->input('Username',array('value' => "")); ?>
	    <?php echo $this->Form->input('Password',array('type' => 'password' , 'value' => "")); ?>
	    <?php echo $this->Form->input('Full Name',array('value' => "")); ?>
	    <?php echo $this->Form->input('Email',array('value' => "")); ?>
	    <?php echo $this->Form->input('Affiliation',array('value' => "")); ?>
	</div>
	<div class="modal-footer">
		<?php echo $this->Form->submit('submit', array('class' => 'btn')); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>


<div class="modal hide fade" id="SignIn">
	<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
		<h3>SignIn</h3>
  	</div>
	<div class="modal-body">
		<?php echo $this->Form->create( false, array('type'=>'post' , 'url'=>'/Users/in' )); ?>
        <?php echo $this->Form->input('user',array('value' => "")); ?>
        <?php echo $this->Form->input('pass',array('type' => 'password' , 'value' => "")); ?>
	</div>
	<div class="modal-footer">
        <?php echo $this->Form->submit('submit', array('class' => 'btn')); ?>
        <?php echo $this->Form->end(); ?>
	</div>
</div>


<!-- search by substructure modal -->
<!--
<div class="modal hide fade" id="searchBySubstructure">
  <div class="modal-header">
  	<button class="close" data-dismiss="modal">x</button>
  	<h3>Search</h3>
  </div>
  <div class="modal-body">
		<form method="post" action="substructure" name="form1" >
		  <fieldset>
			<div class="control-group">
			<label class="control-label" for="text1">Input strucuture</label>	
			<div class="controls">
			  <textarea name="text1" id="text1" placeholder="Glycan structure" style="width: 300px;"></textarea>
			  <p class="help-block">sub explain</p>
			<label class="control-label" for="select1">Encoding</label>	
			  <select name="select1" >
				<option value="glycoCT_condensed">GlycoCT</option>
				<option value="glyde">GlydeII</option>
				<option value="glycoct_xml">GlycoCT XML</option>
				<option value="carbbank">Carbbank encoding</option>
				<option value="cfg">CFG</option>
				<option value="bcsdb">BCSDB sequence encoding</option>
				<option value="linucs">LINUCS encoding</option>
				<option value="kcf">KCF encoding</option>
				<option value="ogbi">OGBI motif encoding</option>
				<option value="iupac_condenced">IUPAC Condensed</option>
				<option value="iupac_short_v1">IUPAC Short version 1</option>
				<option value="iupac_short_v2">IUPAC Short version 2</option>
			  </select>
			</div>
			</div>
			<div class="form-actions">
			<button type="submit" class="btn btn-primary">Search</button>
			<button type="reset" class="btn">Cancel</button>
   			</div>
		  </fieldset>
		</form>
  </div>
</div>
-->


<?php echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<script>

	$('.dropdownj-toggle').click(function() {
		$('.dropdown-toggle').dropdown('toggle');
	});

</script>
</body>
</html>
