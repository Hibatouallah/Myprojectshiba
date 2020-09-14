<?php





?>

<!DOCTYPE html>
<html>
<head>
	<title> TPcss ex2</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form >
		
		<fieldset>
		<legend><b>Ajouter Rendez vous:</b></legend>
		 <table class="test">
		 	<tr class="separated">
		 		<td><label> Date rendez-vous <font color="red">*</font></label></td>
                <td><input type="date" name="daterendez" required></td>
		 	</tr>
		 	
		 	<tr class="separated">
				<td><label>Description<font color="red">*</font></label></td>
				<td><input type="text" name="description" required></td>
			</tr>
			
			<tr class="separated">
				<td><label>heure rendez vous <font color="red">*</font></label></td>
				<td><input type="text" name="heurerendezvous"  required ></td>
		    </tr>
		    <tr class="separated">
				<td><label>nom patient<font color="red">*</font></label></td>
				<td><input type="text" name="nompatient"  required ></td>
			</tr>
			<tr class="separated">
				<td><label>Prenom patient<font color="red">*</font></label></td>
				<td><input type="text" name="prenompatient"  required></td>
			</tr>
			<tr class="separated">
				<td><label>CIN  patient<font color="red">*</font></label></td>
				<td><input type="text" name="cinpatient"  required></td>
			</tr>

			<tr class="separated">
			
				<td colspan="2"><center><input type="submit" name="submit" required><input type="reset" name="reset" required></center></td>
			</tr>
			
		 </table>
		 </fieldset>
		
</body>
</html>