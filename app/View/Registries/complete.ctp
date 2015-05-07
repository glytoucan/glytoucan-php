<h1 class="page-header"><?php echo $doc{'Title'}[0]; ?></h1>
<?php
echo "<div>";
echo '<table class="table table-bordered table-striped table-hover">';
echo "<tr><td></td>";
echo "<td>Structure</td>";
echo "<td>Image</td>";
echo "<td>newLink</td>";
echo "</tr>";
for($i = 0; $i < count ( $no ); $i ++) {
	
	echo "<tr>";
	echo '<td>';
	echo "No" . "$no[$i]" . '</td><td width="30%">';
	echo $this->form->textarea ( '', array (
			'cols' => 30,
			'rows' => 10,
			'default' => "$original[$i]",
			'after' => '</div>',
			'disabled' => 'disabled' 
	) );
	
	echo "</td>";
	echo '<td width="60%">';
	echo $imgs [$i];
	echo "</td>";
	echo '<td>';
	$res = $newStRes [$i];
	if ($res->pending) {
		$url = '/Structures/glycans/' . $res->accessionNumber;
		echo $this->Html->link($res->accessionNumber,$url );
	}else{
		echo error;
	}
	echo "</td>";
	echo "</tr>";
	
	// echo $newStRes[$i]['existing'];
	// debug mode
	/** 	
		echo "<p>------debug_start------<p>";
		echo "登録される内容<p>";
		echo "UserID<p>" . "\n";
		echo $this->form->input ( '', array (
				'disabled' => 'disabled',
				'default' => $this->Session->read ( 'user.name' ) 
		) );
		echo "<p>GlycoCT<p>" . "\n";
		echo $this->form->textarea ( "glycoct", array (
				'cols' => 20,
				'rows' => 5,
				'default' => $glycoct [$i],
				'disabled' => 'disabled' 
		) );
		
		echo "<p>WURCS" . "\n";
		echo $this->form->input ( '', array (
				'class' => 'span11',
				'default' => $wurcs [$i],
				'disabled' => 'disabled' 
		) );
		echo "<p>------debug_end------";
		// debug mode end
**/	
	echo "<p>";
}
echo "</table>";
echo "</div>";
?>
