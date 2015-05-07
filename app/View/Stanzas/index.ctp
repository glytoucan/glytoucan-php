<div class="topMainVis">
	<div class="topMainVis_inner">
		<div class="topMainVis_title">
			<h1>GlyTouCan<br /><span class="topMainVis_subTitle">THE GLYCAN REPOSITORY</span></h1>
		</div><!--Chenged height from 333-->
		<img class="topMainVis_img" src="/img/top_structure_img.png" height="300" width="382" alt="" />
	</div>
	<div id="top_status_app" class="topMainVis_bottom">
		<div class="topMainVisStat">
			<div class="topMainVisStat_col">
				<p class="topMainVisStat_value topMainVisStat_value-num"><span class="statusTotalCount"></span></p>
				<p class="topMainVisStat_label"><?php echo $common_doc['glycans'] ?></p>
			</div>
			<div class="topMainVisStat_col">
				<p class="topMainVisStat_value topMainVisStat_value-num"><span class="statusMotifCount"></span></p>
				<p class="topMainVisStat_label"><?php echo $common_doc['motifs'] ?></p>
			</div>
			<div class="topMainVisStat_col">
				<p class="topMainVisStat_value topMainVisStat_value-num"><span class="statusMonosaccharideCount"></span></p>
				<p class="topMainVisStat_label"><?php echo $common_doc['monosaccharides'] ?></p>
			</div>
		</div><!--/.topMainVis_stat-->
	</div>
</div><!--/.topMainVis-->

<div class="topPageMain clearfix">
	<div class="topPageMain_content">
		<div class="topPageColumn topPageColumn-01">
			<p class="topPageColumn_title"><?php  echo $doc{'LeftTitle'}[0] ?></p>
			<p class="topPageColumn_text"><?php  echo $doc{'Left'}[0] ?></p>
		</div>
		<div class="topPageColumn topPageColumn-02">
			<p class="topPageColumn_title"><?php  echo $doc{'LeftTitle'}[1] ?></p>
			<p class="topPageColumn_text"><?php  echo $doc{'Left'}[1] ?></p>
		</div>
		<div class="topPageColumn topPageColumn-03">
			<p class="topPageColumn_title"><?php  echo $doc{'LeftTitle'}[2] ?></p>
			<p class="topPageColumn_text">
				<?php  echo $doc{'Left'}[2] ?>
			    <a href="http://www.glyspace.org" target="_blank"><?php  echo $doc{'Left'}[3] ?></a>
			</p>
		</div>
	</div><!--/.topPageMain_content-->

	<div class="topPageMain_right">
	<!--	<nav class="topNav">-->
			<div class="topRight_image">
			<!--	<p class="topNav_label topNav_label-01">Search</p>
				<ul class="topNav_items">
					<li><?php /*echo $this->Html->link($common_doc['byText'], '/Structures/structureSearch') ?></li>
					<li><?php echo $this->Html->link($common_doc['byMotif'], '/Motifs/search') ?></li>
					<li><?php echo $this->Html->link($common_doc['byGraphic'], '/Structures/graphical') */?></li>
				</ul>-->
				<?php echo $this->html->image('glytoucan_top.png',array('alt' =>'glytoucan' , 'width' =>'240', 'height' =>'250', 'class'=>'image')); ?>
			</div>
			<div class="topRight_twitterTimeline">
			<!--	<p class="topNav_label">View All</p>
				<ul class="topNav_items">
					<li><?php /*echo $this->Html->link($common_doc['motifList'], '/Motifs/listAll') ?></li>
					<li><?php echo $this->Html->link($common_doc['glycanList'], '/Structures')*/?></li>
				</ul> -->
				<a class="twitter-timeline" width="240" height="250" href="https://twitter.com/glytoucan" data-widget-id="524091769575583744" lang="en">Tweets by @glytoucan</a>
            	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
            	</script>
			</div>
	    <!--</nav>-->
	</div><!--/.topPageMain_right-->

</div><!--/.topPageMain-->
