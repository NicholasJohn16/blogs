<?php defined('KOOWA') or die('Restricted access');?>

<div class="an-entity">
	<div class="clearfix">
		<div class="entity-portrait-square">
			<?= @avatar($blog->author) ?>
		</div>

		<div class="entity-container">
			<h4 class="author-name"><?= @name($blog->author) ?></h4>
			<ul class="an-meta inline">
				<li><?= @date($blog->creationTime) ?></li>
				<?php if (!$blog->owner->eql($blog->author)): ?>
				<li><?= @name($blog->owner) ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<h3 class="entity-title">
		<a href="<?= @route($blog->getURL()) ?>">
            <?= @escape($blog->title) ?>
        </a>
	</h3>

	<div class="entity-description">
	<?= @helper('text.truncate',
        @content($blog->body,
           array('exclude' => 'gist')),
           array('length' => 200, 'consider_html' => true));
    ?>
	</div>

	<div class="entity-meta">
		<ul class="an-meta inline">
			<li><?= sprintf(@text('LIB-AN-MEDIUM-NUMBER-OF-COMMENTS'), $blog->numOfComments) ?></li>
		</ul>

		<div class="an-meta vote-count-wrapper" id="vote-count-wrapper-<?= $blog->id ?>">
			<?= @helper('ui.voters', $blog); ?>
		</div>
	</div>
</div>
