<h1 class="page-header"><?php echo $doc{'Title'}[0] ?></h1>
<p><?php echo $doc{'Top'}[0] ?></p>
</br><?php echo $this->Session->flash() ?>


<fieldset>
<?php echo $this->Form->create( false, array('type'=>'post','action'=>'comp', 'class' => 'form-horizontal' )); ?>
<!--
	<div class="control-group">
        <div class="controls">
		<?php //echo $this->Form->input('glycanType', array('after' => '-linked', 'options' => array('N', 'O'))); ?>
        </div>
    	</div>
-->
<table>
<tbody><tr><td>
    <!-- first line -->
    <!-- Label -->
    <div class="control-group">
        <div class="controls">
            <span class="span1 text-center uneditable-input">Min</span>
            <span class="span1 text-center uneditable-input">Max</span>
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">HexNac</label>
        <div class="controls">
    		<input class="span1 text-center" type="text" name="hexNacMin" placeholder="Min" value="4">
    		<input class="span1 text-center" type="text" name="hexNacMax" placeholder="Max" value="7">
        </div>
    </div>

	<div class="control-group">
        <label class="control-label">Hex</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="hexNMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="hexNMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">NeuAc</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="neuAcMin" placeholder="Min" value="2">
        	<input class="span1 text-center" type="text" name="neuAcMax" placeholder="Max" value="2">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">NeuGc</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="neuGcMin" placeholder="Min" value="1">
        	<input class="span1 text-center" type="text" name="neuGcMax" placeholder="Max" value="3">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">HexA</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="hexAMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="hexAMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">dHex</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="dHexMin" placeholder="Min" value="1">
        	<input class="span1 text-center" type="text" name="dHexMax" placeholder="Max" value="3">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Kdo</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="kdoMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="kdoMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Kdn</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="kdnMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="kdnMax" placeholder="Max" value="0">
        </div>
    </div>
    </td>
    
    <!-- second line -->
    <td> 
	<div class="control-group">
        <label class="control-label">Hexose</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="hexoseMin" placeholder="Min" value="1">
        	<input class="span1 text-center" type="text" name="hexoseMax" placeholder="Max" value="4">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Pentose</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="pentoseMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="pentoseMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Sulfate</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="sulfateMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="sulfateMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Phosphate</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="phosphateMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="phosphateMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Methyl</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="methylMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="methylMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Acetyl</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="acetylMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="acetylMax" placeholder="Max" value="0">
        </div>
    </div>
	<div class="control-group">
        <label class="control-label">Other</label>
        <div class="controls">
        	<input class="span1 text-center" type="text" name="otherMin" placeholder="Min" value="0">
        	<input class="span1 text-center" type="text" name="otherMax" placeholder="Max" value="5">
        </div>
    </div>
    </td></tr>
</tbody>
</table>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="reset" class="btn">Cancel</button>
    </div>
</fieldset>
</form>

<!--clear form-->
<script type="text/javascript">
$(".clearForm").bind("click", function(){
    $(this.form).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
});
</script>
