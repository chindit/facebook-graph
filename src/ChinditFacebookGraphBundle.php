<?php
declare(strict_types=1);

namespace Chindit\Bundle;

use Chindit\Bundle\Factory\BeanstalkTransportFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChinditFacebookGraphBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        // Nothing to register here
    }
}