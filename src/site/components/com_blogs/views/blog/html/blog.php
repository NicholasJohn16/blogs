<?php defined('KOOWA') or die('Restricted access') ?>

<div class="an-entity">
	<div class="clearfix">
		<div class="entity-portrait-square">
			<?= @avatar($blog->author) ?>
		</div>
			
		<div class="entity-container">
			<h4 class="entity-author"><?= @name($blog->author) ?></h4>
			<div class="an-meta"><?= @date($blog->creationTime) ?></div>
		</div>
	</div>
	
	<h3 class="entity-title">
		<?=@escape($blog->title) ?>
	</h3>	
	
	<div class="entity-description">
		<?= @content($blog->body) ?>
	</div>
		
	<div class="entity-meta">
		<ul class="an-meta inline">
			<?php if ($blog->numOfComments) : ?> 
			<li><?= sprintf(@text('LIB-AN-MEDIUM-NUMBER-OF-COMMENTS'), $blog->numOfComments); ?></li>
			<li><?= sprintf(@text('LIB-AN-MEDIUM-LAST-COMMENT-BY-X'), @name($blog->lastCommenter), @date($blog->lastCommentTime)) ?></li>
			<?php endif; ?>
			
			<?php if ($blog->voteUpCount): ?>
			<li>
				<div class="vote-count-wrapper" id="vote-count-wrapper-<?= $blog->id ?>">
					<?= @helper('ui.voters', $blog); ?>
				</div> 
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>

