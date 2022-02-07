<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('include.link')
	<title>LIB-SPORT 2DAY</title>
	<style type="text/css">
		body{
			background-color:darkgray;
		}
		.nav-item{
			font-size:1.5em;
			font-weight:bold;
		}
		.title{
			font-size:1.5em;
			font-weight:bold;
		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" style="background-color:mediumblue;">
				<nav class="navbar navbar-expand-lg navbar-light ">
				  <a class="navbar-brand title" href="#" style="color:darkred;">LIB-SPORT 2DAY</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:80px;">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item ">
				        <a class="nav-link text-light" href="/">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-light" href="/fixture">Fixture</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-light" href="/table">Table</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-light" href="/result">Result</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-light" href="#">Transfer</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-light" href="/leagueTeam">Teams</a>
				      </li>
				      <!-- <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Dropdown
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">Action</a>
				          <a class="dropdown-item" href="#">Another action</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="#">Something else here</a>
				        </div>
				      </li> -->
				      
				    </ul>
				    <form class="form-inline my-2 my-lg-0">
				      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
				    </form>
				  </div>
				</nav>
			</div>
		</div>

		<div>
			@yield('mainContent')
		</div>
	</div>

</body>
</html>
















<!-- 

<nav class="navbar navbar-default navbar-expand-lg">
					<div class="container-fluid">
						<div class="navbar-header">
							<a href="" class="navbar-brand">LIB-SPORT 2DAY</a>
						</div>
						<ul class="nav navbar-nav">
							<li>Home</li>
							<li>Table</li>
							<li>Result</li>
							<li>Fixture</li>
						</ul>
					</div>
				</nav>

 -->