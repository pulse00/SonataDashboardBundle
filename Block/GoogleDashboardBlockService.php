<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) 2010-2011 Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    protected $initialized;
    
    public function __construct($name, EngineInterface $templating, Pool $pool)
    {
        parent::__construct($name, $templating);
        $this->pool = $pool;
        $this->initialized = false;
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
        $content = '';
        
        if ($this->initialized === false) {
            $content = $this->getTemplating()->render('SonataDashboardBundle:Block/Google:init.html.twig');
            $this->initialized = true;
        }
        
        $content .= $this->getTemplating()->render('SonataDashboardBundle:Block/Google:dashboard.html.twig');
        $response = new Response();
        $response->setContent($content);
        
        return $response;
    }
}
