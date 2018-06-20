<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Form validation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>

	<div class="container">
		<div class="row justify-content-center my-2">
			<h5>LOGIN HERE</h5>
		</div>
		<div class="row form-group">
			<div class="col-2">
				<label for="email">Email</label>
			</div>
			<div class="col-4">
				<div class="input-group">
					<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" />	
					<span id="check_email"></span>
				</div>	
			</div>
		</div>
		<div class="row form-group">
			<div class="col-2">
				<label for="pass">Password</label>
			</div>
			<div class="col-4">
				<div class="input-group">
					<input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password" />	
					<span id="check_pass"></span>
				</div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-3">
				<button class="btn btn-primary form-control" type="button" id="btnLogin">LOGIN</button>
			</div>
		</div>

	</div>

	<script type="text/javascript">
		
		function checkEmail(mail) {
			var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			return regex.test(mail);
		}

		$('#email').change(function() {
			var mail = $('#email').val();
			if(checkEmail(mail)) {
				$('#check_email').html('&nbsp;&nbsp; <i class="fa fa-check" style="color: #1c9626"></i>');
				$('#email').css('border','1px solid #1c9626');
			}
			else {
				$('#check_email').html('&nbsp;&nbsp; <i class="fa fa-times" style="color: #e21616"></i>');
				$('#email').css('border','1px solid #e21616');	
			}
		});

		$('#pass').change(function() {
			if($('#pass').val() != "") {
				$('#check_pass').html('&nbsp;&nbsp; <i class="fa fa-check" style="color: #1c9626"></i>');
				$('#pass').css('border','1px solid #1c9626');
			}
			else {
				$('#check_pass').html('&nbsp;&nbsp; <i class="fa fa-times" style="color: #e21616"></i>');
				$('#pass').css('border','1px solid #e21616');	
			}
		});

		$('#btnLogin').click(function() {
			var valid = true;
			if($('#email').val() == "") {
				valid = false;
				$('#email').focus();
			}
			else if(!checkEmail($('#email').val())) {
				valid = false;
				$('#email').focus();
			}
			else if($('#pass').val() == "") {
				valid = false;
				$('#pass').focus();
			}

			if(valid == true) {
				alert('Login !');
			}
		});
	</script>

</body>
</html>