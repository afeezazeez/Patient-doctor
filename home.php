<?php
if (isset($_SESSION['admin_id'])) {
	echo "<script>window.location='adminhome.php'</script>";
}

elseif (isset($_SESSION['doctor_id'])) {
		echo "<script>window.location='doctorhome.php'</script>";

}

else{
		echo "<script>window.location='patienthome.php'</script>";

}
?>