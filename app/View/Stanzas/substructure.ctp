<h1 class="page-header">Glycan Substructure</h1>


<table class="table table-bordered table-striped table-hover">
   <tr>
      <th><div align="left">Accession Number</div></th>
   </tr>
      <?php foreach ($structure->accessionNumber as $key => $value): ?>
         <tr>
	     <td><?php echo "  <a href=\"http://localhost/glycans/$value\">$value</a><br />\n"; ?></td>
	     <td><?php echo "  <a href=\"http://www.glytoucan.org/GTC_viewer/glycans/$value\">$value</a><br />\n"; ?></td>
         </tr>
      <?php endforeach; ?>
</table>
<!-- <h5><?php echo var_dump($structure->accessionNumber); ?></h5> -->

