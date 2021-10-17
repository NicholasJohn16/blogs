<?php defined('KOOWA') or die('Restricted access') ?>

<div class="row">
	<div class="col-8">
		<?= @helper('ui.header') ?>
		<?= @template('blog') ?>
		<?= @helper('ui.comments', $blog) ?>
	</div>

	<?php if ($actor->authorize('administration')): ?>
	<div class="col-4 d-none d-md-block">
		<h4 class="block-title">
		    <?= @text('COM-BLOGS-BLOG-PRIVACY') ?>
		</h4>
	    <div class="block-content">
	        <?= @helper('ui.privacy', $blog) ?>
	    </div>

		<?php if(count($blog->locations) || $blog->authorize('edit')): ?>
			<h4 class="block-title">
				<?= @text('LIB-AN-ENTITY-LOCATIONS') ?>
			</h4>

			<div class="block-content">
				<?= @location($blog) ?>
			</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
