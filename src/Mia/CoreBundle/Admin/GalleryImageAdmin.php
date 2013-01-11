<?php

namespace Mia\CoreBundle\Admin;

use Msi\Bundle\CmfBundle\Admin\Admin;
use Msi\Bundle\CmfBundle\Grid\GridBuilder;
use Symfony\Component\Form\FormBuilder;

class GalleryImageAdmin extends Admin
{
    public function configure()
    {
        return $this->options = [
            'icon' => 'picture',
        ];
    }

    public function buildGrid(GridBuilder $builder)
    {
        $builder
            ->add('published', 'boolean')
            ->add('filename', 'image')
            ->add('', 'action')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $years = [];
        foreach (range(date('Y'), 1988) as $year) {
            $years[$year] = $year;
        }

        $builder
            ->add('published')
            ->add('file', 'file')
            ->add('title')
            ->add('medium', 'choice', ['choices' => [
                'dada' => 'dada',
            ]])
            ->add('size')
            ->add('year', 'choice', ['choices' => $years])
            ->add('description', 'textarea', ['attr' => ['class' => 'tinymce']])
        ;
    }
}
