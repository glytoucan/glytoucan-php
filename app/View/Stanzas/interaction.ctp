<h1 class="page-header">
	<a href="http://www.rings.t.soka.ac.jp/" class="logo">
		<img src="http://www.rings.t.soka.ac.jp/rings4.png" />
	</a>
	Interaction</h1>
<table class="table table-bordered table-striped table-hover">
<tr>
	<th>Interaction ID</th>
	<td><?php echo $interaction["rid"];?> (<?php echo $this->Html->link('KEGG', 'http://www.genome.jp/dbget-bin/www_bget?rn:'.$interaction['rid'],
		array('target' => '_blank'));?>)</td>
</tr>
<tr>
	<th>Type</th>
	<td><?php echo ucfirst($interaction["type"]);?></td>
</tr>
<?php
if (!empty($interaction["substrate"])) {
	$i = 0;
	foreach ($interaction["substrate"] as $sgid => $simage) {
		echo "<tr>";
		if ($i == 0) echo "<th rowspan='" . count($interaction["substrate"]) . "'>Source Glycan(s)</th>";
		echo "<td>" . $this->Html->link($sgid, array(
			'controller' => 'stanza',
			'action' => 'glycan',
			$sgid
		)). "<img src='" . $simage . "'></td>";
		echo "</tr>";
		$i++;
	}
}

if (!empty($interaction["product"])) {
	$i = 0;
	foreach ($interaction["product"] as $pgid => $pimage) {
		echo "<tr>";
		if ($i == 0) echo "<th rowspan='" . count($interaction["product"]) . "'>Target Glycan(s)</th>";
		echo "<td>" . $this->Html->link($pgid, array(
			'controller' => 'stanza',
			'action' => 'glycan',
			 $pgid
		)). "<img src='" . $pimage . "'></td>";
		echo "</tr>";
		$i++;
	}
}
?>
</table>
