<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
    <title>修改成功</title>
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
                <a href="menu.php">Menu</a>
                <a href="orderfood.php">點餐系統</a>
                <a href="register.php">會員註冊</a>
            </div>
        </div>

        <div class="content">
            <h1>修改成功</h1>
            <div class="content1">
                <?php
                    session_start();
                    $cus_account=$_SESSION['cus_login'];

                    $passwd=$_GET["passwd"];
                    $name=$_GET["name"];
                    $tel=$_GET["tel"];
                    $email=$_GET["email"];
                    $address=$_GET["address"];
                    $sex=$_GET["sex"];

                    include("connect.php");
                    $select_db=@mysql_select_db("ordersystem");//選擇資料庫
                    if(!$select_db)
                    {
                        echo '<br>找不到資料庫!<br>'; 
                    }
                    else
                    {                
                        $sql_query="update customer set passwd='".$passwd."',customer_name='".$name."',tel='".$tel."',email='".$email."',address='".$address."',sex='".$sex."' where account ='".$cus_account."'";
                        mysql_query($sql_query);
                                
                        $sql_query="select * from customer where account='".$cus_account."'";
                        $result=mysql_query($sql_query);
                        $row=mysql_fetch_array($result);
                        ?>
                        <table>
                            <tr>
                            <td align="right">帳號:</td>
                            <td align="left"><font color=black><? echo $row[1] ?></font></td>
                            </tr>

                            <tr>
                            <td align="right">密碼:</td>
                            <td align="left"><font color=black><? echo $row[2] ?></font></td>
                            </tr>

                            <tr>
                            <td align="right">姓名:</td>
                            <td align="left"><font color=black><? echo $row[3] ?></font></td>
                            </tr>
                            
                            <tr>
                            <td align="right">電話:</td>
                            <td align="left"><font color=black><? echo $row[4] ?></font></td>
                            </tr>
                            
                            <tr>
                            <td align="right">電子郵件:</td>
                            <td align="left"><font color=black><? echo $row[5] ?></font></td>
                            </tr>
                            
                            <tr>
                            <td align="right">地址:</td>
                            <td align="left"><font color=black><? echo $row[6] ?></font></td>
                            </tr>

                            <tr>
                            <td align="right">性別:</td>
                            <td align="left"><font color=black><? echo $row[7] ?></font></td>
                             </tr>
                        </table>
                    <?
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
