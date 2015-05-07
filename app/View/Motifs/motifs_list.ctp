	<h1 class="page-header">Motifs List</h1>
	<h4>All of the motifs in this repository</h4>

	  <?php $hit = count($motifs->motif); ?>
	  <h3>Hit : <?php echo $hit; ?></h3>

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
					echo $this->Html->link("$name","http://${hostname}/Motifs/motifs?name=$encoName", Array('target' => '_blank')); 
					echo $this->Html->link("$name","http://${hostname}/GTC_viewer/Motifs/motifs?name=$encoName", Array('target' => '_blank')); 
				?>
			</td>
		 	<td>
				<?php $seqId =  $value->{'motif-sequences'}->{'motif-sequence'}->attributes()->sequenceId; ?>
				<img src="http://glycomics.ccrc.uga.edu/glyspace/service/motifs/image/<?php echo $seqId; ?>?format=png&notation=cfg&style=extended">
			</td>
			<td>
				<?php foreach($value->tags->tag as $tags): ?>
					<?php 
						$tag = $tags->attributes()->tag; 
						$encoTag = urlencode($tag);
						echo $this->Html->link("$tag","http://${hostname}/GTC_viewer/Motifs/motifsTag?tag=$encoTag", Array('target' => '_blank')); 
						echo $this->Html->link("$tag","http://${hostname}/GTC_viewer/Motifs/motifsTag?tag=$encoTag", Array('target' => '_blank')); 
					?>
				<?php endforeach; ?>
			</td>
	     </tr>
	     <?php endforeach; ?>
	   </tbody>
	   </table>
	</div>

