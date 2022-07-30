<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New</title>
</head>
<body>
	<form action="./" method="POST" enctype="multipart/form-data" accept=".jpg,.png">
		<input type="text" name="name">
		<input type="text" name="province">
		<input type="text" name="duration">
		<input type="text" name="price">
		<input type="file" name="photo">
		<input type="text" name="description">
		<input type="submit" name="addnew">
	</form>
</body>
</html>