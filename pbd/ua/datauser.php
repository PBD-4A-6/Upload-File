<html>
<head>
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
	<div class="wrap">
		
		<nav class="menu">
			<ul>
				<li>
					<a href="halaman_admin.php">Home</a>
				</li>
				<li>
					<a href="dataprodi.php">PRODI</a>
				</li>
				<li>
					<a href="datauser.php">USER</a>
				</li>

			</ul>
		</nav>
		<aside class="sidebar">
			<div class="widget">
				<h2>Keterangan Login</h2>
				<p>
    			<?php echo "Welcome " . $_SESSION['username'] . " | <a href=sistem.php?op=out>LOG Out</a>"; ?>
				</p>

				<h2>Sebagai</h2>
				<p><?php
   					 if ($_SESSION['jenisuser'] == '0') {
   					     $ju = 'User-Client';
 				   } else {
     					 $ju = 'User-Admin';
   					}
   					 echo $ju . '<hr>';
   					 ?></p>
			</div>
			
					</aside>
		<div class="blog">
			<div class="conteudo">
				<div class="post-info">
					Di Posting Oleh <b>Admin</b>
				</div>
<?php
require("koneksi.php");

$hub = open_connection();
$a = @$_GET["a"];
$id = @$_GET["id"];
$sql = @$_POST["sql"];
switch ($sql) {
	case 'create':
		# code...
	create_prodi();
		break;
	case 'update':
		# code...
	update_prodi();
		break;
	case 'delete':
		# code...
	delete_prodi();
		break;
	}
	switch ($a) {
		case 'list':
			# code...
		read_data();
			break;

		case 'input':
			# code...
		input_data();
			break;

		case 'edit':
				# code...
		edit_data($id);
			break;
			
		case 'delete':
				# code...
		delete_data($id);
			break;
		default:
			# code...
		read_data();
			break;
	}
mysqli_close($hub);
?>


<?php
function read_data()
{
	global $hub;
	$query = "select * from  user";
	$result = mysqli_query($hub, $query);?>

	<h2>Daftar Data User</h2>
	<table border="1" cellpadding="2" class="table1">
	
	<button><a href="datauser.php?a=input">INPUT</a></button>
	<br><br>
		<tr class="re">
			<td>ID USER</td>
			<td>USERNAME</td>
			<td>PASSWORD</td>
			<td>JENIS USER</td>
			<td>LEVEL</td>
			<td>STATUS</td>
			<td>ID PRODI</td>
			<TD>AKSI</TD>
		</tr>

<?php while ($row=mysqli_fetch_array($result)) {?>
	<tr>
	<td><?php echo $row['iduser'];?></td>
	<td><?php echo $row['username'];?></td>
	<td><?php echo $row['password'];?></td>
	<td><?php echo $row['jenisuser'];?></td>
	<td><?php echo $row['level'];?></td>
	<td><?php echo $row['status'];?></td>
	<td><?php echo $row['idprodi'];?></td>
	<td>
		<BUTTON><a href="datauser.php?a=edit&id=<?php echo $row['iduser'];?>">EDIT</a></BUTTON>
		<BUTTON><a href="datauser.php?a=delete&id=<?php echo $row['iduser'];?>">HAPUS</a></BUTTON>
	</td>
	</tr>

	<?php } ?>
	</table>
	<?php } ?>

<?php
function input_data() {
	$row = array(
		"username"=> "",
		"password"=> "",
		"jenisuser"=> "",
		"level"=> "",
		"status"=> "",
		"idprodi"=> "-"
		); ?>

<h2>Input Data User</h2>
<form action="datauser.php?a=list" method="post">
<input type="hidden" name="sql" value="create">
USERNAME
<br>
<input type="text" name="username" maxlength="15" size="15" value="<?php echo trim($row["username"]); ?>"/>
<br>
<br>
PASSWORD
<br>
<input type="password" name="password" maxlength="15" size="15" value="<?php echo trim($row["password"]); ?>"/>
<br><br>
JENIS USER
<br>
<input type="radio" name="jenisuser" value="0"
<?php if ($row["jenisuser"]=='0' || $row["jenisuser"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >0

<input type="radio" name="jenisuser" value="1"
<?php if ($row["jenisuser"]=='1'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >1
<br><br>

LEVEL
<br>
<input type="radio" name="level" value="00"
<?php if ($row["level"]=='00' || $row["level"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >00

<input type="radio" name="level" value="10"
<?php if ($row["level"]=='10'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >10

<input type="radio" name="level" value="11"
<?php if ($row["level"]=='11'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >11
<br><br>

STATUS
<br>
<input type="radio" name="status" value="F"
<?php if ($row["status"]=='F' || $row["status"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >F

<input type="radio" name="status" value="T"
<?php if ($row["status"]=='T'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >T
<br><br>

ID Prodi
<br>
<input type="text" name="idprodi" maxlength="15" size="15" value="<?php echo trim($row["idprodi"]); ?>"/>
<br><br>

<input type="submit" name="action" value="simpan">
<button><a href="datauser.php?a=list">Batal</a></button>
</form>

<?php } ?>

<?php
function edit_data($id){
global $hub;
$query = "select * from user where iduser = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>


<h2>Edit Data User</h2>
<form action="datauser.php?a=list" method="post">
<input type="hidden" name="sql" value="update">
<input type="hidden" name="iduser" value="<?php echo trim($id);?>">
USERNAME
<br>
<input type="text" name="username" maxlength="15" size="15" value="<?php echo trim($row["username"]); ?>"/>
<br>
<br>
PASSWORD
<br>
<input type="password" name="password" maxlength="15" size="15" value="<?php echo trim($row["password"]); ?>"/>
<br><br>
JENIS USER
<br>
<input type="radio" name="jenisuser" value="0"
<?php if ($row["jenisuser"]=='0' || $row["jenisuser"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >0

<input type="radio" name="jenisuser" value="1"
<?php if ($row["jenisuser"]=='1'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >1
<br><br>

LEVEL
<br>
<input type="radio" name="level" value="00"
<?php if ($row["level"]=='00' || $row["level"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >00

<input type="radio" name="level" value="10"
<?php if ($row["level"]=='10'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >10

<input type="radio" name="level" value="11"
<?php if ($row["level"]=='11'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >11
<br><br>

STATUS
<br>
<input type="radio" name="status" value="F"
<?php if ($row["status"]=='F' || $row["status"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >F

<input type="radio" name="status" value="T"
<?php if ($row["status"]=='T'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >T
<br><br>

ID Prodi
<br>
<input type="text" name="idprodi" maxlength="15" size="15" value="<?php echo trim($row["idprodi"]); ?>"/>
<br><br>

<input type="submit" name="action" value="simpan">
<button><a href="datauser.php?a=list">Batal</a></button>
</form>



<?php } ?>

<?php
function delete_data($id){
global $hub;
$query = "select * from user where iduser = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>
<h2>Hapus Data User</h2>
<form action="datauser.php?a=list" method="post">
<input type="hidden" name="sql" value="delete">
<input type="hidden" name="iduser" value="<?php echo trim($id)?>">
<table border="1" cellpadding="2" class="table1">
	<tr>
		<td>ID USER</td>
		<td>USERNAME</td>
		<td>PASSWORD</td>
		<td>JENIS USER</td>
		<td>LEVEL</td>
		<td>STATUS</td>
		<td>ID PRODI</td>
	</tr>
	<tr>
		<td><?php echo $row['iduser'];?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['password'];?></td>
		<td><?php echo $row['jenisuser'];?></td>
		<td><?php echo $row['level'];?></td>
		<td><?php echo $row['status'];?></td>
		<td><?php echo $row['idprodi'];?></td>
	</tr>
</table>
	
	
<br>

<input type="submit" name="action" value="Delete">
<BUTTON><a href="datauser.php?a=list">Batal</a></BUTTON>

</form>

<?php } ?>





<?php
function create_prodi()
{
global $hub;
global $_POST;
$query = "insert into user (iduser,username,password,jenisuser,level,status,idprodi) values";
$query.="('".$_POST["iduser"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["jenisuser"]."','".$_POST["level"]."','".$_POST["status"]."','".$_POST["idprodi"]."')";

mysqli_query($hub, $query) or die(mysql_error());
}
?>


<?php
function update_prodi(){
	global $hub;
	global $_POST;
	$query = "update user";
	$query .=" SET iduser='" .$_POST["iduser"]."', username='".$_POST["username"]."', password='".$_POST["password"]."', jenisuser='".$_POST["jenisuser"]."', level='".$_POST["level"]."', status='".$_POST["status"]."', idprodi='".$_POST["idprodi"]."'";
	$query .= " where iduser = ".$_POST["iduser"];

mysqli_query($hub, $query) or die(mysql_error());
}
?>

<?php
function delete_prodi(){
	global $hub;
	global $_POST;
	$query = " delete from user";
	$query .= " where iduser = ".$_POST["iduser"];

mysqli_query($hub, $query) or die(mysql_error());
}
?>
					
			</div>
		
		</div>
	</div>
 
</body>
</html>


