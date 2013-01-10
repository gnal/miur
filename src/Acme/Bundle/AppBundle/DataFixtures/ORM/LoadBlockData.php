<?php

namespace Came\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Msi\Bundle\CmfBundle\Entity\PageBlock;

class LoadBlockData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $manager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $content = "";
        $this->createText('Démarche', $content, 'content', 'page2');

        $content = "";
        $this->createText('Contact', $content, 'content', 'page3');

        $manager->flush();
    }

    public function createText($name, $body, $slot = 'content', $page = null)
    {
        $block = new PageBlock();
        $this->container->get('msi_cmf.page_block_manager')->createTranslations($block, ['fr']);

        $block
            ->setName($name)
            ->setType('text')
            ->setSetting('slot', $slot)
        ;
        $block->getTranslation()
            ->setPublished(true)
            ->setSetting('body', $body);
        if ($page) {
            $block->getPages()->add($this->manager->merge($this->getReference($page)));
        }
        $this->manager->persist($block);
    }

    public function getOrder()
    {
        return 6;
    }
}
