<!DOCTYPE html>
<html>
	<head>
		<?= $this->tag->getTitle() ?>

		<?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
	</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?= $this->tag->linkTo(['index', 'Phalcon App', 'class' => 'navbar-brand']) ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if ($this->session->has('auth')) { ?>
            <li><?= $this->tag->linkTo(['home', 'Home']) ?></li>
            <li><?= $this->tag->linkTo(['student', 'Student Management']) ?></li>
            <li><?= $this->tag->linkTo(['logout', 'Logout (' . $this->session->get('auth')['username'] . ')']) ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

<br><br><br>

<div class="container">
<?= $this->getContent() ?>
</div>

<?= $this->tag->javascriptInclude('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', true) ?>

<?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>

</body>
</html>