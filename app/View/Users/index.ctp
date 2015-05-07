<h1 class="page-header">Glycan Registry</h1>


<div class="row">
 <div class="span4">
  <div class="gnum">

<?php

	echo $this->Form->create( false, array('type'=>'post','action'=>'result' ));
	echo $this->Form->input('user',array('value' => ""));
	echo $this->Form->input('pass',array('value' => ""));
	echo $this->Form->submit('submit', array('class' => 'btn'));
	echo $this->Form->end();
?>

  </div>
 </div>
</div>
