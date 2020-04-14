<!DOCTYPE HTML>

<html>
	<head>
		<title>Paradigm Shift by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="<?= theme("assets/style.css"); ?>" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<?= $v->section("content"); ?>

				<!-- Section -->
					<section>
						<header>
							<h2>Get in touch</h2>
						</header>
						<div class="content">
							<p><strong>Auctor commodo</strong> interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis.</p>
							<form>
								<div class="fields">
									<div class="field half">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message" rows="7"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" class="button primary" /></li>
								</ul>
							</form>
						</div>
						<footer>
							<ul class="items">
								<li>
									<h3>Email</h3>
									<a href="#">information@untitled.ext</a>
								</li>
								<li>
									<h3>Phone</h3>
									<a href="#">(000) 000-0000</a>
								</li>
								<li>
									<h3>Address</h3>
									<span>1234 Somewhere Road, Nashville, TN 00000</span>
								</li>
								<li>
									<h3>Elsewhere</h3>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
										<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
										<li><a href="#" class="icon brands fa-codepen"><span class="label">Codepen</span></a></li>
									</ul>
								</li>
							</ul>
						</footer>
					</section>

				<!-- Copyright -->
					<div class="copyright">&copy; Untitled. All rights reserved. Design: <a href="https://html5up.net">HTML5 UP</a>.</div>

			</div>

		<!-- Scripts -->
			<script src="<?= theme("assets/js/jquery.js"); ?>"></script>
			<script src="<?= theme("assets/js/jquery.scrolly.js"); ?>"></script>
			<script src="<?= theme("assets/js/browser.js"); ?>"></script>
			<script src="<?= theme("assets/js/breakpoints.js"); ?>"></script>
			<script src="<?= theme("assets/js/util.js"); ?>"></script>
			<script src="<?= theme("assets/js/main.js"); ?>"></script>

	</body>
</html>