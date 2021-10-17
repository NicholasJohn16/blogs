<?php defined('KOOWA') or die('Restricted access') ?>

<div class="an-entity card">
	<div class="card-header clearfix">
		<div class="entity-portrait-square">
			<?= @avatar($blog->author) ?>
		</div>
			
		<div class="entity-container">
			<h4 class="entity-author mb-0"><?= @name($blog->author) ?></h4>
			<div class="an-meta"><?= @date($blog->creationTime) ?></div>
		</div>
	</div>
	
	<div class="card-body">

		<h3 class="card-title entity-title">
			<?=@escape($blog->title) ?>
		</h3>
		
		<div class="entity-description">
			<?= @content($blog->body) ?>
		</div>

		<hr>
			
		<div class="entity-meta">
			<ul class="an-meta list-inline">
				<?php if ($blog->numOfComments) : ?> 
				<li class="list-inline-item"><?= sprintf(@text('LIB-AN-MEDIUM-NUMBER-OF-COMMENTS'), $blog->numOfComments); ?></li>
				<li class="list-inline-item"><?= sprintf(@text('LIB-AN-MEDIUM-LAST-COMMENT-BY-X'), @name($blog->lastCommenter), @date($blog->lastCommentTime)) ?></li>
				<?php endif; ?>
				
				<?php if ($blog->voteUpCount): ?>
				<li class="list-inline-item">
					<div class="vote-count-wrapper" id="vote-count-wrapper-<?= $blog->id ?>">
						<?= @helper('ui.voters', $blog); ?>
					</div> 
				</li>
				<?php endif; ?>
			</ul>
		</div>
		
	</div>
</div>

