<h1 class="page-header"><?php echo __('Glycan') . ' ' . __('Substructure') . ' ' . __('Search') ?></h1>

<div class="text-error"><?php echo $this->Session->flash(); ?></div>
<br>

<span><?php echo __('Search for the glycan given the glycan substructure.') ?></span></br></br>

<form method="post" action="sub" name="form1" class="form">
  <fieldset>
    <div class="control-group">
	<label class="control-label" for="text1"><?php echo __('Input single sequence') . __(':') ?></label>	
	<div class="controls">
	  <textarea name="text1" id="text1" rows="15" placeholder="Glycan structure" style="width: 300px;"></textarea>
	<label class="control-label" for="text1"><?php echo __('Select') . ' ' .  __('sequence format')  . __(':') ?></label>	
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
	<button type="submit" class="btn btn-primary"><?php echo __('Search') ?></button>
    </div>
  </fieldset>
</form>
