<?php

namespace Nate\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NateUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
