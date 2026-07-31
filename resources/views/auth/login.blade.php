<style>
	* {
		box-sizing: border-box;
		font-family: sans-serif;
	}


	html, body {
		font-family: sans-serif;
		font-size: 100%;
	}

	html, body, .wrapper, .sct {
		height: 100%;
		margin: 0;
	}

	a {
		text-decoration: none;
		color: rgb(22, 185, 185);
	}

	h1 {
		font-size: 6rem;
	}

	h2 {
		font-size: 3rem;
	}

	h3 {
		font-size: 2rem;
	}

	h1,h2,h3,h4,h5,h6 {
		font-weight: 400;
		color: #2d2d2d;
		text-align: center;
	}

	input:active,
	input:focus,
	input:visited,
	input:hover {
		outline: none;
	}

	input[type="text"],
	input[type="email"],
	input[type="number"],
	input[type="password"]
	{
		display: block;
		width: 100%;
		margin-bottom: 1rem;
		padding: 1rem 1.6rem;
		background: #fff;
		border: 1px solid rgb(212, 212, 212);
		font-family: sans-serif;
		/*font-size: 1rem;*/
		font-weight: 400;
		color: rgb(78, 78, 78);
		border-radius: 5px;
		box-shadow: none;
		transition: all .3s;
	}

	input[type="submit"] {
		display: block;
		width: auto;
		margin: .2rem 0;
		padding: 1rem 3rem;
		background: rgb(31, 106, 167);
		border: 1px solid rgb(212, 212, 212);
		font-family: sans-serif;
		font-weight: 600;
		text-transform: uppercase;
		color: rgb(247, 247, 247);
		border-radius: 5px;
		box-shadow: none;
		transition: all .3s;
	}

	input[type="submit"]:active,
	input[type="submit"]:focus,
	input[type="submit"]:visited,
	input[type="submit"]:hover {
		background: rgb(34, 156, 255);
	}

	button,input[type="submit"] {
		cursor: pointer;
	}

	.text-center {
		text-align: center;
	}



	.forgot-remember {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.forgot-remember .forgot a {
	color: #666;
	}

	.wrapper {
		display: grid;
		grid-template-columns: 450px 1fr;
		grid-template-rows: auto;
		grid-template-areas: "centerLeft centerRight";
	}

	.sct {
		display: flex;
		align-items: flex-start;
		justify-content: center;
	}

	.brands {
		grid-area: centerRight;
		background-color: #999;
		background-image: url("assets/img/img_login.jpg");
		background-size: cover;
	}

	.left-column-wrapper {
	display: flex;
	flex-direction: column;
	width: 100%;  
	}

	.left-column-wrapper form {
	padding: 0 3rem;
	}

	.left-column-wrapper form > h3 {
		text-align: left;
		font-size: 2.5rem;
		color: rgb(31, 106, 167);
	}

	.top-bar{
		background: rgb(31, 106, 167);
		display: flex;
		align-items: center;
		flex-direction: flex-start;
		height: 80px;
		width: 100%;
		color: #fff;
	
		padding-left: 2rem;
		margin-bottom: 2rem; 
	}

	.top-bar img {
		margin-right: 1rem; 
	}


	.login {
		grid-area: centerLeft;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.footer-wrapper {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
	padding-bottom: 3rem;
	}


	@media (max-width: 1000px) {
		.wrapper {
		display: grid;
		grid-template-columns: 1fr;
		}

		.brands {
		display: none;
		}

		.login > form {
			width: 100%;
			margin: 0 3rem;
		}
	}
</style>
<script src="{{ asset('js/jquery.min.js') }}"></script>
@extends('dashboard.authBase')
@section('content')
	<div class="wrapper">
		<div class="sct login">
			<div class="left-column-wrapper">
				<div class="top-bar">
					<img src="assets/img/logoal50.jpg" alt="Pronet">
					<span>GESTION DE DATOS ELECTORALES</span>
				</div>
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<h3>Iniciar Sesión</h3>
					<br>
					<br>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<svg class="c-icon">
									<use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
								</svg>
							</span>
						</div>
						<input type="text" name="usuario" value="{{ old('usuario') }}" id="usuario" class="form-control" placeholder="Usuario">
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<svg class="c-icon">
								<use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
							</svg>
							</span>
						</div>
						<input class="form-control" type="password" placeholder="{{ __('Contraseña') }}" name="password" required>
					</div>
					<div class="forgot-remember">
						<div class="forgot">
							<button type="button" class="btn btn-link px-0" data-toggle="modal" data-target="#modalRecuperoPassword">¿Olvidó su contraseña?</button>
						</div> 
						<input type="submit" name="send" value="INGRESAR">
					</div>
				</form>
			</div>
			<div class="footer-wrapper">
				<a href="#" class="logo-pronet">
					<img src="assets/img/logopronet.jpg" alt="Pronet logo">
				</a>
			</div>
		</div> 
		<div class="sct brands" />
	</div> 
@endsection


@section('javascript')

@endsection
