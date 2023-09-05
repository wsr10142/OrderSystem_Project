<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<title>管理員介面</title>
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
				$sql_query="select * from employee where account='".$_SESSION['admin_login']."'";
				$result=mysql_query($sql_query);
				
				if(mysql_num_rows($result)!=0)
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
			<a href="admininfo.php?choose=1">未結單之訂單</a>
			<a href="admininfo.php?choose=2">更改訂單狀態</a>
			<a href="editmenu.php?">編輯菜單</a>
            </div>
         </div>

         <div class="content">
            <div class="content1">
<?php
    $account=$_SESSION["admin_login"];
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
            $sql_query="select receipt_no,customer_name,tel,total_price,pay_way from receipt natural join customer where receipt_status='準備中'";
            $result=mysql_query($sql_query);

            echo'<table class="payInfo">';
            echo'<tr>';
            echo'<td>訂單編號</td>';
            echo'<td>顧客名稱</td>';
            echo'<td>聯絡方式</td>';
            echo'<td>總金額</td>';
            echo'<td>付款方式</td>';
            echo'<td>明細</td>';
            echo'</tr>';
        
            while($row=mysql_fetch_array($result))
            {
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>';
                ?>
                <a href="orderlist.php?choose=1 & receipt_no=<? echo $row[0] ?>">查看</a>
                <?
                echo'</td>';
                echo'</tr>';
            }
            echo'</table>';
        }
        else if($choose==2)
        {
            $sql="select receipt_no from receipt where receipt_status ='準備中'";
            $result=mysql_query($sql);
            
            echo '<center>';
            echo '<table border=1>';
            echo '<tr>';
            echo '<td>訂單編號</th>';
            echo '</tr>';

            while($row=mysql_fetch_row($result))
            {	
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>';
                ?>
                <a href="modify_status.php?modify=<? echo $row[0] ?>">修改為完成</a>
                <?
                echo '</tr>';
            }
            echo '</table>';
            ?>

            <?
        }
    }
?>            </div>
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
