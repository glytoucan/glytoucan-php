<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>

<p>
<?php
echo $doc{'Top'}[0];
echo $this->Html->link( $doc{'Top'}[1], '/Registries/index' );
echo __("."); 
echo $this->Form->create( false, array('type'=>'post','action'=>'checkUpload', 'enctype' => 'multipart/form-data' ));
echo $this->Form->file('submittedfile');
echo $this->Form->submit($common_doc['display'], array('class' => 'btn btn-primary'));
echo $this->Form->end();
?>
</p>
