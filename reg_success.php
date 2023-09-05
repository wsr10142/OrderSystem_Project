<html>
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>註冊成功</title>
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
			<a href="home.php"><img src="logo.png" width="75" height="75"></a>
			<a href="home.php">SkyBucks</a>
			<a class="login" href="login.php">Login</a></h1>
		</header>

		<div class="box">
			<div class="wrap">
			
			<a href="menu.php">Menu</a>
			<a href="orderfood.php">點餐系統</a>
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
			<div class="content1">
				<?php
					include("connect.php");
					
					$account=$_GET["account"];
					$passwd=$_GET["passwd"];
					$cus_name=$_GET["cus_name"];
					$cus_tel=$_GET["cus_tel"];
					$cus_email=$_GET["cus_email"];
					$cus_addr=$_GET["cus_addr"];
					$sex=$_GET["sex"];

					$select_db=@mysql_select_db("ordersystem");//選擇資料庫
					if(!$select_db)
					{
						echo '<br>找不到資料庫!<br>'; 
					}
					else
					{
						$sql_query="select * from customer where account='".$account."'";
						$result=mysql_query($sql_query);

						if(mysql_num_rows($result)==1)
						{
							echo '<h1><font color=red>此帳號已被使用過，請重新輸入</font></h1>';
							echo '<h2>三秒後將為您導引至註冊頁面</h2>';
							header("Refresh:3;url=register.php");
						}
						
						else
						{
							$sql_query="select * from customer";
							$result=mysql_query($sql_query);
							$cus_no=mysql_num_rows($result);

							$cus_no++;
							$sql_query="INSERT INTO customer VALUES('".$cus_no."','".$account."','".$passwd."','".$cus_name."','".$cus_tel."','".$cus_email."','".$cus_addr."','".$sex."')";//下sql語法
							mysql_query($sql_query);//執行sql語法
							

							echo '<h1>會員註冊成功</h1>';

							echo '<h2>三秒後將為您導引至首頁</h2>';
							header("Refresh:3;url=home.php");
					
							
						}
						
					}
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