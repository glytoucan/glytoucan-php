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
<h1 class="page-header">Substructure Search</h1>

<form method="post" action="substructure" name="form1" class="form-horizontl">
  <fieldset>
    <div class="control-group">
	<label class="control-label" for="text1">Input strucuture</label>	
	<div class="controls">
	  <textarea name="text1" id="text1" rows="15" cols="120" placeholder="Glycan structure"></textarea>
	  <p class="help-block">sub explain</p>
	<label class="control-label" for="select1">Encoding</label>	
	  <select name="select1" >
	    <option value="glycoCT_condensed">GlycoCT</option>
	    <option value="glyde">GlydeII</option>
	    <option value="glycoct_xml">GlycoCT XML</option>
	    <option value="carbbank">Carbbank encoding</option>
	    <option value="cfg">GlycoMindes encoding</option>
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

<!-- <h5><?php echo var_dump($structure->accessionNumber); ?></h5> -->
</body>
</html>

