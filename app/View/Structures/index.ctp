<div id="glycan_list_app" data-notation="<?php echo($this->Session->read('image.notation'));?>" data-lang="<?php echo($this->Session->read('language'));?>">
	<h1 class="page-header"><?php echo $doc['Title'][0]; ?></h1> <!--Glycan List -->

	<div class="glSearchWrapper">

		<div class="incSearch js_searchInput">
			<!--Search -->
			<span class="incSearch_label"><?php echo $common_doc['search'] ?>  </span> 
			<!--Enter a motif or monosaccharide name-->
			<input type="text" name="incSearchQuery" class="incSearch_input js_incSearchQuery" size="50" placeholder="<?php echo $common_doc['enterAMotifOrMonosaccharideName'] ?>" /> 			
			<!--Show full list of Motifs / Monosaccharides -->
			<span class="incSearch_list"><?php echo $common_doc['showFullListOf'] ?> <span class="incSearch_showList js_show_name_list" data-category="Motifs"><?php echo $common_doc['motifs'] ?></span> / <span class="incSearch_showList js_show_name_list" data-category="Monosaccharides"><?php echo $common_doc['monosaccharides'] ?></span></span>
			<!-- no suggestion -->
			<span class="incSearch_notfound">(<?php echo $common_doc['noneFound'] ?>)</span> 
		</div>

		<div class="listBox listBox--hide js_list_box">
			<div class="listBox_title"><span class="listBox_close js_listBox_close">&times;</span></div>
			<div class="listBox_tab">
				<!-- Motifs -->
				<span class="listBox_tabBtn listBox_tabBtn--current js_listBox_tabMotifs" data-category="Motifs"><?php echo $common_doc['motifs'] ?></span>
				<!-- Monosaccharides -->
				<span class="listBox_tabBtn js_listBox_tabMonosaccharides" data-category="Monosaccharides"><?php echo $common_doc['monosaccharides'] ?></span>
			</div>
			<div class="js_name_lists_area"></div>
		</div>

		<div class="searchSuggest searchSuggest--blank js_searchSuggest">
			<ul class="searchSuggest_ul">
			</ul>
		</div><!--/.searchSuggest-->
		<div class="adoptedSearch adoptedSearch--empty js_incSearchList">
			<!--Motif and Monosaccharide-->
			<p class="adoptedSearch_title"><?php echo $common_doc['motifAndMonosaccharide'] ?></p>
			<!-- No condition -->
			<p class="adoptedSearch_default">(<?php echo $common_doc['noCondition'] ?>)</p>
			<div class="adoptedSearch_group adoptedSearch_group--empty js_adoptedSearch_Motif">
				<!-- Motif -->
				<p class="adoptedSearch_label adoptedSearch_label--01" data-category="Motif"><?php echo $common_doc['motif'] ?></p>
			</div>
			<div class="adoptedSearch_group adoptedSearch_group--empty js_adoptedSearch_Monosaccharide">
				<!-- Monosaccharide -->
				<p class="adoptedSearch_label adoptedSearch_label--02" data-category="Monosaccharide"><?php echo $common_doc['monosaccharide'] ?></p>
			</div>
		</div><!--/.adoptedSearch-->

		<div class="massRange">
			<!-- Range of the Mass -->
			<p class="massRange_title"><?php echo $common_doc['rangeOfTheMass'] ?></p>
			<div class="massRange_input clearfix">
				<div class="massRange_slider ju_Range-massRange"></div>
				<input class="massRange_num ju_Range-massRange-min" type="text" size="6" value="" />
				&nbsp;〜&nbsp;
				<input class="massRange_num ju_Range-massRange-max" type="text" size="6" value="" />
			</div>
		</div><!--/.massRange-->
	</div><!--/.glSearchWrapper-->
	<div class="glResult glResult--listview clearfix">

		<div class="glResultTotal">
			<span class="glResultTotal_num js_resultTotal_num">0</span>
			<!-- Glycans -->
			<span class="glResultTotal_text"><?php echo $common_doc['numberOfGlycans'] ?>:</span>
			<!-- Reset all conditions -->
			<span class="clearCondition_btn js_clear_condition">&laquo; <?php echo $common_doc['resetAllConditions'] ?></span>
		</div><!--/.glResultTotal-->

		<div class="glResultHeader clearfix">
			<div class="glResultSwitch js_resultSwitch">
				<!-- List -->
				<span class="glResultSwitch_text glResultSwitch_text--current" data-view="list"><?php echo $common_doc['list'] ?></span>
				<span class="glResultSwitch_text" data-view="wurcs">WURCS</span>
				<span class="glResultSwitch_text" data-view="glycoct">GlycoCT</span>
			</div><!--/.glResultSwitch-->

			<div class="glResultSort">
				<!-- Sort -->
				<p class="glResultSort-text"><?php echo $common_doc['sort'] ?></p>
				<select class="glResultSort_key js_list_sortkey">
					<!-- Mass -->
					<option class="glResultSort_val" value="Mass"><?php echo $common_doc['mass'] ?></option>
					<!-- Contributor -->
					<option class="glResultSort_val" value="Contributor"><?php echo $common_doc['contributor'] ?></option>
					<!-- Date Entered -->
					<option class="glResultSort_val" value="ContributionTime"><?php echo $common_doc['dateEntered'] ?></option>
					<!-- Accession Number -->
					<option class="glResultSort_val" selected="selected" value="AccessionNumber"><?php echo $common_doc['accessionNumber'] ?></option>
				</select>
				<select class="glResultSort_order js_list_sortdirec">
					<!-- Up -->
					<option class="glResultSort_val" selected="selected" value="ASC"><?php echo $common_doc['up'] ?></option>
					<!-- Down -->
					<option class="glResultSort_val" value="DESC"><?php echo $common_doc['down'] ?></option>
				</select>
			</div><!--/.glResultSort-->

			<div class="glResultPager">
				<ul class="glResultPage-ul js_mainPager clearfix"></ul>
			</div><!--/.glResultPager-->
		</div>
		<div class="glResultWrapper glResult--showing js_glResult_list">
			<span class="glSearchNothing">Nothing found in this condition.</span>
		</div>
		<table class="glResultStructure js_glResult_wurcs">
			<thead class="glResultStructure_header">
				<tr>
					<!-- Accession Number -->
					<th class="glResultStructure_acc"><?php echo $common_doc['accessionNumber'] ?></th>
					<th>WURCS</th>
				</tr>
			</thead>
			<tbody class="glResultWurcs_body"></tbody>	
		</table><!--/.glResultStructure-->
		<table class="glResultStructure js_glResult_glycoct">
			<thead class="glResultStructure_header">
				<tr>
					<!-- Accession Number -->
					<th class="glResultStructure_acc"><?php echo $common_doc['accessionNumber'] ?></th>
					<th>GlycoCT</th>
				</tr>
			</thead>
			<tbody class="glResultStructure_body"></tbody>	
		</table><!--/.glResultStructure-->
		<div class="glResultPager">
			<ul class="glResultPage-ul js_mainPager clearfix"></ul>
		</div><!--/.glResultPager-->
	</div><!--/#glResultArea-->
	<div class="loading_anim loading_anim--hide js_loading_anim">
		<div id="floatingCirclesG">
			<div class="f_circleG" id="frotateG_01">
			</div>
			<div class="f_circleG" id="frotateG_02">
			</div>
			<div class="f_circleG" id="frotateG_03">
			</div>
			<div class="f_circleG" id="frotateG_04">
			</div>
			<div class="f_circleG" id="frotateG_05">
			</div>
			<div class="f_circleG" id="frotateG_06">
			</div>
			<div class="f_circleG" id="frotateG_07">
			</div>
			<div class="f_circleG" id="frotateG_08">
			</div>
		</div>
	</div>
</div><!--/#glycan_list_app-->