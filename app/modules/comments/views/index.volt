<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon Sample</title>
		{{ stylesheet_link('css/application.css') }}
	</head>
	<body>
		<div class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{{ link_to(null, 'class': 'navbar-brand', 'Phalcon Sample')}}
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav nav-pills pull-right">
						<li>
							{{ link_to("posts", "Blog") }}
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			{{ content() }}
		</div>
	</body>
</html>