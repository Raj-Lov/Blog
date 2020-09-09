<link rel="icon" href="img/Fevicon.png" type="image/png">

<link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

<link rel="stylesheet" href="css/style.css">

<?php
    $query = "SELECT * FROM tbl_themes WHERE id = '1' ";
    $get_themes = $dbObj->select($query);
    while ($result = $get_themes->fetch_assoc()) {
    	if($result['themes'] == 'default'){
    		echo "<link rel='stylesheet' href='themes/default.css' />";
    	}
    	else if($result['themes'] == 'red'){
    		echo "<link rel='stylesheet' href='themes/red.css' />";
    	}
    	else if($result['themes'] == 'green'){
    		echo "<link rel='stylesheet' href='themes/green.css' />";
    	}
	}

?>
       
