<?php
namespace Sonata\DashboardBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class RenderDashboardEvent extends Event
{
    protected $data;
    
    public function __construct()
    {
        $this->data = array();
    }
    
    public function addData($data)
    {
        $this->data[] = $data;
    }
    
    public function getData()
    {
        return $this->data;
    }
}
