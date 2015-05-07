<h1 class="page-header">
	<?php echo $doc{'Title'}[0] ?>
</h1>
<?php

$num = 1;

if (isset ( $newSt )) {
		echo $this->form->create ( false, array (
								'type' => 'post',
								'action' => 'complete' 
								) );

		echo "";
		echo $doc{'Register'}[0];
		echo "<div>";
		echo '<table class="table table-bordered table-striped table-hover">';
		echo "<tr><td></td>";
		echo "<td>original Structure</td>";
		echo "<td>Glycoct</td>";
		echo "<td>Image</td>";
		echo "</tr>";

		for($i = 0; $i < count ( $newSt ); $i ++) {
				echo '<td>';
				$no = "No." . strval ( $num );
				echo '<div class="control-group"><div class="controls"><label class="checkbox">
	                  <input type="checkbox" id="num]["  checked="checked"  name="data[num][]"  value="';
				echo $num;
				echo '" >';
				echo $no;
				echo '</label></div></div>';

				echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $newSt [$i] ['org'],
										'after' => '',
										'disabled' => 'disabled' 
										) );

				echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $newSt [$i] ['ct'],
										'after' => '',
										'disabled' => 'disabled' 
										) );

				$original = $newSt [$i] ['ct'];
				$img = $newSt [$i] ['img'];
				$img = '<img src=' . $img . '>' . "<p>";
				echo '</td><td width="60%">' . $img . '</td></tr>';

				echo $this->Form->hidden ( 'gly][', array (
										'value' => $original 
										) );
				echo $this->Form->hidden ( 'img][', array (
										'value' => $img 
										) );
				$num ++;
		echo '</td>';
		}
		echo '</table>';
		echo $this->Form->submit ( $common_doc['submit'], array (
								'class' => 'btn' 
								) );
		//	echo $this->Form->radio ( 'debug', array (
		//			'debug' => 'debug' 
		//	) );
		echo $this->form->end (); 
echo "<p><hr>";
}

if (isset ( $errSt )) {
		//echo "<p><hr>";
		echo $doc{'Error'}[0];
		echo "<div>";
		echo '<table class="table table-bordered table-striped table-hover">';
		echo "<tr><td></td>";
 		echo "<td>original Structure</td>";
		echo "<td>Structure</td>";
		echo "<td>ErrorMesseage</td>";
		echo "</tr>";
		//echo "<p><hr>";

		for($i = 0; $i < count ( $errSt ); $i ++) {

				$no = "No." . strval ( $num );
				echo '<td>'.$no;
                echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $errSt [$i] ['org'],
										'after' => '',
										'disabled' => 'disabled' 
										) );
				echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $errSt [$i] ['ct'],
										'after' => '</div>',
										'disabled' => 'disabled' 
										) );
				$original = $errSt [$i] ['ct'];
				echo '</td><td>';
				echo $errSt [$i] ['mess'] . "<p>";
				echo '</td><tr>';
				$num ++;
		}
}
echo '</table>';
if (isset ( $exist )) {
		echo $doc{'Registered'}[0];
		echo '<table class="table table-bordered table-striped table-hover">';
		echo "<tr><td></td>";
		echo "<td>original Structure</td>";
		echo "<td>Structure</td>";
		echo "<td>Image</td>";
		echo "<td>ID</td><tr>";

		for($i = 0; $i < count ( $exist ); $i ++) {
				$no = "No." . strval ( $num );
				echo '<tr><td width="30"%>';
				echo $no;
                echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $exist [$i] ['org'],
										'after' => '</div>',
										'disabled' => 'disabled' 
										) );
				echo '</td><td>';
				echo $this->form->textarea ( '', array (
										'cols' => 40,
										'rows' => 10,
										'default' => $exist [$i] ['ct'],
										'after' => '</div>',
										'disabled' => 'disabled' 
										) );
				echo '</td><td>';
				$original = $exist [$i] ['ct'];
				echo "<img src=http://${webservice.url}/glyspace/service/glycans/" . $exist [$i] ['id'] . "/image?format=png&notation=cfg&style=extended>" . "<p>";
				echo "</td><td>";
				echo $exist [$i] ['id'];
				echo '</td><tr>';
				$num ++;
		}
}
echo '</table>';

echo $doc['Bottom'][0];
echo $this->form->create ( false, array ('type' => 'post','action' => 'download') );
for($i=0;$i<count($exist);$i++){
	echo $this->Form->hidden ( 'existCt][', array ('value' => $exist[$i]['ct'] ) );
	echo $this->Form->hidden ( 'existOrg][', array ('value' => $exist[$i]['org'] ) );
	echo $this->Form->hidden ( 'existId][', array ('value' => $exist[$i]['id'] ) );
}
for($i=0;$i<count($errSt);$i++){
	echo $this->Form->hidden ( 'errCt][', array ('value' => $errSt[$i]['ct'] ) );
	echo $this->Form->hidden ( 'errOrg][', array ('value' => $errSt[$i]['org'] ) );
    echo $this->Form->hidden ( 'errMes][', array ('value' => $errSt [$i] ['mess']) );
}
for($i=0;$i<count($newSt);$i++){
	echo $this->Form->hidden ( 'newCt][', array ('value' => $newSt[$i]['ct'] ) );
	echo $this->Form->hidden ( 'newOrg][', array ('value' => $newSt[$i]['org'] ) );
}
echo $this->Form->submit($common_doc['download'], array ('class' => 'btn') );
echo $this->form->end (); 
?>
