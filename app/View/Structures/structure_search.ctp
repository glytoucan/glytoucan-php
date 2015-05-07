<h1 class="page-header">
	<?php echo $doc{'Title'}[0] ?>
</h1>

<div class="text-error">
	<?php echo $this->Session->flash(); ?>
</div>
<br>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span7">

			<form class="well" method="post" action="structure" name="form1"
				target="_blank">

				<label>
					<?php echo $doc{'Left'}[1] ?>
				</label>

				<div class="radio">
					<label><input type="radio" name="input01" value="exact"
						checked="">
					<?php echo $doc{'Left'}[2] ?></label>
				</div>

				<div class="radio">
					<label><input type="radio" name="input01" value="sub" disabled>
						<?php echo $doc{'Left'}[3] ?></label>
				</div>

				<textarea class="col col-xm-6" cols="30" rows="15" name="text1"
					id="text1" style="width: 465px; height: 200px;"></textarea>

				<label class="control-label" for="select1"> <?php echo $doc{'Left'}[4] ?></label>
				<select name="select1">
					<option value="glycoCT_condensed"><?php echo $doc{'Left'}[5] ?></option>
					<option value="carbbank"><?php echo $doc{'Left'}[6] ?></option>
					<option value="cfg"><?php echo $doc{'Left'}[7] ?></option>
					<!--<option value="bcsdb"><?php echo $doc{'Left'}[8] ?></option>
					<option value="linucs"><?php echo $doc{'Left'}[9] ?></option>-->
					<option value="kcf"><?php echo $doc{'Left'}[10] ?></option>
				</select>
				<div class="submit">
					<button type="submit" class="btn btn-primary"><?php echo $common_doc['search'] ?></button>
					<button type="reset" class="btn"><?php echo $common_doc['cancel'] ?></button>
				</div>

			</form>

		</div>

		<div class="span5">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<ul>
			<li><?php echo $doc{'RightTitle'}[1] ?>
			<ul><li><?php echo $doc{'Right'}[1] ?></ul>
			<br>
			<br>
			<li><?php echo $doc{'RightTitle'}[2] ?>
			<ul><li><?php echo $doc{'Right'}[2] ?></ul>
			</ul>
		</div>
		<div class="span12">
			<h id="tabs"><?php echo $doc{'BottomTitle'}[0] ?></h>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#A" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[1] ?>
				</a></li>
				<!-- <li><a href="#B" data-toggle="tab"><?php echo $doc{'BottomTitle'}[2] ?></a></li>
      				<li><a href="#C" data-toggle="tab"><?php echo $doc{'BottomTitle'}[3] ?></a></li> -->
				<li><a href="#D" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[4] ?>
				</a></li>
				<li><a href="#E" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[5] ?>
				</a></li>
				<li><a href="#F" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[6] ?>
				</a></li>
				<li><a href="#G" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[7] ?>
				</a></li>
				<li><a href="#H" data-toggle="tab">
						<?php echo $doc{'BottomTitle'}[8] ?>
				</a></li>
			</ul>
			<div class="tabbable">
				<div class="tab-content">
					<div class="tab-pane active" id="A">
						<p>
							<?php echo $doc{'Bottom'}[1] ?>
							<a href="http://www.ncbi.nlm.nih.gov/pubmed/18436199"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[1] ?>
						</p>
					</div>
					<!--<div class="tab-pane" id="B"><p><?php echo $doc{'Bottom'}[2] ?></p></div>
          				<div class="tab-pane" id="C"><p><?php echo $doc{'Bottom'}[3] ?></p></div> -->
					<div class="tab-pane" id="D">
						<p>
							<?php echo $doc{'Bottom'}[4] ?>
							<a href="http://books.google.co.jp/books?id=u_eA0voGL6UC&lpg=PA30&dq=glycome%20informatics%20Aoki%20CarbBank&hl=ja&pg=PA30#v=onepage&q&f=false"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[4] ?>
						</p>
					</div>
					<div class="tab-pane" id="E">
						<p>
							<?php echo $doc{'Bottom'}[5] ?>
							<a href="https://books.google.co.jp/books?id=u_eA0voGL6UC&lpg=PP1&dq=glycome%20informatics&hl=ja&pg=PA37#v=onepage&q&f=false"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[5] ?>
						</p>
					</div>
					<div class="tab-pane" id="F">
						<p>
							<?php echo $doc{'Bottom'}[6] ?>
							<a href="http://csdb.glycoscience.ru/bacterial/index.html?help=rules"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[6] ?>
						</p>
					</div>
					<div class="tab-pane" id="G">
						<p>
							<?php echo $doc{'Bottom'}[7] ?>
							<a href="http://www.ncbi.nlm.nih.gov/pubmed/11675023?dopt=Abstract"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[7] ?>
						</p>
					</div>
					<div class="tab-pane" id="H">
						<p>
							<?php echo $doc{'Bottom'}[8] ?>
								<a href="http://books.google.co.jp/books?id=u_eA0voGL6UC&lpg=PA32&ots=3-YMFHBj8D&dq=glycome%20informatics%20Aoki%20KCF&hl=ja&pg=PA31#v=onepage&q&f=false"><?php echo $doc{'Bottom'}[9] ?></a>
							<br>
							<?php echo $doc{'BottomFigure'}[8] ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


