<html>
<head>
</head>
<body>
<?php
include __DIR__ . '/configs.php';
@session_start();
$user_check=@$_SESSION['email'];
$ses_sql = mysqli_query($restodb,"SELECT email, firstname, lastname FROM users WHERE email='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['email'];
?>
<a href="register.php">Click here</a> to register!<br>
<?php if(isset($_SESSION['email'])){ ?>
<a data-toggle="modal" href="#">
<p><span>You are logged!</span> Welcome</p></a>
<?php }else{ ?>
<a href="login.php">
<p><span>Log in</span></p>
</a>
<?php } ?>
<a href="logout.php">
<p><span>Log out</span></p>
</a>
<?php
if ($result = $restodb->query("select * from reservations order by id"))
{
if ($result->num_rows != 0)
{
$totalresults = $result->num_rows;
// The Base Table
echo '
<table id="dataTableIdResponsive" cellspacing="0" width="100%" class="display dt-responsive nowrap no-footer dtr-inline dataTable" role="grid" aria-describedby="dataTableIdResponsive_info" style="width: 100%;">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="dataTableIdResponsive" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" style="width: 8px;" aria-sort="ascending">ID</th>
<th class="sorting" tabindex="0" aria-controls="dataTableIdResponsive" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 106px;">Name</th>
<th class="sorting" tabindex="0" aria-controls="dataTableIdResponsive" rowspan="1" colspan="1" aria-label="Telephone: activate to sort column ascending" style="width: 106px;">Telephone</th>
<th class="sorting" tabindex="0" aria-controls="dataTableIdResponsive" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 106px;">Date</th>
<th class="sorting" tabindex="0" aria-controls="dataTableIdResponsive" rowspan="1" colspan="1" aria-label="Time: activate to sort column ascending" style="width: 259px;">Time</th>
</tr>
</thead>
';
{
$row = $result->fetch_row();
// Displaying the Objects from the Database
echo '
<tbody>
<tr role="row" class="odd">
<td class="sorting_1">' . $row[0] . '</td>
<td>' . $row[1] . '</td>
<td>#</td>
<td>' . $row[3] . '</td>
<td>' . $row[4] . '</td>
</tr>                      
</tbody>';
}
// Closing the Table
echo "</table>";
}
else
{
echo "No Reservations at the moment!";
}
}
// Query Error
else
{
echo "Error: " . $restodb->error;
}
echo "</span></div>";
?>
</table>
</body>
</html>