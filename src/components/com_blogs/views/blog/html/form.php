<?php defined('KOOWA') or die('Restricted access');?>

<?php $blog = empty($blog) ? @service('repos:blogs.blog')->getEntity()->reset() : $blog; ?>

<form method="post" action="<?= @route($blog->getURL().'&oid='.$actor->id)?>">
    <fieldset>
        <legend><?= ($blog->persisted()) ? @text('COM-BLOGS-BLOG-EDIT') : @text('COM-BLOGS-BLOG-ADD') ?></legend>
        <div class="form-group">
            <label for="blog-title">
                <?= @text('LIB-AN-MEDIUM-TITLE') ?>
            </label>
            <input required class="form-control" id="blog-title" name="title" value="<?= @escape($blog->title) ?>" size="50" maxlength="255" type="text" />
        </div>

        <div class="form-group">
            <label for="blog-body">
                <?= @text('LIB-AN-MEDIUM-BODY') ?>
            </label>
            <?= @editor(array(
                'name' => 'body',
                'content' => @escape($blog->body),
                'html' => array(
                    'maxlength' => '20000',
                    'cols' => '10',
                    'rows' => '5',
                    'class' => 'form-control',
                    'id' => 'blog-body'
                    ),
            )); ?>
        </div>

        <div class="form-group">
            <label id="privacy" ><?= @text('LIB-AN-PRIVACY-FORM-LABEL') ?></label>
            <?= @helper('ui.privacy', array('entity' => $blog, 'auto_submit' => false, 'options' => $actor)) ?>
        </div>

        <div class="form-actions">
            <?php $cancelURL = ($blog->persisted()) ? $blog->getURL() : 'view=blogs&oid='.$actor->id ?>
            <a class="btn btn-secondary" href="<?= @route($cancelURL) ?>">
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
