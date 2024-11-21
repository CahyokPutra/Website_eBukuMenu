<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home-Ebukumenu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');
		* {
			padding: 0;
			margin: 0;
		}
		body{
			 font-family: "Noto Sans", sans-serif;
			 background-color: #F4EBD0; 
		}
		a {
			color: inherit;
			text-decoration: none;
		}
		/*navbar*/
		.navbar {
			padding:0.5rem 1rem;
			background-color: #FEC84D;
			color: #fff;
			position: fixed;
			width: 100%;
			top: 0;
			left: 0;
			z-index: 99;

		}
		/*sidebar*/
		.sidebar {
			position: fixed;
			width: 250px;
			top: 0;
			bottom: 0;
			background-color :#fff;
			padding-top: 40px;
			transition: all .5s;
			z-index: 99;
		}
		.sidebar-hide {
			left: -250px;
		}
		.sidebar-show {
			left: 0;
		}
		.sidebar-body {
			padding: 15px;
		}
		.sidebar-body h2 {
			margin-bottom: 8px;
		}
		.sidebar-body ul {
			list-style: none;
		}
		.sidebar-body ul li a {
			width: 100%;
			display: inline-block;
			padding: 7px 15px;
			box-sizing: border-box;
		}
		.sidebar-body ul li a:hover {
			background-color: #FF8370;
			color: #fff;
		}
		.sidebar-body ul li:not(:last-child) {
			border-bottom: 1px solid #ccc;
		}
		/*banner*/
		.banner {
			border-bottom: 1px solid #ccc;
			padding:  70px 15px 40px;
			background-image: url('assets/img/banner.jpg');
			background-size: cover;
			background-repeat: non-repeat;
			background-position: bottom;
			position: relative;
		}
		.banner:before {
			content: '';
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-image: linear-gradient(to right, rgba(255,255,255,1), rgba(255,255,255,.5));
		}
		.banner-text {
			position: relative ;
		}
		/*content*/
		.content {
			padding: 25px 0;
		}
		.container {
			width: 540px;
			padding-left: 15px;
			padding-right: 15px;
			box-sizing: border-box;
			margin-left: auto;
			margin-right:auto;
		}
		.row {
			margin-left: -15px;
			margin-right: -15px;
			display: flex;
			flex-wrap: wrap;
		}
		.col-6 {
			flex: 0 0 50%;
			box-sizing: border-box;
			padding-left: 15px;
			padding-right: 15px;
		}
		.card-menu{
			border: 1px solid #ccc;
			background-color: #fff;
			border-radius: 5px;
		}

		.card-menu img {
			width: 100%;
			height: 150px;
			object-fit: cover;
			border-top-right-radius: 3px;
			border-top-left-radius: 5px;
		}
		.card-body{
			padding: 8px;
		}
		.menu-name {
			height: 45px;
			overflow:hidden ;
			display: -webkit-box;
			text-overflow: ellipsis;
			-webkit-line-clamp:2;
			-webkit-box-orient:vertikal;
			margin-bottom: 8px;
		}
		.menu-price {
			font-weight: bold;
			text-align: right ;
		}

		@media (max-width: 768px)
		.container {
			width: 100%;
		}
	</style>
</head>
<body>
	<!--navbar-->
	<div class="navbar">
		<a href="#" id="btnBars">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<!--sidebar-->
	<div class="sidebar sidebar-hide">
		<div class="sidebar-body">

			<h2>Kategori</h2>
			<ul>
				<li><a href="">Makanan</a></li>
				<li><a href="">Minuman</a></li>
			</ul>
			
		</div>
	</div>

	<!--banner-->
	<div class="banner">
		<div class="banner-text">
			
			<h1>Buka Resto</h1>
			<p>Daftar menu makanan & minuman</p>

		</div>
	</div>
	<!--content-->
	<div class="content">
		<div class="container">

			<!--list menuu-->
			<div class="row">

			<!--menu item-->
			<?php for($i=1; $i<=50; $i++ ){
			?>
		<div class="col-6">

			<a href="detail.php">
				<div class="card-menu">
				<img src="uploads/products/nasi.jpg">
					<div class="card-body">
						<div class="menu-name">Paket 1</div>
							<div class="menu-price">
							Rp.15.000</div>
						
					</div>
				</div>
			</a>
		</div>

			<?php } ?>		
				</div>
			</div>
		</div>
	<script type="text/javascript">

		var btnBars = document.getElementById('btnBars')
		var sidebar = document.querySelector(".sidebar")

		btnBars.addEventListener('click', function(e){
			e.preventDefault();

			sidebar.classList.toggle('sidebar-show')
		})

	</script>

</body>
</html>