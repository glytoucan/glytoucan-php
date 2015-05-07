<h1 class="page-header"><? echo __("Glycan List") ?></h1>
<?php //echo var_dump($list); ?>
<div class="container" style="padding:20px 0">
  <table class="table table-striped">
  <thead>
    <tr><th>No.</th><th>Accession Number</th></tr>
  </thead>
  <tbody>
  <?php foreach ($list as $key => $value): ?>
  <tr>
  <td><?php echo $key+1 ?></td>
  <td><?php echo $value ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
</div>

