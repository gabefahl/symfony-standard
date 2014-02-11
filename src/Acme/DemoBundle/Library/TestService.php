<?php
namespace Acme\DemoBundle\Library;

use Symfony\Component\HttpFoundation\RequestStack;

class TestService
{

    private $name;

    public function __construct(RequestStack $request)
    {
        $this->name = $request->getCurrentRequest()->attributes->get('name');
    }

    public function getName()
    {
        return strtoupper($this->name);
    }
}
