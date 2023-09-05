<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>會員登入</title>
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
			?>
		</header>

		<div class="box">
			<div class="wrap">
			
			<a href="menu.php?choose=1">Menu</a>
			<a href="orderfood.php?choose=1">點餐系統</a>
			<a href="register.php">會員註冊</a>
			
            </div>
		 </div> 
		 <div class="content">
			 <h1>會員登入</h1>
             <div class="content1">
				<form method="post" action="">
					<table>
						<tr>
							<td align="center">帳號:</td>
							<td align="left"><input type="text"name="cus_account"size="20"></td>
						</tr>

						<tr>
							<td align="center">密碼:
							<td align="left"><input type="password"name="cus_pwd"size="20"></td>
						</tr>
						</table>
						<tr>
							<td><input class="form" type="submit" value="送出" style="font-size:1.2rem;font-weight:sticky;color:white;text-align:center;background-color:#91B493;width:50px;height:40px;"></td>
							<td><input class="form" type="reset" value="清除" style="font-size:1.2rem;font-weight:sticky;color:white;text-align:center;background-color:#91B493;width:50px;height:40px;"></td>
						</tr>
				</form>
<?php
	session_start();
	include("connect.php");

	$cus_account=$_POST["cus_account"];
	$cus_pwd=$_POST["cus_pwd"];
	
	$select_db=@mysql_select_db("ordersystem");//選擇資料庫
	if($cus_account!=NULL&&$cus_pwd!=NULL)
	{
		if(!$select_db)
		{
	 		echo '<br>找不到資料庫!<br>'; 
		}
		else
		{
			$sql_query="select * from customer where account='".$cus_account."'and passwd='".$cus_pwd."'";
			$result=mysql_query($sql_query);

			if(mysql_num_rows($result)==0)
			{
				echo '<h2 class="error">帳號/密碼錯誤</h2>';
			}	
			else
	 		{
				$_SESSION['cus_login']=$cus_account;
				header("Location:home.php");
				exit;
			}
		}
	
	}
	ob_end_flush();
?>
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