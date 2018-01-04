<h2>Create Student</h2>
<hr>

{{ content() }}

{{ form('student/create', 'method' : 'post') }}

<div class="row">
    <div class="form-group col-sm-6">
        {{ studentForm.label('firstname') }}
        {{ studentForm.render('firstname', ['class' : 'form-control']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ studentForm.label('lastname') }}
        {{ studentForm.render('lastname', ['class' : 'form-control']) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {{ studentForm.label('age') }}
        {{ studentForm.render('age', ['class' : 'form-control']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ studentForm.label('section_id') }}
        {{ studentForm.render('section_id', ['class' : 'form-control']) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {{ studentForm.label('address') }}
        {{ studentForm.render('address', ['class' : 'form-control']) }}
    </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
		{{ link_to('student', '<i class="fa fa-arrow-left"></i> Cancel', 'class' : 'btn btn-danger') }}
	</div>
</div>

{{ end_form() }}