<html>
  <body>
    <h1>Insert Page</h1>
    <p>this is RDF insert page.</p>
    <p>
      <?php
        echo $this->Form->create(false,
          array('type'=>'post','action'=>'insert'));
        echo $this->Form->text("text1");
        echo $this->Form->end('submit');
      ?>
<button type="button" class="btn btn-primary btn-lg">Large button</button>
    </p>
  </body>
</html>
