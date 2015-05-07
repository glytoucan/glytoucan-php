<h1 class="page-header">Glycan Substructure</h1>

<table class="table table-bordered table-striped table-hover">
   <tr>
      <th><div align="left">Accession Number</div></th>
   </tr>
      <?php foreach ($structure->accessionNumber as $key => $value): ?>
         <tr>
	     <td><?php echo "  <a href=\"/Structures/glycans/$value\">$value</a><br />\n"; ?></td>
	     <td><?php echo "  <a href=\"/Structures/glycans/$value\">$value</a><br />\n"; ?></td>
         </tr>
      <?php endforeach; ?>
</table>

