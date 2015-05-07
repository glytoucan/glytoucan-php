<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	<h1 class="page-header">Glycan List</h1>
	<div class="containeer" style="padding:20px 0">
	   <table class="table table-striped">
	   <thead>
	     <tr><th>No.</th><th>Accession Number</th></tr>
	   </thead>
	   <tbody>
	     <?php foreach ($glist['accessionNumber'] as $key => $value): ?>
	     <tr>
		<?php $key+=1; echo "<td>$key</td><td><a href=\"http://localhost/Structures/glycans/$value\">$value</a></td>"; ?>
	     </tr>
	     <?php endforeach; ?>
	   </tbody>
	   </table>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

