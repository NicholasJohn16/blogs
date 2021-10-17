<?php defined('KOOWA') or die('Restricted access');?>

<div class="an-entity card">
    <div class="card-header clearfix">
        <div class="entity-portrait-square">
            <?= @avatar($blog->author) ?>
        </div>

        <div class="entity-container">
            <h4 class="author-name mb-0"><?= @name($blog->author) ?></h4>
            <ul class="an-meta inline">
                <li><?= @date($blog->creationTime) ?></li>
                <?php if (!$blog->owner->eql($blog->author)): ?>
                <li><?= @name($blog->owner) ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="card-body">

        <h3 class="card-title entity-title">
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

        <hr/>

        <div class="entity-meta">
            <ul class="an-meta list-inline">
                <li class="list-inline-item"><?= sprintf(@text('LIB-AN-MEDIUM-NUMBER-OF-COMMENTS'), $blog->numOfComments) ?></li>
            </ul>

            <div class="an-meta vote-count-wrapper" id="vote-count-wrapper-<?= $blog->id ?>">
                <?= @helper('ui.voters', $blog); ?>
            </div>
        </div>
    </div>
</div>
