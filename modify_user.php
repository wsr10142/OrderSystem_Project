<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
        <title>修改基本資料</title>
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
                <div class="contnet1">
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
                            ?>
                                <form method="get" action="modify_success.php">
                            <?
                                $sql_query="select * from customer where account='".$cus_account."'";
                                $result=mysql_query($sql_query);
                                $row=mysql_fetch_array($result);
                                ?>
                                <table>
                                    <tr>
                                        <td align="right"><font size="5px">帳號:</font></td>
                                        <td align="left"><font color=black size="5px"><? echo $cus_account ?></font></td>
                                    </tr>

                                    <tr>
                                        <td align="right"><font size="5px">密碼:</font></td>
                                        <td align="left"><font size="5px"><input type="text"  maxLength="10" name="passwd" value="<? echo $row[2] ?>"></font></td>
                                    </tr>

                                    <tr>
                                        <td align="right"><font size="5px">名字:</font></td>
                                        <td align="left"><font size="5px"><input type=text maxLength="10" name="name" value="<? echo $row[3] ?>"></font></td>
                                    </tr>
                                
                                    <tr>
                                        <td align="right"><font size="5px">性別:</font></td>
                                        <td align="left"><font size="5px">
                                            <?php
                                                if(strcmp($row[7],"男")==0)
                                                {
                                                    $sex_check='checked';
                                                }
                                                else
                                                {
                                                    $sex_check='';
                                                }
                                            ?>
                                            <input value="男" type="radio" name="sex"<? echo $sex_check ?>>男
                                            <?
                                                if(strcmp($row[7],"女")==0)
                                                {
                                                    $sex_check='checked';
                                                }
                                                else
                                                {
                                                    $sex_check='';
                                                }
                                            ?>
                                            <input value="女"type="radio"name="sex" <? echo $sex_check ?>>女
                                            </font></td>
                                    </tr>

                                    <tr>
                                        <td align="right"><font size="5px">電話:</font></td>
                                        <td align="left"><font size="5px"><input type=text maxLength="10"name="tel" value="<? echo $row[4] ?>"></font></td>
                                    </tr>

                                    <tr>
                                        <td align="right"><font size="5px">電子郵件:</font></td>
                                        <td align="left"><font size="5px"><input type=text maxLength="30"name="email" value="<? echo $row[5] ?>"></font></td>
                                    </tr>

                                    <tr>
                                        <td align="right"><font size="5px">地址:</font></td>
                                        <td align="left"><font size="5px"><input type=text maxLength="30"name="address" value="<? echo $row[6] ?>"></font></td>
                                    </tr>
                                </table>
                                <input value="送出" type="submit" style="font-size:1.2rem;font-weight:sticky;color:white;text-align:center;background-color:#91B493;width:50px;height:40px;">
                                </form>
                        
                        <? } ?>
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