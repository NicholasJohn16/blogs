<?php defined('KOOWA') or die('Restricted access');?>

<?php $blog = empty($blog) ? @service('repos:blogs.blog')->getEntity()->reset() : $blog; ?>

<form method="post" action="<?= @route($blog->getURL().'&oid='.$actor->id)?>">
	<fieldset>
		<legend><?= ($blog->persisted()) ? @text('COM-BLOGS-BLOG-EDIT') : @text('COM-BLOGS-BLOG-ADD') ?></legend>
		<div class="control-group">
			<label class="control-label" for="blog-title">
			    <?= @text('LIB-AN-MEDIUM-TITLE') ?>
			</label>
			<div class="controls">
				<input required class="input-block-level" id="blog-title" name="title" value="<?= @escape($blog->title) ?>" size="50" maxlength="255" type="text" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="blog-body">
			    <?= @text('LIB-AN-MEDIUM-BODY') ?>
			</label>
			<div class="controls">
                <?= @editor(array(
                    'name' => 'body',
                    'content' => @escape($blog->body),
                    'html' => array(
                        'maxlength' => '20000',
                        'cols' => '10',
                        'rows' => '5',
                        'class' => 'input-block-level',
                        'id' => 'blog-body'
                        ),
                )); ?>
            </div>
		</div>

		<div class="control-group">
			<label class="control-label" id="privacy" ><?= @text('LIB-AN-PRIVACY-FORM-LABEL') ?></label>
			<div class="controls">
				<?= @helper('ui.privacy', array('entity' => $blog, 'auto_submit' => false, 'options' => $actor)) ?>
			</div>
		</div>

		<div class="form-actions">
			<?php $cancelURL = ($blog->persisted()) ? $blog->getURL() : 'view=blogs&oid='.$actor->id ?>
			<a class="btn" href="<?= @route($cancelURL) ?>">
			    <?= @text('LIB-AN-ACTION-CANCEL') ?>
			</a>

			<?php $action = ($blog->persisted()) ? 'LIB-AN-ACTION-UPDATE' : 'LIB-AN-ACTION-POST' ?>
			<?php $actionLoading = ($blog->persisted()) ? 'LIB-AN-MEDIUM-UPDATING' : 'LIB-AN-MEDIUM-POSTING' ?>
			<button class="btn btn-primary" data-loading-text="<?= @text($actionLoading) ?>">
			    <?= @text($action) ?>
			</button>
		</div>
	</fieldset>
</form>
