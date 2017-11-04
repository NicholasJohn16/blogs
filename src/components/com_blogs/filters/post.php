<?php

/**
 * Post filter.
 *
 * @author Nick Swinford <nicholasjohn16@gmail.com>
 */
class ComBlogsFilterPost extends KFilterHtml
{
    /**
     * Initializes the default configuration for the object.
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param KConfig $config An optional KConfig object with configuration options.
     */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            //whilte list these tags
            'tag_method' => 0,
            'tag_list' => array('p', 'strike', 'u', 'pre', 'address', 'blockquote', 'b', 'i', 'ul', 'ol', 'li', 'h1', 'h2', 'h3', 'h4', 'h5'),
        ));

        if ($config->tag_list) {
            $config['tag_list'] = KConfig::unbox($config->tag_list);
        }

        if ($config->tag_method) {
            $config['tag_method'] = KConfig::unbox($config->tag_method);
        }

        $config['attribute_method'] = 0;
        $config['attribute_list'] = array();

        parent::_initialize($config);
    }

//end class
}
