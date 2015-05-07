<h1 class="page-header"><?php echo $doc{'Title'}[0] ?></h1>
<?php echo $doc{'Top'}[0] ?><br>
<?php $hit = count($motifs->motif); ?>
<h4><?php 
		echo __('Count') . ' : ' . $hit;
		echo "<br /><br />\n\n"; 
		if (!empty($tag)) echo __('Tag') . ':' . $tag;
	?></h4>

<div class="container" >

   <table class="table table-striped">
   <thead>
   <tr><th>Name</th><th>Sequence</th></tr>
   </thead>
   <tbody>
	<?php foreach ($motifs->motif as $key => $value): ?>
	<?php 
		// Motif Name
		$name = $value->attributes()->name; 
		// make Accession Number
		$motifId = $value->attributes()->motifId ;
		$accNum = 'G000' . $motifId . 'MO' ;
	?>

	<tr>
		<td>
			<div class="text-center">
			<?php 
				echo $this->Html->link("$name","/Structures/Glycans/$accNum", Array('target' => '_blank')); 
			?>
			</div>
		</td>
		<td>
			<div class="text-center">
			<?php 
				$notation = $this->Session->read('image.notation');
				if ($notation){
					// change the notation 
					echo " <img src=\"$urlBase/glycans/$accNum/image?format=png&notation=$notation&style=extended\"> "; 
				}else{
					// default notation is CFG
					echo " <img src=\"$urlBase/glycans/$accNum/image?format=png&notation=cfg&style=extended\"> "; 
				}
			?>
			</div>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
