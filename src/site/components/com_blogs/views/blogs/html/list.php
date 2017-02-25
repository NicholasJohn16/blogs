<?php defined('KOOWA') or die('Restricted access');?>

<div class="an-entities">
	
	<?php foreach ($blogs as $blog) : ?>
	<?= @view('blog')->layout('list')->blog($blog)->filter($filter) ?>
	<?php endforeach; ?>
	
    <?php if (count($blogs) == 0): ?>
    <?= @message(@text('COM-BLOGS-BLOGS-EMPTY-LIST-MESSAGE')) ?>
    <?php endif; ?>
    
</div>

<?= @pagination($blogs, array('url' => @route('layout=list'))) ?>