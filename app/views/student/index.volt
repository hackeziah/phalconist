<h2>Student Masterlist</h2>

{{ link_to('student/new', 'Create New', 'class' : 'btn btn-primary') }}
<hr>

{{ content() }}

{% if session.has('message') %}
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ session.get('message') }}</strong>
</div>
{{ session.remove('message') }}
{% endif %}

<table class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Firstname</th> 
		<th>Lastname</th>
		<th>Age</th>
		<th>Section</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
	{% for student in students %}
	<tr>
		<td>{{ student.id }}</td>
		<td>{{ student.firstname|e|capitalize }}</td>
		<td>{{ student.lastname|e|capitalize }}</td>
		<td>{{ student.age|e }}</td>
		<td>{{ student.section.name|e|capitalize }}</td>
		<td>{{ student.address|e|capitalize }}</td>
		<td>
			{{ link_to('student/detail/' ~ student.id, 'Edit', 'class' : 'btn btn-success btn-sm') }}
			{{ link_to('student/delete/' ~ student.id, 'Delete', 'class' : 'btn btn-danger btn-sm') }}
		</td>
	</tr>
	{% endfor %}
</table>