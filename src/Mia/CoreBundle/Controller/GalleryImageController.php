<?php

namespace Mia\CoreBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GalleryImageController extends ContainerAware
{
    public function listAction(Request $request)
    {
        $galleries = $this->container->get('mia_core.gallery_manager')->getFindByQueryBuilder(['a.published' => true], [], ['a.name' => 'ASC'])->getQuery()->execute();

        $where = ['a.published' => true];

        if ($id = $request->query->get('p', 1)) {
            foreach ($galleries as $gallery) {
                if ($id == $gallery->getId()) {
                    $where['a.gallery'] = $gallery;
                    $currentGallery = $gallery;
                }
            }
        } else {
            // return new RedirectResponse($this->container->get('router')->generate('mia_core_gallery_image_list', ['p' => 1]));
        }

        $images = $this->container->get('mia_core.gallery_image_manager')->getFindByQueryBuilder($where, [], ['a.position' => 'ASC'])->getQuery()->execute();

        return $this->container->get('templating')->renderResponse('MiaCoreBundle:GalleryImage:list.html.twig', ['currentGallery' => $currentGallery, 'galleries' => $galleries, 'images' => $images]);
    }
}
