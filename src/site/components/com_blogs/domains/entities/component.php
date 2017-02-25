<?php

/**
 * Component object.
 *
 * @author Nick Swinford <nicholasjohn16@gmail.com>

 */
class ComBlogsDomainEntityComponent extends ComMediumDomainEntityComponent
{
    /**
     * {@inheritdoc}
     */
    protected function _setGadgets($actor, $gadgets, $mode)
    {
        if ($mode == 'profile') {
            $gadgets->insert('blogs', array(
                    'title' => JText::_('COM-BLOGS-GADGET-ACTOR-PROFILE'),
                    'url' => 'option=com_blogs&view=blogs&layout=gadget&oid='.$actor->id,
                    'action' => JText::_('LIB-AN-GADGET-VIEW-ALL'),
                    'action_url' => 'option=com_blogs&view=blogs&oid='.$actor->id,
            ));
        } else {
            $gadgets->insert('blogs', array(
                    'title' => JText::_('COM-BLOGS-GADGET-ACTOR-DASHBOARD'),
                    'url' => 'option=com_blogs&view=blogs&layout=gadget&filter=leaders',
                    'action' => JText::_('LIB-AN-GADGET-VIEW-ALL'),
                    'action_url' => 'option=com_blogs&view=blogs&filter=leaders',
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function _setComposers($actor, $composers, $mode)
    {
        if ($actor->authorize('action', 'com_blogs:blog:add')) {
            $composers->insert('photos-composer', array(
                    'title' => JText::_('COM-BLOGS-COMPOSER-BLOG'),
                    'placeholder' => JText::_('COM-BLOGS-BLOG-ADD'),
                    'url' => 'option=com_blogs&view=blog&layout=composer&oid='.$actor->id,
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function _setMenuLinks($actor, $menuItems)
    {
        $menuItems->insert('blogs-blogs', array(
            'title' => JText::_('COM-BLOGS-MENU-ITEM-BLOGS'),
            'url' => 'option=com_blogs&view=blogs&oid='.$actor->uniqueAlias,
        ));
    }
}
