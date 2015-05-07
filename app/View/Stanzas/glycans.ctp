<h1 class="page-header">Glycan Entry</h1>

<h4>
<table class="table table-bordered table-striped table-hover">
<tr><th>Accession Number</th>
<td class="seq"><pre><?php echo $glycans['@attributes']['accessionNumber']; ?></pre></td></tr>

<tr><th>Date Entered</th>
	<td class="seq">
		<pre><?php 
				$date = $glycans['@attributes']['dateEntered']; 
				echo date('Y/m/d G:i', strtotime($date));
			?>
		</pre>
	</td>
</tr>

<tr><th>Structure / Image</th>
	<td class="seq">
		<pre><img src="http://www.glyspace.org/glycans/<?php echo $glycans['@attributes']['accessionNumber']; ?>/image?format=png&notation=cfg&style=compact">
		<pre>
	</td>
</tr>

<tr><th>Structure / GlycoCT</th>
<td class="seq"><pre><?php echo $glycans['structure']; ?></pre></td></tr>

<tr><th>Contributor</th>
<td class="seq"><pre><?php echo $glycans['contributor']['userName']; ?></pre></td></tr>

<!--<tr><th>Email</th>
<td class="seq"><pre><?php echo $glycans['contributor']['email']; ?></pre></td></tr> -->
</table>
</h4>

<h3><?php  
	  //echo $glycans['contributor']['userName']; 
	  //echo var_dump($glycans);
	  foreach ($glycans['@attributes'] as $key => $value) {
	 //   echo "$key ... $value<br />\n";
	    if ($key == "contributor") {
	      //echo var_dump($value);
	      foreach ($value as $key2 => $value2) {
	//	echo "2:$key2 ... $value2<br />\n";
		if ($key2 == "roles") {
		  //echo var_dump($value2);
	          foreach ($value2[0] as $key3 => $value3) {
	//	    echo "3:$key3 ... $value3<br />\n";
		  }
		}
	      }
	    
	    }
	  }
	  foreach ($glycans as $key => $value) {
	  //  echo "$key ... $value<br />\n";
	  }
	
?></h3>
	
