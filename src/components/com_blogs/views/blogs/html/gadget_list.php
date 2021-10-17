<?php defined('KOOWA') or die('Restricted access');?>
	
<?php if (count($blogs)) :?>
	<?php foreach ($blogs as $blog) : ?>
	<?= @view('blog')->layout('list')->blog($blog)->filter($filter) ?>
	<?php endforeach; ?>
<?php else: ?>
	<?= @message(@text('COM-BLOGS-BLOGS-EMPTY-LIST-MESSAGE')) ?>
<?php endif; ?>