<h1 class="page-header">Motif Search</h1>
<span>Search for a motif given by the classifications (tags). </span></br>
<span>This can search for all motifs containing all the tags listed or all motifs containing any of the tags listed based on the value of query type parameter.</span></br></br>

<form class="form" method="post" action="results" name="form1">
<fieldset>
	<div class="controle-group">
		<label class="controle-label" for="select01">Tag</label>
		<select name="select01" >
		    <option value=""></option>
		    <option value="N-Glycan">N-Glycan</option>
		    <option value="O-Glycan">O-Glycan</option>
		    <option value="Epitope">Epitope</option>
		    <option value="Glycosphingolipid">Glycosphingolipid</option>
		    <option value="Glycosaminoglycan">Glycosaminoglycan</option>
		    <option value="GPI">GPI</option>
		    <option value="Bacterial">Bacterial</option>
		    <option value="Plant">Plant</option>
		    <option value="full">full</option>
		    <option value="Subclass">Subclass</option>
		    <option value="ambiguous">ambiguous</option>
		 </select>
		<label class="controle-label" for="select02">Tag</label>
		<select name="select02" >
		    <option value=""></option>
		    <option value="N-Glycan">N-Glycan</option>
		    <option value="O-Glycan">O-Glycan</option>
		    <option value="Epitope">Epitope</option>
		    <option value="Glycosphingolipid">Glycosphingolipid</option>
		    <option value="Glycosaminoglycan">Glycosaminoglycan</option>
		    <option value="GPI">GPI</option>
		    <option value="Bacterial">Bacterial</option>
		    <option value="Plant">Plant</option>
		    <option value="full">full</option>
		    <option value="Subclass">Subclass</option>
		    <option value="ambiguous">ambiguous</option>
		 </select>
		<label class="controle-label" for="input03">Query Type</label>
		<div class="controls">
			<label class="radio">
	 			<input type="radio" name="input03" value="OR" checked >
	 			<!-- <input type="radio" name="input03" id="input03" value="OR" checked > -->
				OR
			</label>
			<label class="radio">
				<input type="radio" name="input03" id="input03" value="AND" >
				AND
			</label>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Search</button>
		<button type="reset" class="btn">Cancel</button>
	</div>
</fieldset>
</form>


