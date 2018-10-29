<?php

ini_set("session.bug_compat_warn" , "on");

session_start();

require("cd_db.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />

<?php

$uid=htmlspecialchars(trim($_POST['uid']));

$rank=htmlspecialchars(trim($_POST['rank']));

$pwd=htmlspecialchars(trim($_POST['pass']));

mysql_query("SET NAMES cp1256");

$result = mysql_query("SELECT * FROM users where name='".$uid."' && rank='".$rank."' && password='".$pwd."'",$conn)or die(mysql_error());

if(mysql_num_rows($result) > 0)

{

	$row = mysql_fetch_array($result);

		if($row['status'] == 1)

			{ 

				if(session_is_registered("usr_id"))

				{

					session_unregister("usr_id");

					$_SESSION = array();

					session_destroy();

					echo "<script>alert('لا يمكنك الولوج مرتين');window.location='../../index.php'</script>;";

				}

				else

				{

					$_SESSION['usr_id']=$row['id'];

					$_SESSION['usr_name']=$row['name'];

					$_SESSION['usr_branch']=$row['branch'];

					$_SESSION['usr_type']=$row['type'];
					$_a=$row['type'];
					$_a2==$row['branch'];
					
					if($_SESSION['usr_type']==1)

					{

						echo "<script>window.location='admin_page.php?alert=1'</script>";

					}

					elseif($_SESSION['usr_type']==2)

					{

						echo "<script>window.location='user_page.php?alert=1'</script>";

					}

					elseif($_SESSION['usr_type']==3)

					{

						echo "<script>window.location='moftesh_page.php?alert=1'</script>";

					}

					elseif($_SESSION['usr_type']==4)

					{

						echo "<script>window.location='manger_page.php?alert=1'</script>";

					}

					elseif($_a['usr_type']==5)

					{

						echo "<script>window.location='counter_page.php'</script>";

					}

				}	

			}

		else

			{ 

				echo "<script>alert('عفوا غير مصرح لك بالدخول من قبل الإدارة');window.location='../../index.php'</script>;";

			}







}

else

{ 

	echo "<script>alert('بياناتك خاطئة');window.location='../../index.php'</script>;";

}

mysql_close($conn);

?>