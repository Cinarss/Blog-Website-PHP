<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/admin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="warp">
Monotone Admin Login CSS
  <form  action="../admin/process.php" id="formu" method="POST">
    	<div class="admin">
			      <div class="rota">
				        <h1>ADMIN</h1>
        				<input id="username" type="text" name="user_mail" value="" placeholder="Mail"/><br />
				        <input id="password" type="password" name="user_password" value="" placeholder="Password"/>
      			</div>
    		</div>
    		<div class="cms">
      			<div class="roti">
			        	<h1>CMS</h1>
				        <button id="valid" type="submit" name="adminlogin">Valid</button><br />
      </div>
    		</div>
  	</form>
</div>
<script>
$("#valid").click(function() {
  $(".admin").addClass("up").delay( 100 ).fadeOut( 100 );
  $(".cms").addClass("down").delay( 150 ).fadeOut( 100 );
});

</script>
</body>
</html>