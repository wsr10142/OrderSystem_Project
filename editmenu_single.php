<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>更改商品資訊</title>
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
			<a href="admininfo.php"><img src=../ordersystem/logo/logo.png width="75" height="75"></a>
			<a href="admininfo.php">SkyBucks</a>
            <?
				include("connect.php");
				$sql_query="select * from employee where account='".$_SESSION['admin_login']."' ";
				$result=mysql_query($sql_query);
				
				if(mysql_num_rows($result)==0)
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

		 <div class="content">
			 <h1>更改商品資料</h1>
             <div class="content1">

<?php
        session_start();
        include("connect.php");

        $cus_account=$_POST["cus_account"];
        $cus_pwd=$_POST["cus_pwd"];
        
        $select_db=@mysql_select_db("ordersystem");//選擇資料庫
        if(!$select_db)
        {
            echo '<br>找不到資料庫!<br>'; 
        }
        else
        {
                $item_no=$_GET["item_no"];
                $sql_query="select name,price,img_no from item where item_no='".$item_no."'";
                $result=mysql_query($sql_query);
                $row=mysql_fetch_array($result);

                ?>
                <form method="get" action="editmenu_success.php">
                <table>
                    <tr>
                        <td><img src=../ordersystem/food/<?php echo $row[2] ?> width="350"></td>
                    </tr>
                    <tr>
                        <td><input type="text"  maxLength="10" name="name" value="<? echo $row[0] ?>"></td>
                    </tr>
                    <tr>
                    <td><input type="text"  maxLength="10" name="price" value="<? echo $row[1] ?>"></td>
                    </tr>
                </table>
                <input value="送出" type="submit">
                </form>
                <?  
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