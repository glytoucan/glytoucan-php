<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>

<?php

echo $this->form->create(false, array('type'=>'post','action'=>'complete' ));
$num = 1;
	for($i=0;$i<count($Glycans);$i++) {
	
		$no = "No" . strval($num);
		echo $this->Form->input( 'num][' , array( 
			'before' => '<div class="confirm">',
			'label'  => $no,
			'value'  => $num,
			'type' => 'checkbox', 
			));
		echo $this->form->textarea(
        	       '',
                	array(  'cols' => 40,
                        	'rows' => 10,
                        	'default' => $Glycans[$i]['org'],
				'after' => '</div>',
				'disabled' => 'disabled'
			));
		$original = $Glycans[$i]['org'];
		$imgs = $Glycans[$i]['img'];
	    	echo $Glycans[$i]['img'] . "<p>";
    		echo "<p><hr>";
		echo $this->Form->hidden( 'gly][', array('value' => $original ));
		echo $this->Form->hidden( 'img][', array('value' => $imgs ));
		$num++;
	}
		echo $this->Form->submit($common_doc['submit'], array('class' => 'btn'));
	echo $this->Form->radio('debug', array('debug' => 'debug'));
	echo $this->form->end();
?>

