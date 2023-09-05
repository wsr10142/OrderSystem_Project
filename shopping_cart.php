<html>
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>購物車</title>
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
            <h1>購物車</h1>
            <div class="content1">
                <?php
                    include("connect.php");

                    $select_db=@mysql_select_db("ordersystem");
                    if(!$select_db)
                    {
                        echo '<br>找不到資料庫!<br>'; 
                    }
                    else
                    {
                        $sql_query="select name,amount,price from shopping_cart natural join item";
                        $result=mysql_query($sql_query);

                        if(mysql_num_rows($result)==0)
                        {
                            echo '<h1>購物車內尚無商品</h1>';
                        }
                        else
                        {
                            $total_sum=0;
                            echo'<table>';
                            echo'<tr>';
                            echo'<td>餐點品名';
                            echo'<td>餐點數量';
                            echo'<td>餐點單價';
                            echo'<td>從購物車移除商品';
                            echo'</tr>';
                        
                            while($row=mysql_fetch_array($result))
                            {
                                echo '<tr>';
                                echo '<td>'.$row[0];
                                echo '<td>'.$row[1];
                                echo '<td>'.$row[2].'元';
                                echo '<td>';
                                ?>
                                <a href="shopping_cart.php?item_name=<? echo $row[0] ?>">移除</a>
                                <?
                                $total_sum=$total_sum+($row[1]*$row[2]);
                            }
                            echo'</table>';
                    
                            echo'<h2>餐點合計 '.$total_sum.'元(未折扣)</h2>';

                        }

                    }

                ?>
                <?php
                $item_name=$_GET["item_name"];
                
                $sql_query="select item_no from item where name='".$item_name."'";
                $result=mysql_query($sql_query);
                $item_no=mysql_fetch_array($result);

                $sql_query="delete from shopping_cart where item_no='".$item_no."'";
                $result=mysql_query($sql_query);

                include("connect.php");

                $select_db=@mysql_select_db("ordersystem");
                if(!$select_db)
                {
                    echo '<br>找不到資料庫!<br>'; 
                }
                else
                {
                    $sql_query="select name,amount,price from shopping_cart natural join item";
                    $result=mysql_query($sql_query);

                    if(mysql_num_rows($result)==0)
                    {
                        echo '<h1>購物車內尚無商品</h1>';
                    }
                    else
                    {
                        $total_sum=0;
                        echo'<table>';
                        echo'<tr>';
                        echo'<td>餐點品名';
                        echo'<td>餐點數量';
                        echo'<td>餐點單價';
                        echo'<td>從購物車移除商品';
                        echo'</tr>';
                    
                        while($row=mysql_fetch_array($result))
                        {
                            echo '<tr>';
                            echo '<td>'.$row[0];
                            echo '<td>'.$row[1];
                            echo '<td>'.$row[2].'元';
                            echo '<td>';
                            ?>
                            <a href="shopping_cart.php?item_name=<? echo $row[0] ?>">移除</a>
                            <?
                            $total_sum=$total_sum+($row[1]*$row[2]);
                        }
                        echo'</table>';
                
                        echo'<h2>餐點合計 '.$total_sum.'元(未折扣)</h2>';

                    }

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