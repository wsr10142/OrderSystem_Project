<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <title>訂單成立</title>
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
            <h1>訂單成立</h1>
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
                    echo '<h2>親愛的'.$cus_name.'，你好!</h2>';
                    echo '<h2>您的訂單已成立</h2>';

                    $sql_query="select name,amount,price from shopping_cart natural join item";
                    $result=mysql_query($sql_query);

                    $total_sum=0;

                    echo'<table class="payInfo">';
                    echo'<tr>';
                    echo'<td>餐點品名</td>';
                    echo'<td>餐點數量</td>';
                    echo'<td>餐點單價</td>';
                    echo'</tr>';
                
                    while($row=mysql_fetch_array($result))
                    {
                        echo '<tr>';
                        echo '<td>'.$row[0].'</td>';
                        echo '<td>'.$row[1].'</td>';
                        echo '<td>'.$row[2].'元</td>';
                        echo '</tr>';
                        $total_sum=$total_sum+($row[1]*$row[2]);
                    }
                    echo'</table>';
                    
                    $total_sum=$total_sum*0.9;
                    echo'<h2>餐點合計 '.$total_sum.'元</h2>';

                    $sql_query="select * from receipt";
                    $result=mysql_query($sql_query);
                    $receipt_no=mysql_num_rows($result);
                    $receipt_no++;

                    $sql_query="INSERT INTO receipt VALUES('".$receipt_no."','準備中','".$total_sum."','現金','".$cus_id."','成立')";
                    $result=mysql_query($sql_query);
                    
                    $sql_query="select * from shopping_cart";
                    $result=mysql_query($sql_query);
                    while($row=mysql_fetch_row($result))
                    {
                        $sql_query="INSERT INTO orderlist VALUES('".$receipt_no."','".$row[0]."','".$row[1]."')";
                        $result1=mysql_query($sql_query);
                    }
                    $sql_query="truncate table shopping_cart";
                    $result=mysql_query($sql_query);

                    header("refresh:10;url=home.php");
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