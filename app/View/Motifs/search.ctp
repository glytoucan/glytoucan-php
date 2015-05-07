  <h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>
	<h4><?php echo $doc{'TopTitle'}[0]; ?></h4>

	  <?php $hit = count($motifs); ?>
	  <h3><?php echo $doc{'Top'}[0]; ?>: <?php echo $hit; ?></h3>

	<div class="container" >
	   <table class="table table-striped">
	   <thead>
	     <tr><th>Name</th><th>Sequence</th></tr>
	   </thead>
	   <tbody>
	    <?php foreach ($motifs as $key => $value): ?>
		<?php 
			// Motif Name
			$name = $value["name"]; 
			$encoName = urlencode($name);

			// make Accession Number
			$motifId = $value["motifId"] ;
			$accNum = 'G000' . $motifId . 'MO' ;
		?>
	    <tr>
		 	<td>
				<?php 
					echo $this->Html->link("$name","/Structures/?motif=$encoName", Array('target' => '_blank'));
				?>
			</td>
		 	<td>
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
			</td>
	     </tr>
	     <?php endforeach; ?>
	   </tbody>
	   </table>
	</div>

