<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>les programmes</title>
	</head>

	<body>
		<div id="mainArrayProgrammes">
		<?php foreach($arrayProgs as $prg)
		{ ?>
			<div>
				<span><?php echo strtolower($prg->prg_label) ?></span>
			</div>
		<?php
		 } ?>
		 </div>
	</body>
</html>