<?php include('voteHead.php'); ?>
<?php include("sess.php") ?>

<body>

	<script src="js/voteCard.js"></script>
	<?php include('side_bar.php'); ?>
	<form method="POST" action="vote_result.php" class="rootContainer">
		<?php
		$postes = $conn->query("SELECT `name` , `class_name` FROM `postes`") or die(mysqli_errno());
		$postes_class = array();
		while ($poste = $postes->fetch_array()) {
			array_push($postes_class,$poste['class_name']);
			$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = '" . $poste['name'] . "'") or die(mysqli_errno());
			if ($query->num_rows > 0) {
		?>
				<div class="voteContainer">
					<!--<div class="panel panel-primary">-->
					<div class="posteTitle">
						<center><?php echo $poste['name'] ?></center>
					</div>
					<div class="rowCard">
						<?php
						while ($fetch = $query->fetch_array()) {
						?>
							<div class="columnCard">
								<div class="card">
									<img src="admin/<?php echo $fetch['img'] ?>">
									<div class="containerCard">
										<h2 class="nameCard"><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></h2>
										<p class="levelCard"><?php echo $fetch['year_level'] ?></p>
										<div class="voteCheck fancyCheckbox" onclick="voteClicked(this)">
											<span class="vote_text">Je vote </span><input onclick="(function(e) {e.stopPropagation();})(event)" type="checkbox" value="<?php echo $fetch['candidate_id']; ?>" name="<?php echo $poste['class_name'] . "_id"; ?>" class="<?php echo $poste['class_name']; ?>">
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
		<?php
			}
		}
		$nb_postes = count($postes_class);
		?>
		<center><button style="margin-bottom:20px;" class="btn btn-success ballot" type="submit" name="submit">Submit Ballot</button></center>
	</form>
</body>
<?php include('script.php') ?>

<script type="text/javascript">
	$(document).ready(()=> {
		<?php
		for ($index = 0; $index < $nb_postes; $index++) {
		?>
			$(".<?php echo $postes_class[$index] ?>").on("change", (element)=> {
				if ($(".<?php echo $postes_class[$index] ?>:checked").length > 1) {
					let value = element.target.value;
					$(".<?php echo $postes_class[$index] ?>:checked").each((index,item)=>{
						if(item.value!=value){
							item.click();
						}
					});
				}
			});
		<?php
		}
		?>
	});
</script>

</html>