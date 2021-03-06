<h1 class="page-header">Substructure Search</h1>

<span>Search for all glycans which contain the given by the glycan sequence and sequence format.</span></br></br>

<div class="text-error"><?php echo $this->Session->flash(); ?></div><br>
<form method="post" action="substructure" name="form1" class="form">
  <fieldset>
    <div class="control-group">
	<label class="control-label" for="text1">Input single sequence :</label>	
	<div class="controls">
	  <textarea name="text1" id="text1" rows="15" cols="120" placeholder="Glycan structure"></textarea>
	  
	<label class="control-label" for="text1">Select sequence format :</label>	
	  <select name="select1" >
	    <option value="glycoCT_condensed">GlycoCT Condensed</option>
	    <option value="glycoct_xml">GlycoCT XML</option>
	    <option value="glyde">GlydeII</option>
	    <option value="carbbank">Carbbank encoding</option>
	    <option value="cfg">GlycoMindes encoding</option>
	    <option value="bcsdb">BCSDB sequence encoding</option>
	    <option value="linucs">LINUCS encoding</option>
	    <option value="kcf">KCF encoding</option>
	    <option value="ogbi">OGBI motif encoding</option>
	    <option value="iupac_condenced">IUPAC Condensed</option>
	    <option value="iupac_short_v1">IUPAC Short version 1</option>
	    <option value="iupac_short_v2">IUPAC Short version 2</option>
	  </select>
	</div>
    </div>
    <div class="form-actions">
	<button type="submit" class="btn btn-primary">Search</button>
    </div>
  </fieldset>
</form>


