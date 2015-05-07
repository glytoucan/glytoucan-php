<html>
  <body>
    <h1>Insert Page</h1>
    <p>this is RDF insert page.</p>
    <p>
      <?php
        echo $this->Form->create(false, 
          array('type'=>'post','action'=>'insert'));
          //array('type'=>'post','action'=>'insert_rdf'));
          //array('type'=>'post','controller'=>'Inserts','action'=>'insert_rdf'));
        echo $this->Form->text('text1');
        echo $this->Form->end('submit');
      ?>
    </p>
  </body>
</html>
