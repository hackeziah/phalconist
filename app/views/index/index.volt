<h2>Login</h2>
<hr>

{{ content() }}

{{ form('login/authenticate', 'method' : 'post') }}

<div class="row">
    <div class="form-group col-sm-6">
    	<label>Username</label>
		{{ text_field('username', 'class' : 'form-control', 'required' : 'required') }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label>Password</label>
        {{ password_field('password', 'class' : 'form-control', 'required' : 'required') }}
    </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Login</button>
	</div>
</div>

<hr>
<p>Username: user</p>
<p>Password: passw0rd</p>

<br>
<p>Username: admin</p>
<p>Password: passw0rd</p>

{{ end_form() }}