<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>首頁</title>
    <style>
    <?php
        session_start();
        ob_start();
        include"home.css"; 
    ?>
    </style>
</head>

<body>
<?php
	session_start();
	$logout=$_GET["logout"];
	if($logout==1)
	{
		unset($_SESSION['cus_login']);
		$logout==0;
	}
?>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1>
			<a href="adminlogin.php"><img src=../ordersystem/logo/logo.png width="75" height="75"></a>
			<a href="home.php">SkyBucks</a>
            <?				
				if($_SESSION['cus_login']==NULL)
				{
					?>
					<a class="login" href="login.php">Login</a></h1>
					<?
				}
				else
				{
					?>
                    <a class="login" href="userinfo.php">Hi!</a>
                    <a class="login" href="home.php?logout=1">Logout</a></h1>
                    <?
				}
			?>
		</header>
		
		<div class="box">
			<div class="wrap">
			
			<a href="menu.php?choose=1">Menu</a>
			<a href="orderfood.php?choose=1">點餐系統</a>
			<?php 
                if($_SESSION["cus_login"]==NULL)
                {
                    ?>
                    <a href="register.php">會員註冊</a>
                    <?
                }
                ?>
			
			</div>
		</div>
		<div class="content">
			<h1>企業理念</h1>
			<div class="introduce">
			要想清楚，咖啡廳企業理念，到底是一種怎麼樣的存在。我們普遍認為，若能理解透徹核心原理，對其就有了一定的了解程度。在這種不可避免的衝突下，我們必須解決這個問題。咖啡廳企業理念的存在，令我無法停止對他的思考。對咖啡廳企業理念進行深入研究，在現今時代已經無法避免了。培根曾提出，智者創造的機會比他得到的機會要多。這影響了我的價值觀。咖啡廳企業理念改變了我的命運。
			</div>
			<h1>Ours Café</h1>
			<div class="catPic">
				<img src="../ordersystem/logo/cat01.jpg"></img>
			</div>
			<div class="catIntroduce">
				 <h1>我是本店的店長兼店貓</h1>
				 <h1>本貓的奴才們是這家店的店員們</h1>
				 <h1>本店的品質有本貓把關，儘管放心吃</h1>
				 <h1>沒事就來店裡找我，本貓最擅長躲貓貓了</h1>
				 <h1>別忘記戴上你的口罩喔！</h1>
			</div>
			
		</div>
		<div class="clearFix"></div>

		<footer class="footer">
		<h1>
			© 2021 Skybucks Coffee Company. All rights reserved.<br>
			Final Project For Education Course.<br>
			81148 高雄市楠梓區大學西路700號<br>
			線上訂購:886-7-7777777<br>
		</h1>
		</footer>
</body>
</html>