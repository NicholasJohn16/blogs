<?php defined('KOOWA') or die('Restricted access'); ?>

<?php $blog = @service('repos:blogs.blog')->getEntity()->reset(); ?>

<form class="composer-form" method="post" action="<?= @route() ?>">
	<fieldset>
	    <legend><?= @text('COM-BLOGS-BLOG-ADD') ?></legend>	
	    	
		<div class="form-group">
			<label for="blog-title">
			    <?= @text('COM-BLOGS-BLOG-TITLE') ?>
			</label> 
			
			<input id="blog-title" class="form-control" name="title" value="" size="50" maxlength="255" type="text" required autofocus />
		</div>
		
		<div class="form-group">
            <label for="blog-body">
                <?= @text('LIB-AN-MEDIUM-BODY') ?>
            </label>
            <?= @editor(array(
                'name' => 'body',
                'content' => '',
                'html' => array(
                    'maxlength' => '20000',
                    'cols' => '5',
                    'rows' => '5',
                    'class' => 'form-control',
                    'id' => 'blog-body',
                    ),
            )); ?>
        </div>
		
		<div class="form-group">
			<label id="privacy" >
			    <?= @text('LIB-AN-PRIVACY-FORM-LABEL') ?>
			</label>
			
			<?= @helper('ui.privacy', array('entity' => $blog, 'auto_submit' => false, 'options' => $actor)) ?>
		</div>
			
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" data-loading-text="<?= @text('LIB-AN-MEDIUM-POSTING') ?>">
			    <?= @text('LIB-AN-ACTION-POST') ?>
			</button>
		</div>
	</fieldset>
</form>