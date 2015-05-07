<!DOCTYPE html>
<html lang="ja">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>GlyTouCan</title>
	<?php echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js'); ?>
	<?php echo $this->Html->script('bootstrap.min.js'); ?>
	<?php echo $this->Html->css('bootstrap.min.css'); ?>
	<?php echo $this->Html->css('GTC'); ?>
</head>
<body>
<h1 class="page-header">Check form</h1>
<div class="block response_body undefined">
<img src="http://glycomics.ccrc.uga.edu:80/glyspace/glycans/G91321DI/image?format=png¬ation=cfg&style=compact">
</div>

<form method="post" action="check" name="form1" class="form-horizontl">
  <fieldset>
    <div class="control-group">
	<label class="control-label" for="text1">Input strucuture</label>	
	<div class="controls">
	  <textarea name="text1" id="text1" rows="15" cols="120" placeholder="Glycan structure"></textarea>
	</div>
    </div>
    <div class="form-actions">
	<button type="submit" class="btn btn-primary">Search</button>
	<button type="reset" class="btn">Cancel</button>
    </div>
  </fieldset>
</form>

<!-- <h5><?php echo var_dump($structure->accessionNumber); ?></h5> -->
</body>
</html>

