<h1 class="page-header">Motif  Entry</h1>
		<table class="table table-bordered table-striped">
				<tr><th>Accession Number</th>
				<td class="seq"><pre><?php echo $accNum; ?></pre></td></tr>
				<tr><th>Name</th>
				<td class="seq"><pre><?php echo $motifs->attributes()->name; ?></pre></td></tr>
		</table>

		<?php foreach($motifs->{'motif-sequences'}->{'motif-sequence'} as $key => $motif): ?>
		<table class="table table-bordered table-striped">
				<tr><th>Image</th>
						<td class="seq">
							<pre><?php 
								$seqId = $motif->attributes()->sequenceId; 
								$notation = $this->Session->read('image.notation');
								if ($notation) {
									echo "<img src=\"$urlBase/motifs/image/$seqId?format=png&notation=$notation&style=extended\">";
								}else{
									echo "<img src=\"$urlBase/motifs/image/$seqId?format=png&notation=cfg&style=extended\">";
								}
							?></pre>
						</td>
				</tr>
				<tr><th>Sequence / GlycoCT</th>
				<td class="seq"><pre><?php echo $motif->sequence; ?></pre></td></tr>
		<?php endforeach; ?>
		</table>

