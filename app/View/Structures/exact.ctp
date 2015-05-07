<h1 class="page-header">Glycan entry</h1>
<?php //echo $this->Session->read('image.notation'); ?>
<table class="table table-striped table-bordered">
	<tr>
		<!-- Accession Number -->
		<th>Accession Number</th>
		<td class="seq">
			<pre><?php if ($glycans->attributes() != null) { echo $aNum = $glycans->attributes()->accessionNumber;  } ?></pre>
		</td>
	</tr>

	<tr>
		<!-- Date Entered -->
		<th>Date Entered</th>
		<td class="seq">
			<pre><?php 
					$date = $glycans->attributes()->dateEntered; 
					echo date('Y/m/d G:i', strtotime($date));
				?>
			</pre>
		</td>
	</tr>

	<tr>
		<!-- Structure Image -->
		<th>Structure / Image</th>
		<td class="seq">
			<pre><?php 
					$label = $this->Session->read('image.nLabel');
					if (strpos($image, 'data') === 0 ) {
						// Structure image
						echo "<img src=\"$image\" title=\"$label\"><br />\n";
					}else{
						// Unspported encoding message
						echo $image;
					}
			?></pre>
		</td>
	</tr>


	<tr>
		<!-- Structure / GlycoCT -->
		<th>Structure / GlycoCT</th>
		<td class="seq">
			<pre><?php echo $glycans->structure; ?></pre>
		</td>
	</tr>

	<tr>
		<!-- Mass -->
		<?php if ($glycans->attributes()->mass != null): ?>
			<th>Mass</th>
			<td class="seq">
				<pre><?php if ($glycans->attributes()->mass != null) { echo $glycans->attributes()->mass; } ?></pre>
			</td>
		<?php endif; ?>
	</tr>

	<tr>
		<!-- Contributor -->
		<th>Contributor</th>
		<td class="seq">
			<pre><?php echo $glycans->contributor->attributes()->userName; ?></pre>
		</td>
	</tr>
</table>




<!--  Motif columes -->

<?php if (isset($glycans->motifs->motifs)): ?>
<h2>Motifs</h2>
<?php foreach($glycans->motifs->motifs as $key => $motif): ?>
		<table class="table table-bordered table-striped">

				<!-- Motif ID -->
				<tr><th>Motif ID</th>
				<td class="seq"><pre><?php echo $motif->attributes()->motifId; ?></pre></td></tr>

				<!-- Motif Name -->
				<tr><th>Name</th>
					<td>
						<?php 
							$name = $motif->attributes()->name; 
							$encoName = urlencode($name);
						?>
						<?php echo "<a href=\"/Motifs/motifs?name=$encoName\"> $name </a>"; ?>
					</td>

				<?php foreach($motif->{'motif-sequences'}->{'motif-sequence'} as $key => $sequences): ?>
					<!-- Sequence ID -->
					<tr><th>Sequence ID</th>
					<td class="seq"><pre><?php echo $seqId = $sequences->attributes()->sequenceId; ?></pre></td></tr>

					<!-- Sequence / Image -->
					<tr><th>Sequence / Image</th>
						<td class="seq">
							<pre><?php 
								$notation = $this->Session->read('image.notation');
								if ($notation) {
									echo "<img src=\"$urlBase/motifs/image/$seqId?format=png&notation=$notation&style=extended\">";
								}else{
									echo "<img src=\"$urlBase/motifs/image/$seqId?format=png&notation=cfg&style=extended\">";
								}
							?></pre>
						</td>
					</tr>

					<!-- Sequence / GlycoCT -->
					<tr><th>Sequence / GlycoCT</th>
					<td class="seq"><pre><?php echo $sequences->sequence; ?></pre></td></tr>
				<?php endforeach; ?>


				<!-- Tag -->
				<tr><th>Tag</th>
					<td class="seq">
						<?php foreach ($motif->tags->tag as $tags): ?>
								<?php 
									$tag = $tags->attributes()->tag; 
									$encoTag = urlencode($tag);
								?>
								<?php echo "<a href=\"/Motifs/motifsTag?tag=$encoTag\">$tag</a><br />\n"; ?>
						<?php endforeach; ?>	
					</td>
				</tr>
		</table><br /><br />
<?php endforeach; ?>
<?php endif; ?>







