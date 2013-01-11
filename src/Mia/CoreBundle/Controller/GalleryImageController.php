<?php

namespace Mia\CoreBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class GalleryImageController extends ContainerAware
{
    public function listAction(Request $request)
    {
        $galleries = $this->container->get('mia_core.gallery_manager')->getFindByQueryBuilder(['a.published' => true], [], ['a.name' => 'ASC'])->getQuery()->execute();

        $where = ['a.published' => true];

        if ($id = $request->query->get('p')) {
            foreach ($galleries as $gallery) {
                if ($id == $gallery->getId()) {
                    $where = ['a.gallery' => $gallery];
                }
            }
        }

        $images = $this->container->get('mia_core.gallery_image_manager')->getFindByQueryBuilder($where, [], ['a.position' => 'ASC'])->getQuery()->execute();

        return $this->container->get('templating')->renderResponse('MiaCoreBundle:GalleryImage:list.html.twig', ['galleries' => $galleries, 'images' => $images]);
    }
}
