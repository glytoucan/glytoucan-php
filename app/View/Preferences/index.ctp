<h1 class="page-header"><?php echo $doc{'Title'}[0] ?></h1>
<!-- selected message 
<?php  $image = $this->Session->check('image.notation');
	  if ($image) {
	  	echo "Image notation : ", $this->Session->read('image.nLabel');
	  }else{
	  	echo $this->Session->read('image.message');
	  }
?>
-->
<fieldset>
	<legend><?php echo $doc{'TopTitle'}[0] ?></legend>
	<input type="button" onclick="location.href='./image/cfg'"value="CFG">
	<input type="button" onclick="location.href='./image/cfgbw'"value="CFG greyscale">
	<input type="button" onclick="location.href='./image/uoxf'"value="Oxford">
	<input type="button" onclick="location.href='./image/uoxf-color'"value="Oxford colorscale">
	<input type="button" onclick="location.href='./image/cfg-uoxf'"value="CFG and Oxford">
	<input type="button" onclick="location.href='./image/iupac'"value="IUPAC">
</fieldset>
<img src="http://${hostname}/glyspace/service/glycans/G00026MO/image?format=png&notation=<?php echo $this->Session->read('image.notation'); ?>&style=extended">
<fieldset>
	<legend><?php echo $doc{'TopTitle'}[1] ?></legend>
	<input type="button" onclick="location.href='/Languages/en'"value="English">
	<input type="button" onclick="location.href='/Languages/ja'"value="日本語">
	<input type="button" onclick="location.href='/Languages/ch1'"value="中文(简体)">
	<input type="button" onclick="location.href='/Languages/ch2'"value="中文(繁體)">
	<input type="button" onclick="location.href='/Languages/fr'"value="Français">
	<input type="button" onclick="location.href='/Languages/de'"value="Deutsch">
	<input type="button" onclick="location.href='/Languages/ru'"value="русский">
</fieldset>
