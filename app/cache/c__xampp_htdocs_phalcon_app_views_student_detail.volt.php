<h2>Edit Student Detail</h2>
<hr>

<?= $this->getContent() ?>

<?php if ($this->session->has('message')) { ?>
<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?= $this->session->get('message') ?></strong>
</div>
<?= $this->session->remove('message') ?>
<?php } ?>

<?= $this->tag->form(['student/update', 'method' => 'post']) ?>

<?= $studentForm->render('id') ?>

<div class="row">
    <div class="form-group col-sm-6">
        <?= $studentForm->label('firstname') ?>
        <?= $studentForm->render('firstname', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <?= $studentForm->label('lastname') ?>
        <?= $studentForm->render('lastname', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <?= $studentForm->label('age') ?>
        <?= $studentForm->render('age', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <?= $studentForm->label('section_id') ?>
        <?= $studentForm->render('section_id', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <?= $studentForm->label('address') ?>
        <?= $studentForm->render('address', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
		<?= $this->tag->linkTo(['student', '<i class="fa fa-arrow-left"></i> Cancel', 'class' => 'btn btn-danger']) ?>
	</div>
</div>

<?= $this->tag->endForm() ?>