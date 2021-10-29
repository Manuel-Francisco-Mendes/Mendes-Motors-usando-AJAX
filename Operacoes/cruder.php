<?php
include 'baseDeDados.php';
//Inserir
if(count($_POST)>0){
	if($_POST['type']==1){
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$sql = "INSERT INTO `cars`( `marca`, `modelo`) 
		VALUES ('$marca','$modelo')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
//Actualizar
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$sql = "UPDATE `cars` SET `marca`='$marca',`modelo`='$modelo' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `cars` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
//Remover
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['id'];
		$sql = "DELETE FROM cars WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>