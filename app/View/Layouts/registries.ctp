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


<div class="navbar navbar-fixed-top navbar-static-top navbar-inverse">
        <div class="navbar-inner">
                <div class="container">
                <ul class="nav">
                        <li><a href="http://www.glytoucan.org/">GlyTouCan</a></li>
                        <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                        Contents
                                        <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                        <li><a href="http://www.glytoucan.org/GTC_viewer/registries/"> glycan registry </a></li>
                                </ul>
                        </li>
                </ul>
                </div>
        </div>
</div>


<div class="container">
<?php echo $this->fetch('content'); ?>
</div>

<script>
$('.dropdownj-toggle').click(function() {
	$('.dropdown-toggle').dropdown('toggle');
});
</script>

</body>
</html>
