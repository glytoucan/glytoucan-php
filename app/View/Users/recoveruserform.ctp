<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>
<div class="container" style="padding:20px 0">
<?php echo $doc{'Top'}[0]; ?>
<?php echo $this->Form->create( false, array('type'=>'post','action'=>'recoveruser' )); ?>
<?php echo $doc{'Top'}[1]; ?>
<?php echo $this->Form->text( 'email', array('value' => "", 'id' => 'email')  ); ?>
<?php echo $this->Form->submit($common_doc['display'], array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>

<script>
  $(document).ready(function(){
    $("#recover").click(function(){
      $.get("http://localhost:8080/glyspace/service/recover.json?email=" + $('#email').val(),function(data,status){
        $('#email').val(data);
          });
    });
  });
</script>
