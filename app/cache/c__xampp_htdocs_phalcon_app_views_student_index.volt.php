<h2>Student Masterlist</h2>

<?= $this->tag->linkTo(['student/new', 'Create New', 'class' => 'btn btn-primary']) ?>
<hr>

<?= $this->getContent() ?>

<?php if ($this->session->has('message')) { ?>
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?= $this->session->get('message') ?></strong>
</div>
<?= $this->session->remove('message') ?>
<?php } ?>

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
	<?php foreach ($students as $student) { ?>
	<tr>
		<td><?= $student->id ?></td>
		<td><?= ucwords($this->escaper->escapeHtml($student->firstname)) ?></td>
		<td><?= ucwords($this->escaper->escapeHtml($student->lastname)) ?></td>
		<td><?= $this->escaper->escapeHtml($student->age) ?></td>
		<td><?= ucwords($this->escaper->escapeHtml($student->section->name)) ?></td>
		<td><?= ucwords($this->escaper->escapeHtml($student->address)) ?></td>
		<td>
			<?= $this->tag->linkTo(['student/detail/' . $student->id, 'Edit', 'class' => 'btn btn-success btn-sm']) ?>
			<?= $this->tag->linkTo(['student/delete/' . $student->id, 'Delete', 'class' => 'btn btn-danger btn-sm']) ?>
		</td>
	</tr>
	<?php } ?>
</table>