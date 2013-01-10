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
            $menu1 = $this->create('Uniktour & le voyage spatial', null, $root);
                $this->create('Le concept d\'UniktourSpace', null, $menu1, 'page2');
                $this->create('Tourisme spatial, rêve ou réalité?', null, $menu1, 'page3');
                $this->create('Le futur des vols commerciaux', null, $menu1, 'page4');
                $this->create('FAQ', null, $menu1, 'page5');
                $this->create('La presse parle de nous', null, $menu1, 'page6');
            $menu2 = $this->create('Le vol suborbital', null, $root);
                $this->create('Description de la compagnie XCore Aerospace - SXC', null, $menu2, 'page7');
                $this->create('Description de la navette LYNX-2', null, $menu2, 'page8');
                $this->create('Devenez astronaute', null, $menu2, 'page9');
            $menu3 = $this->create('L\'experience', null, $root);
                $this->create('Le(s) site(s) d\'entraînement / vol', null, $menu3, 'page10');
                $this->create('Programme d\'entraînement', null, $menu3, 'page11');
                $this->create('Le vol spatial', null, $menu3, 'page12');
                $this->create('Le pilote (Rick Searfoss)', null, $menu3, 'page13');
            $this->create('Sécurité', null, $root, 'page14');
            $this->create('Contact', null, $root);

        // footer left

        $root = $this->create('footer_left');
            $menu1 = $this->create('Uniktour & le voyage spatial', null, $root);
                $this->create('&bull; Le concept d\'UniktourSpace', null, $menu1, 'page2');
                $this->create('&bull; Tourisme spatial, rêve ou réalité?', null, $menu1, 'page3');
                $this->create('&bull; Le futur des vols commerciaux', null, $menu1, 'page4');
                $this->create('&bull; FAQ', null, $menu1, 'page5');
                $this->create('&bull; La presse parle de nous', null, $menu1, 'page6');
            $menu2 = $this->create('Le vol suborbital', null, $root);
                $this->create('&bull; Description de la compagnie XCore Aerospace - SXC', null, $menu2, 'page7');
                $this->create('&bull; Description de la navette LYNX-2', null, $menu2, 'page8');
                $this->create('&bull; Devenez astronaute', null, $menu2, 'page9');

        // footer right

        $root = $this->create('footer_right');
            $menu3 = $this->create('L\'experience', null, $root);
                $this->create('&bull; Le(s) site(s) d\'entraînement / vol', null, $menu3, 'page10');
                $this->create('&bull; Programme d\'entraînement', null, $menu3, 'page11');
                $this->create('&bull; Le vol spatial (Doc 3)', null, $menu3, 'page12');
                $this->create('&bull; Le pilote (Rick Searfoss)', null, $menu3, 'page13');
            $this->create('Sécurité', null, $root, 'page14');
            $this->create('Contact', null, $root);

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
