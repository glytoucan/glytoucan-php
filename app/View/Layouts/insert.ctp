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

<!--
<div class="navbar navbar-fixed-top navbar-static-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
		<ul class="nav">
			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
					Tools
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/DrawRings/drawrings2.pl">DrawRINGS</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/GlycanMiner/Miner_index.pl">Glycan Miner Tool</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/GlycomeAtlas/GUI.html">GlycomeAtlas</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/GlycomeAtlasV2/GUI.html">GlycomeAtlas ver. 2</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/Kernel/kernel-tool.pl">Glycan Kernel Tool</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/MCAW/mcaw_index.pl">MCAW Tool</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/ProfilePSTMM/profile-training_index.pl">Profile PSTMM Tool </a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
					Utilities
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/GlycoCTtoKCF_au/glycoct_index_au.pl">GlycoCT{condensed} to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/GlycoCTtoKCF/glycoct_index.pl">GlycoCT{XML} to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/GLYDE2toKCF/glyde2_index.pl">GLYDE2 to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/IUPACtoKCF_au/iupactokcf_index_au.pl">IUPAC to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/KCFtoIMAGE/kcf_to_image_index.pl">KCF to image</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/KCFtoLinearCode/kcf_to_linearcode_index.pl">KCF to LinearCode</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/KCFtoLINUCS/kcf_to_linucs_index.pl">KCF to LINUCS</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/KCFtoMol/kcfToMol_index.pl">KCF to Mol</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/KEGG_GLYCAN_IDtoKCF/keggtokcf_index.pl">KEGG GLYCAN ID to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/LinearCodetoKCF/linearcode_to_kcf_index.pl">LinearCode to KCF</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/cgi-bin/tools/utilities/LINUCStoKCF/linucs_to_kcf_index.pl">LINUCS to KCF</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
					Documentation
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="http://www.rings.t.soka.ac.jp/help/help.html">Help</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/whatsnew.html">What's new?</a></li>
				</ul>
			</li>
			<li><a href="http://www.rings.t.soka.ac.jp/downloads.html">Downloads</a></li>
			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
					Others
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="http://www.rings.t.soka.ac.jp/lab_info/Kinoshita_Laboratory/index_en.html">Kinoshita_Laboratory</a></li>
					<li><a href="http://www.rings.t.soka.ac.jp/wakate/index.html">糖鎖インフォマティクス　若手の会HPへ</a></li>
					<li><a href="http://www.t.soka.ac.jp/">Faculty of Engineering</a></li>
					<li><a href="http://www.soka.ac.jp/">Soka University</a></li>
				</ul>
			</li>
		</ul>
		</div>
	</div>
</div>

-->

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
