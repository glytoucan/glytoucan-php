<h1 class="page-header"><?php echo $doc{'Title'}[0] ?></h1>


<div class="text-error">
	<?php echo $this->Session->flash(); ?>
</div>
<br>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6">

			<form class="well" action="/Registries/confirmation"
				id="confirmationForm" method="post" accept-charset="utf-8">
				<div style="display: none;">
					<input type="hidden" name="_method" value="POST" />
				</div>
				<?php echo $doc{'Left'}[0] ?>
				<textarea name="data[text]" id="text" cols="20" rows="15"
					style="width: 370px; height: 200px;">
				</textarea>
				<label class="control-label" for="select1"> <?php echo $doc{'Left'}[1] ?></label>
				<select name="select1">
					<option value="glycoCT_condensed"><?php echo $doc{'Left'}[2] ?></option>
					<option value="carbbank"><?php echo $doc{'Left'}[3] ?></option>
					<option value="cfg"><?php echo $doc{'Left'}[4] ?></option>
					<option value="kcf"><?php echo $doc{'Left'}[5] ?></option>
				</select>
				<div class="submit">
					<input class="btn btn-primary" type="submit" value="<?php echo $common_doc['submit'] ?>" />
				</div>
			</form>
		</div>

		<div class="span6">
			<div class="panel ">
				<div class="panel-heading">
					<label> <?php echo $doc{'RightTitle'}[0] ?>
					</label>
				</div>
				<div class="panel-body">
					<?php echo $doc{'Right'}[0] ?>
				</div>
			</div>
		</div>
	</div>
</div>

