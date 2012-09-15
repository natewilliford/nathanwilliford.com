<?php

namespace Nate\PortfolioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NatePortfolioBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
