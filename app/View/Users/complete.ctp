<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>

<?php
        for($i=0;$i<count($no);$i++) {

                echo "No" . "$no[$i]" . "\t";
                echo $this->form->textarea(
                       '',
                        array(  'cols' => 40,
                                'rows' => 10,
                                'default' => "$original[$i]",
                                'after' => '</div>',
                       		'disabled' => 'disabled' 
                        ));
		echo $imgs[$i];
//debug mode
                if($debug == "debug"){

echo "<p>------debug_start------<p>";
echo "登録される内容<p>";
			echo "UserID<p>" . "\n";
                        echo $this->form->input('',array('disabled' => 'disabled','default' => 'ログイン機能はまだない'));
			echo "<p>GlycoCT<p>" . "\n";
                        echo $this->form->textarea(
                                "glycoct" ,
                                array(  'cols' => 20 ,
		                        'rows' => 5,
                                        'default' => $glycoct[$i],
                       			'disabled' => 'disabled' 
                                ));

			echo "<p>WURCS" . "\n";
                        echo $this->form->input(
                                '',
                                array(
                                        'class' => 'span11',
                                        'default' => $wurcs[$i],
                       			'disabled' => 'disabled' 
                                ));
echo "<p>------debug_end------";
//debug mode end
		}

    		echo "<p><hr>";
	}

?>
