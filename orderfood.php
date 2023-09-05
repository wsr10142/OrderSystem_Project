<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>點餐系統</title>
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
                    $flag=1;
					?>
					<a class="login" href="login.php">Login</a></h1>
					<?
				}
				else
				{
                    $flag=0;
					?>
                    <a class="login" href="userinfo.php">Hi!</a>
                    <a class="login" href="home.php?logout=1">Logout</a>
                    <a class="login" href="pay.php">付款</a></h1>
                    <?
				}
			?>
		</header>
        
        <?php
        if($flag==0)
        {
            ?>
        
            <div class="content">
            <div class="selectMenu">
                <a href="orderfood.php?choose=1">麵包</a>
                <a href="orderfood.php?choose=2">糕點</a>
                <a href="orderfood.php?choose=3">輕食</a>
                <a href="orderfood.php?choose=4">茶瓦納</a>
                <a href="orderfood.php?choose=5">天冰樂</a>
            </div>

            <div class="content1">
                <?php

                    $cus_account=$_SESSION['cus_login'];
                    
                    include("connect.php");
                    $select_db=@mysql_select_db("ordersystem");//選擇資料庫
                    if(!$select_db)
                    {
                        echo '<br>找不到資料庫!<br>'; 
                    }
                    else
                    {
                        $sql_query="select * from item";
                        $result=mysql_query($sql_query);

                        if(mysql_num_rows($result)==0)
                        {
                            echo '<br>本日餐點已售完!<br>'; 
                        }
                        else
                        {
                            $choose=$_GET["choose"];
                            if($choose==1)
                            {
                                $sql_query="select * from item where food_type='dessert'";
                                $result=mysql_query($sql_query);
                                echo '<table class="foodPic">';
                                echo '<tr>';
                                $cnt=1;
                                while($row=mysql_fetch_row($result))
                                {
                                    if($cnt==5)
                                    {
                                        $cnt=0;
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=1&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                        echo'</tr>';
                                        echo'<tr>';
                                    }
                                    else
                                    {
                                      
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=1&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                    }
                                    $cnt++;
                                }
                                echo'</table>';

                            }
                            else if($choose==2)
                            {
                                $sql_query="select * from item where food_type='cake'";
                                $result=mysql_query($sql_query);
                                echo '<table class="foodPic">';
                                echo '<tr>';
                                $cnt=1;
                                while($row=mysql_fetch_row($result))
                                {
                                    if($cnt==5)
                                    {
                                        $cnt=0;
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=2&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                        echo'</tr>';
                                        echo'<tr>';
                                    }
                                    else
                                    {
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=2&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                    }
                                    $cnt++;
                                }
                                echo'</table>';

                            }
                            else if($choose==3)
                            {
                                $sql_query="select * from item where food_type='lightfood'";
                                $result=mysql_query($sql_query);
                                echo '<table class="foodPic">';
                                echo '<tr>';
                                $cnt=1;
                                while($row=mysql_fetch_row($result))
                                {
                                    if($cnt==5)
                                    {
                                        $cnt=0;
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=3&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                        echo'</tr>';
                                        echo'<tr>';
                                    }
                                    else
                                    {
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=3&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                    }
                                    $cnt++;
                                }
                                echo'</table>';

                            }
                            else if($choose==4)
                            {
                                $sql_query="select * from item where food_type='tea'";
                                $result=mysql_query($sql_query);
                                echo '<table class="foodPic">';
                                echo '<tr>';
                                $cnt=1;
                                while($row=mysql_fetch_row($result))
                                {
                                    if($cnt==5)
                                    {
                                        $cnt=0;
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=4&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                        echo'</tr>';
                                        echo'<tr>';
                                    }
                                    else
                                    {
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=4&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                    }
                                    $cnt++;
                                }
                                echo'</table>';

                            }
                            else if($choose==5)
                            {
                                $sql_query="select * from item where food_type='frappuccino'";
                                $result=mysql_query($sql_query);
                                echo '<table class="foodPic">';
                                echo '<tr>';
                                $cnt=1;
                                while($row=mysql_fetch_row($result))
                                {
                                    if($cnt==5)
                                    {
                                        $cnt=0;
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=5&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                        echo'</tr>';
                                        echo'<tr>';
                                    }
                                    else
                                    {
                                        echo'<td><img src=../ordersystem/food/'.$row[4].'><br>'.$row[1];
                                        echo '<br>'.$row[2].'元<br>';
                                        ?>
                                        <a href="orderfood.php?choose=5&item_no=<?echo $row[0]?>">加入購物車</a>
                                        <?
                                    }
                                    $cnt++;
                                }
                                echo'</table>';

                            }
                        }
                    }
                ?>
                <?php
                    include("connect.php");

                    $item_no=$_GET["item_no"];

                    $select_db=@mysql_select_db("ordersystem");//選擇資料庫
                    if(!$select_db)
                    {
                        echo '<br>找不到資料庫!<br>'; 
                    }
                    else
                    {
                        $sql_query="select * from shopping_cart";
                        $result=mysql_query($sql_query);

                        if(mysql_num_rows($result)==0)//第一次新增商品
                        {
                            
                            $item_amount=1;
                            $sql_query="INSERT INTO shopping_cart VALUES('".$item_no."','".$item_amount."')";
                            $result=mysql_query($sql_query);
                        }
                        else if(mysql_num_rows($result)>=1)
                        {
                            $sql_query="select * from shopping_cart where item_no='".$item_no."'";
                            $result=mysql_query($sql_query);

                            if(mysql_num_rows($result)==1)//表示有買過該商品
                            {
                                $row=mysql_fetch_row($result);
                                $new_amount=$row[1];
                                $new_amount++;
                                $sql_query="update shopping_cart set amount='".$new_amount."' where item_no='".$row[0]."'";
                                $result=mysql_query($sql_query);
                            }
                            else if(mysql_num_rows($result)==0)//表示還沒買過該商品
                            {
                                $item_amount=1;
                                $sql_query="INSERT INTO shopping_cart VALUES('".$item_no."','".$item_amount."')";
                                $result=mysql_query($sql_query);
                            }
                        }
                    }

                ?>
            </div>
        </div>

            <?
        }
        else
        {
            ?>
            <div class="box">
                <div class="wrap">
                
                    <a href="menu.php?choose=1">Menu</a>
                    <a href="orderfood.php?choose=1">點餐系統</a>
                    <a href="register.php">會員註冊</a>
                    
                </div>
		    </div>

            <div class="content">
                <div class="content1">
                    <h1>需登入可進行點餐</h1>
                </div>
            </div>
            <?
        }
        ?>

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