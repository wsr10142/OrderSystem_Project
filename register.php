<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>會員註冊</title>
	<style>
		<?php include"home.css"; ?>
	</style>
</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1>
			<a href="home.php"><img src=../ordersystem/logo/logo.png width="75" height="75"></a>
			<a href="home.php">SkyBucks</a></h1>
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
		<div class="content">
			<h1>會員註冊</h1>
			<div class="content1">
				<form method="get"	action="reg_success.php">
				<table class="register">
					<tr>
						<td align="right"><font size="5px">名字:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="10"name="cus_name"></font></td>
					</tr>
				
					<tr>
						<td align="right"><font size="5px">性別:</font></td>
						<td align="left"><font size="5px">
							<input value="男"type="radio"name="sex"checked>男
							<input value="女"type="radio"name="sex">女
							</font></td>
					</tr>

					<tr>
						<td align="right"><font size="5px">電話:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="10"name="cus_tel"></font></td>
					</tr>

					<tr>
						<td align="right"><font size="5px">地址:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="30"name="cus_addr"></font></td>
					</tr>
					
					<tr>
						<td align="right"><font size="5px">電子郵件:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="30"name="cus_email"></font></td>
					</tr>

					<tr>
						<td align="right"><font size="5px">帳號:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="10"name="account"></font></td>
					</tr>

					<tr>
						<td align="right"><font size="5px">密碼:</font></td>
						<td align="left"><font size="5px"><input type=text maxLength="10"name="passwd"></font></td>
					</tr>
				</table>

				<tr>
					<td><input value="註冊" type="submit" style="font-size:1.2rem;font-weight:sticky;color:white;text-align:center;background-color:#91B493;width:50px;height:40px;"></td>
					<td><input value="清除" type="reset" style="font-size:1.2rem;font-weight:sticky;color:white;text-align:center;background-color:#91B493;width:50px;height:40px;"></td>
				</tr>
				</form>

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
