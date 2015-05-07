	<h1 class="page-header">Glycan List</h1>
	<h4>All of the accession numbers in this repository</h4>

	<div class="container" style="padding:20px 0">
	  <?php $hit = count($glist->accessionNumber); ?>
	  <h3>Hit : <?php echo $hit; ?></h3>
	   <table class="table table-striped">
	   <thead>
	     <tr><th>No.</th><th>Accession Number</th></tr>
	   </thead>
	   <tbody>
	     <?php foreach ($glist->accessionNumber as $key => $value): ?>
	     <tr>
		 	<td><?php $key+=1; echo $key; ?></td> 
			<td><?php echo $this->Html->link("$value","/Structures/Glycans/$value",Array('target' => '_blank')); ?>
	     </tr>
	     <?php endforeach; ?>
	   </tbody>
	   </table>
	</div>

