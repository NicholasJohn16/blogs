<?php

/**
 * Actorbar.
 *
 * @author     Nick Swinford <nicholasjohn16@gmail.com>
 *
 */
class ComBlogsControllerToolbarActorbar extends ComMediumControllerToolbarActorbar
{
    /**
     * Before controller action.
     *
     * @param KEvent $event Event object
     *
     * @return string
     */
    public function onBeforeControllerGet(KEvent $event)
    {
        parent::onBeforeControllerGet($event);

        $viewer = $this->getController()->viewer;
        $actor = pick($this->getController()->actor, $viewer);
        $layout = pick($this->getController()->layout, 'default');
        $name = $this->getController()->getIdentifier()->name;

        $this->setTitle(AnTranslator::sprintf('COM-BLOGS-HEADER-BLOGS', $actor->name));

        $this->addNavigation('blogs',
                AnTranslator::_('COM-BLOGS-NAV-BLOGS'),
                array(
                    'option' => 'com_blogs',
                    'view' => 'blogs',
                    'oid' => $actor->id,
                ),
                $name == 'blog');
    }
}
