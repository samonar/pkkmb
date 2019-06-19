<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login PKKMB</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -72px;
    width: 109px;
    height: 109px;
    border-radius: 50%;
    z-index: 9;
    /* background: #60c7c1; */
    /* padding: 15px; */
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
	.modal-login.modal-dialog {
		position: absolute;
    top: 20%; bottom: 0; left: 0; right: 0;
    margin: auto;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #0012ff;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-login .btn_dft {
        color: #fff;
        border-radius: 4px;
		background: #00a52c;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #0012ff94;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body background="<?=base_url('assets/login/bg_login1.jpg');?>" >
<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	
    <div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="<?php echo base_url()."assets/login/logo.png"; ?>" alt="Avatar">
				</div>				
				<h4 class="modal-title">Login PKKMB</h4>
				<span class="badge" style="margin-bottom: -6%;font-size:14px;margin-top: 5%;color:
				red;background-color: #c5c2c2a6;"><?php echo  $this->session->userdata('message')?></span>
                
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('login/aksi_login');?>" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<span>PKKMB Poliwangi</span>
			</div>
		</div>
</div>

</div>     
</body>
</html>                            