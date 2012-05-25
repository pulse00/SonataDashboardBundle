<?php
namespace Sonata\DashboardBundle\Block;

use Sonata\AdminBundle\Event\RenderLayoutEvent;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Pool;
use Sonata\BlockBundle\Block\BaseBlockService;

class GoogleDashboardBlockService extends BaseBlockService
{
    public function __construct($name, EngineInterface $templating, Pool $pool)
    {
        parent::__construct($name, $templating);
        $this->pool = $pool;
    }
    
    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        // TODO: Implement validateBlock() method.
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function execute(BlockInterface $block, Response $response = null)
    {
        return $this->renderResponse('SonataDashboardBundle:Block/Google:google_dashboard.html.twig', array(), $response);        
    }
    
    public function onBeforeBodyEnd(RenderLayoutEvent $event)
    {
        $event->addData('foobar');
    }
}
