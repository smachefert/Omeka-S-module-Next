<?php
namespace Next\Service\ViewHelper;

use Interop\Container\ContainerInterface;
use Next\View\Helper\PublicResourceUrl;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Service factory for the PublicResourceUrlFactory view helper.
 *
 * @todo Set a setting for the default site of the user.
 */
class PublicResourceUrlFactory implements FactoryInterface
{
    /**
     * Create and return the PublicResourceUrl view helper
     *
     * @return PublicResourceUrl
     */
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        $defaultSiteSlug = $services->get('ViewHelperManager')->get('defaultSiteSlug');
        return new PublicResourceUrl($defaultSiteSlug());
    }
}
