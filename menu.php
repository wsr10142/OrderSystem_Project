<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>Menu</title>
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
			<a href="home.php"><img src="../ordersystem/logo/logo.png" width="75" height="75"></a>
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
            <div class="selectMenu">
                <a href="menu.php?choose=1">麵包</a>
                <a href="menu.php?choose=2">糕點</a>
                <a href="menu.php?choose=3">輕食</a>
                <a href="menu.php?choose=4">茶瓦納</a>
                <a href="menu.php?choose=5">天冰樂</a>
            </div>

             <div class="content1">
                <?php
                    include("connect.php");
                    $select_db=@mysql_select_db("ordersystem");//選擇資料庫
                    if(!$select_db)
                    {
                    echo '<br>找不到資料庫!<br>'; 
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
                                    echo'</tr>';
                                    echo'<tr>';
                                }
                                else
                                {
                                    echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
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
                                    echo'</tr>';
                                    echo'<tr>';
                                }
                                else
                                {
                                    echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
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
                                    echo'</tr>';
                                    echo'<tr>';
                                }
                                else
                                {
                                    echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
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
                                    echo'</tr>';
                                    echo'<tr>';
                                }
                                else
                                {
                                    echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
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
                                    echo'</tr>';
                                    echo'<tr>';
                                }
                                else
                                {
                                    echo'<td><img src=../ordersystem/food/'.$row[4].'>'.$row[1];
                                }
                                $cnt++;
                            }
                            echo'</table>';
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