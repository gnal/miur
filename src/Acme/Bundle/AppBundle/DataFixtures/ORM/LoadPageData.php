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

        $this->create(1, 'insert_cool_slogan_here', true);

        $this->create(2, 'Le concept d\'Uniktourspace', false);
        $this->create(3, 'Tourisme spatial, rêve ou réalité?', false);
        $this->create(4, 'Le futur des vols commerciaux', false);
        $this->create(5, 'FAQ', false);
        $this->create(6, 'La presse parle de nous', false);

        $this->create(7, 'Description de la compagnie XCore Aerospace - SXC', false);
        $this->create(8, 'Description de la navette LYNX-2', false);
        $this->create(9, 'Devenez astronaute', false);

        $this->create(10, 'Le(s) site(s) d\'entraînement / vol', false);
        $this->create(11, 'Programme d\'entraînement', false);
        $this->create(12, 'Le vol spatial', false);
        $this->create(13, 'Le pilote (Rick Searfoss)', false);

        $this->create(14, 'Sécurité', false);

        $this->create(15, 'Les spatioports', false);

        $this->manager->flush();
    }

    public function create($i, $title, $home = false)
    {
        $page = new Page();
        $page
            ->setHome($home)
            ->setTemplate('UnikCoreBundle::layout.html.twig')
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
