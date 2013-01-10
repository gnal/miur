<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Msi\Bundle\CmfBundle\Entity\Page;

class LoadPageData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $container;
    protected $pageManager;
    protected $manager;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->pageManager = $container->get('msi_cmf.page_manager');
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->create(1, 'Accueil', true);

        $this->create(2, 'Démarche', false);
        $this->create(3, 'Contact', false);

        $this->manager->flush();
    }

    public function create($i, $title, $home = false)
    {
        $page = new Page();
        $page
            ->setHome($home)
            ->setTemplate('MiaCoreBundle::layout.html.twig')
        ;
        $this->pageManager->createTranslations($page, array('fr'));
        ;
        $this->addReference('page'.$i, $page);
        $page->setSite($this->manager->merge($this->getReference('site1')));
        $page->getTranslation()->setPublished(true)->setTitle($title);
        $this->manager->persist($page);

        return $page;
    }

    public function getOrder()
    {
        return 2;
    }
}
