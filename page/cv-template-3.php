<?php
$resume['contact'] = str_replace("\\", "", $resume['contact']);
$resume['skills'] = str_replace("\\", "", $resume['skills']);
$resume['education'] = str_replace("\\", "", $resume['education']);
$resume['experience'] = str_replace("\\", "", $resume['experience']);
$contact = json_decode($resume['contact']);
$skills = json_decode($resume['skills']);
$edu = json_decode($resume['education']);
$exps = json_decode($resume['experience']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css"> -->

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />
	<link rel="stylesheet" href="<?= $action->helper->loadcss('cv_css_1.css') ?>">

	<link rel="icon" href="<?= $action->helper->loadimage('logo.png') ?>">
	<title><?= @$title ?></title>

</head>

<body>

	<div id="doc2" class="yui-t7">
		<div id="inner">

			<div id="hd">
				<div class="yui-gc">
					<!-- <div class="propic">
						<img src="../assets/profilepics/<?= $resume['profilepic'] ?>" alt="this is propic">
					</div> -->
					<div class="yui-u first">
						<h1><?= @$resume['name'] ?></h1>
						<h2><?= @$resume['headline'] ?></h2>
					</div>

					<div class="yui-u">
						<div class="contact-info">
							<h3><?= @$contact->email ?></h3>
							<h3><?= @$contact->mobile ?></h3>
							<h3><?= @$contact->address ?></h3>
						</div>
						<!--// .contact-info -->
					</div>
				</div>
				<!--// .yui-gc -->
			</div>
			<!--// hd -->

			<div id="bd">
				<div id="yui-main">
					<div class="yui-b">

						<div class="yui-gf">
							<div class="yui-u first">
								<h2>Objective</h2>
							</div>
							<div class="yui-u">
								<p class="enlarge">
									<?= @$resume['objective'] ?></p>
							</div>
						</div>
						<!--// .yui-gf -->

						<!--// .yui-gf -->

						<div class="yui-gf">
							<div class="yui-u first">
								<h2>Skills</h2>
							</div>
							<div class="yui-u">
								<?php
								foreach ($skills as $skill) {
								?>
									<ul class="talent">
										<li><?= @$skill ?></li>

									</ul>
								<?php
								}
								?>



							</div>
						</div>
						<!--// .yui-gf-->

						<div class="yui-gf">

							<div class="yui-u first">
								<h2>Experience</h2>
							</div>
							<!--// .yui-u -->

							<div class="yui-u">

								<?php
								if (count($exps) < 1) {
									echo "<h3> Fresher</h3>";
								}
								foreach ($exps as $exp) {
								?>
									<div class="job">
										<h2><?= $exp->company ?></h2>
										<h3><?= $exp->jobrole ?></h3>
										<h4><?= $exp->w_duration ?></h4>
										<p><?= $exp->work_desc ?></p>
									</div>

								<?php
								}
								?>





							</div>
							<!--// .yui-u -->
						</div>
						<!--// .yui-gf -->


						<div class="yui-gf last">
							<div class="yui-u first">
								<h2>Education</h2>
							</div>
							<?php
							foreach ($edu as $edus) {
							?>
								<div class="yui-u" style="margin-bottom: 15px;">
									<h2><?= $edus->collage ?></h2>
									<h3><?= $edus->course ?> &mdash; <?= $edus->e_duration ?> </h3>
								</div>

							<?php
							}
							?>

						</div>
						<!--// .yui-gf -->


					</div>
					<!--// .yui-b -->
				</div>
				<!--// yui-main -->
			</div>
			<!--// bd -->

			<!-- <div id="ft">
				<p>Jonathan Doe &mdash; <a href="mailto:name@yourdomain.com">name@yourdomain.com</a> &mdash; (313) - 867-5309</p>
			</div> -->
			<!--// footer -->

		</div><!-- // inner -->


	</div>
	<!--// doc -->
</body>

</html>