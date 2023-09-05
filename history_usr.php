<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>訂單查詢</title>
        <style>
        <?php
                 session_start();
                 ob_start();
                 include"home.css"; ?>
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
            <h1>訂單紀錄</h1>
            <div class="content1">
                <?php
                    session_start();
                    $cus_account=$_SESSION['cus_login'];

                    include("connect.php");

                    $select_db=@mysql_select_db("ordersystem");//選擇資料庫
                    if(!$select_db)
                    {
                    echo '<br>找不到資料庫!<br>'; 
                    }
                    else
                    {
                        $sql_query="select customer_id,customer_name from customer where account='".$cus_account."'";
                        $result=mysql_query($sql_query);
                        while($row=mysql_fetch_array($result))
                        {
                            $cus_id=$row[0];
                            $cus_name=$row[1];
                        }

                        $sql_query="select receipt_no,total_price,pay_way,receipt_status from receipt where customer_id='".$cus_id."'";
                        $result=mysql_query($sql_query);

                        echo'<table class="payInfo">';
                        echo'<tr>';
                        echo'<td>訂單編號</td>';
                        echo'<td>總價格</td>';
                        echo'<td>付款方式</td>';
                        echo'<td>訂單狀態</td>';
                        echo'<td>明細</td>';
                        echo'</tr>';
                    
                        while($row=mysql_fetch_array($result))
                        {
                            echo '<tr>';
                            echo '<td>'.$row[0].'</td>';
                            echo '<td>'.$row[1].'元</td>';
                            echo '<td>'.$row[2].'</td>';
                            echo '<td>'.$row[3].'</td>';
                            echo '<td>';
                            ?>
                            <a href="orderlist.php?receipt_no=<? echo $row[0] ?>">查看</a>
                            <?
                            echo'</td>';
                            echo'</tr>';
                        }
                        echo'</table>';
                    }
                ?>
                <a class="back" href="userinfo.php">back</a>

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