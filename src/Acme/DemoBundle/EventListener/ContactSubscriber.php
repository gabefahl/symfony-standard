<?php
namespace Acme\DemoBundle\EventListener;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;

class ContactSubscriber implements EventSubscriber
{

    private $testService;

    public function __construct($testService)
    {
        $this->testService = $testService;
    }

    public function getSubscribedEvents()
    {
        return array(
            'preUpdate',
            'prePersist'
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function index(LifecycleEventArgs $args)
    {
        $document = $args->getDocument();
    }
}
