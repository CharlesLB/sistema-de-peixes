<!DOCTYPE HTML>
<html>

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?= asset("/css/main.css?version5565", "web");?>" />
	<link rel="icon" href="<?= shared("/images/icon.ico") ?> " type="image/x-icon" />
	<noscript>
		<link rel="stylesheet" href="<?= asset("/css/noscript.css", "web");?>" /></noscript>
</head>

<body class="is-preload">

	<!-- Sidebar -->
	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>
				<?= $v->section("sidebar"); ?>
				</ul>
			</nav>
		</div>
	</section>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Intro -->
		<section id="intro" class="wrapper style1 fullscreen fade-up">
			<div class="inner">
				<?= $v->section("text"); ?>
			</div>
		</section>

		<?= $v->section("content"); ?>
		
	</div>

	<!-- Footer -->
	<footer id="footer" class="wrapper style1-alt">
		<div class="inner">
			<ul class="menu">
				<li>Projeto desenvolvido por Viviane Serafim e <a href="https://github.com/CharlesLB/sistema-de-peixes">@CharlesLB</a></li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				<li>Icons made by <a href="https://www.flaticon.com/authors/adib-sulthon" title="Adib Sulthon">Adib Sulthon</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></li>
			</ul>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="<?= shared("scripts/jquery.min.js"); ?>"></script>
	<script src="<?= asset("/js/jquery.scrollex.min.js", "web");?>"></script>
	<script src="<?= asset("/js/jquery.scrolly.min.js", "web");?>"></script>
	<script src="<?= asset("/js/browser.min.js", "web");?>"></script>
	<script src="<?= asset("/js/breakpoints.min.js", "web");?>"></script>
	<script src="<?= asset("/js/util.js", "web");?>"></script>
	<script src="<?= asset("/js/main.js", "web");?>"></script>
	<?= $v->section("js"); ?>

</body>

</html>