<?php 

/**
 * Blog Entity
 *
 * @author Nick Swinford <nicholasjohn16@gmail.com>
 */

class ComBlogsDomainEntityBlog extends ComMediumDomainEntityMedium
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
            'attributes' => array(
                'name' => array('required' => AnDomain::VALUE_NOT_EMPTY),
                'body' => array(
                	'required' => AnDomain::VALUE_NOT_EMPTY,
                    'format' => 'post',
                ),
            )
        ));

        return parent::_initialize($config);
    }
}