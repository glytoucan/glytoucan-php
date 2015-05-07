<!-- selectable URL base -->
<?php //$urlBase="http://www.glytoucan.org/GTC_viewer" ?>
<?php //$urlBase="http://www.glytoucan.org/GTC_viewer" ?>
<?php $urlBase="http://localhost" ?>

	<h1 class="page-header">Motifs List</h1>
	<?php $hit = count($motifs->motif); ?>
	<h3>Hit : <?php echo $hit; ?></h3>
	<h4>Select Tag = <?php echo $tag; ?></h4>

	<div class="container" >
	   <table class="table table-striped">
	   <thead>
	     <tr><th>Name</th><th>Sequence</th><th>Tag</th></tr>
	   </thead>
	   <tbody>
	     <?php foreach ($motifs->motif as $key => $value): ?>
	     <tr>
		 	<td>
				<?php 
					$name = $value->attributes()->name; 
					$encoName = urlencode($name);
				?>
				<a href="<?php echo $urlBase; ?>/Motifs/motifs?name=<?php echo $encoName; ?>" target="_blank"><?php echo $name; ?></a>
			</td>
		 	<td>
				<?php $seqId =  $value->{'motif-sequences'}->{'motif-sequence'}->attributes()->sequenceId; ?>
				<img src="http://www.glyspace.org/service/motifs/image/<?php echo $seqId; ?>?format=png&notation=cfg&style=extended">
			</td>
			<td>
				<?php foreach($value->tags->tag as $tags): ?>
					<?php 
						$tag = $tags->attributes()->tag; 
						$encoTag = urlencode($tag);
					?>
					<a href="<?php echo $urlBase; ?>/Motifs/motifsTag?tag=<?php echo $encoTag; ?>" target="_blank"><?php echo $tag; ?></a><br/>
				<?php endforeach; ?>
			</td>
	     </tr>
	     <?php endforeach; ?>
	   </tbody>
	   </table>
	</div>

