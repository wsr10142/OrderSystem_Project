<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <title>付款</title>
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
        <div class="content">
            <h1>付款資訊</h1>
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
                        $sql_query="select name,amount,price from shopping_cart natural join item";
                        $result=mysql_query($sql_query);

                        $total_sum=0;
                        echo'<table class="payInfo">';
                        echo'<tr>';
                        echo'<td align="center">餐點品名</td>';
                        echo'<td align="center">餐點數量</td>';
                        echo'<td align="center">餐點單價</td>';
                        echo'</tr>';
                    
                        while($row=mysql_fetch_array($result))
                        {
                            echo '<tr>';
                            echo '<td align="center">'.$row[0].'</td>';
                            echo '<td align="center">'.$row[1].'</td>';
                            echo '<td align="center">'.$row[2].'元</td>';
                            echo '</tr>';
                            $total_sum=$total_sum+($row[1]*$row[2]);
                        }
                        $total_sum=round($total_sum*0.9);//round函式為四捨五入取整數
                        echo'</table>';
                        echo'<h1>會員享有九折優惠，以下為折扣過後應付金額<br>';
                        echo'合計'.$total_sum.'元</h1>';

                    }
                ?>  

                    <a href="receipt_success.php">繼續結帳</a>
                    <a href="orderfood.php?choose=1">繼續購物</a>
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