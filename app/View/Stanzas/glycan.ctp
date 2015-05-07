<h1 class="page-header"><a href="http://www.rings.t.soka.ac.jp/" class="logo"><img src="http://www.rings.t.soka.ac.jp/rings4.png" class="logo"></a>Glycan</h1>
<div class="row">
	<div class="span4">
		<div class="gnum">
			<h3><?php echo $glycan['results']['bindings'][0]['gid']['value']; ?></h3>
			<ul class="unstyled">
				<li>
					<a href="http://www.genome.jp/dbget-bin/www_bget?gl:<?php echo $glycan['results']['bindings'][0]['gid']['value'];?>" target="_blank">
						KEGG
					</a>
				</li>
				<?php if (!empty($glycan['results']['bindings'][0]['glycomedb'])) { ?>
				<li>
					<a href="<?php echo $glycan['results']['bindings'][0]['glycomedb']['value'];?>" target="_blank">
						GlycomeDB
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="span8">
		<img src="<?php echo $glycan['results']['bindings'][0]['image']['value']; ?>" class="gimage">
		<a href="http://www.rings.t.soka.ac.jp/help/help.html#legend" target="_blank" class="img-help" data-toggle="tooltip" title="Legend" id="tooltip-help">?</a>
	</div>
</div>

<table class="table table-bordered table-striped table-hover">
<?php if (!empty($glycan['results']['bindings'][0]['rid'])) { ?>
<tr>
	<th>Related Interaction(s)</th>
	<td>
		<?php
			foreach ($glycan['results']['bindings'] as $interaction) {
				echo $this->Html->link($interaction['rid']['value'], array(
					'controller' => 'stanzas',
					'action' =>'interaction',
					$interaction['rid']['value']
				));
				echo '&nbsp;&nbsp;';
			}
		?>
	</td>
</tr>
<?php } ?>
<?php if (!empty($glycan['results']['bindings'][0]['kcf'])) { ?>
<tr><th>KCF</th><td class="seq"><pre><?php echo $glycan['results']['bindings'][0]['kcf']['value']; ?></pre></td></tr>
<?php } ?>
<?php if (!empty($glycan['results']['bindings'][0]['linucs'])) { ?>
<tr><th>LINUCS</th><td class="seq"><?php echo nl2br($glycan['results']['bindings'][0]['linucs']['value']); ?></td></tr>
<?php } ?>
<?php if (!empty($glycan['results']['bindings'][0]['linearcode'])) { ?>
<tr><th>LinearCode&reg;</th><td class="seq"><?php echo nl2br($glycan['results']['bindings'][0]['linearcode']['value']); ?></td></tr>
<?php } ?>
<?php if (!empty($glycan['results']['bindings'][0]['glycoct'])) { ?>
<tr><th>GlycoCT</th><td class="seq"><pre><?php echo $glycan['results']['bindings'][0]['glycoct']['value']; ?></pre></td></tr>
<?php } ?>
</table>

<script>
$('#tooltip-help').hover(function() {
	$('#tooltip-help').tooltip('toggle');
});
</script>
