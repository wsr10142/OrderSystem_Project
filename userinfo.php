<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>使用者介面</title>
	<style>
    <?php
		session_start();
        ob_start();
        include"home.css"; 
	?>
	</style>
</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1>
			<a href="home.php"><img src=../ordersystem/logo/logo.png width="75" height="75"></a>
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
             <div class="userInfo">
                    <h1><a href="modify_user.php"><font size="5px">修改基本資料</font></a></h1>
                    <h1><a href="shopping_cart.php"><font size="5px">查看購物車</font></a></h1>
                    <h1><a href="history_usr.php"><font size="5px">查詢訂單</font></a></h1>
             </div>
         </div>
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
