<?php

namespace Acme\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Msi\Bundle\CmfBundle\Entity\Menu;

class LoadMenuData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    protected $dic;
    protected $manager;

    public function setContainer(ContainerInterface $dic = null)
    {
        $this->dic = $dic;
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $transClass = 'Msi\Bundle\CmfBundle\Entity\MenuTranslation';

        // ADMIN MENU

        $root = $this->create('admin');
            $menu1 = $this->create('Sites', '@msi_cmf_site_admin_index', $root);
            $menu2 = $this->create('Securité', null, $root);
                $this->create('Utilisateurs', '@msi_user_user_admin_index', $menu2);
                $this->create('Groupes', '@msi_user_group_admin_index', $menu2);
            $this->create('Menus', '@msi_cmf_menu_root_admin_index', $root);
            $menu4 = $this->create('Contenu', null, $root);
                $this->create('Pages', '@msi_cmf_page_admin_index', $menu4);
                $this->create('Blocs', '@msi_cmf_page_block_admin_index', $menu4);

        // FRONTEND MENU

        $root = $this->create('main');
            $this->create('Accueil', null, $root, 'page1');
            $this->create('Démarche', null, $root, 'page2');
            $this->create('Portfolio', null, $root);
            $this->create('Contact', null, $root, 'page3');

        $this->manager->flush();
    }

    public function create($name, $route = null, $parent = null, $page = null)
    {
        $menu = new Menu();
        $this->dic->get('msi_cmf.menu_root_manager')->createTranslations($menu, ['fr']);
        $menu->setParent($parent);
        $menu->getTranslation()
            ->setPublished(true)
            ->setName($name)
            ->setRoute($route ? $route : '#')
        ;
        if ($page) {
            $menu->setPage($this->manager->merge($this->getReference($page)));
        }
        $this->manager->persist($menu);

        return $menu;
    }

    public function getOrder()
    {
        return 3;
    }
}
