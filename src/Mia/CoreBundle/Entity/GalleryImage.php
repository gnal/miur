<?php

namespace Mia\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Msi\DoctrineBehaviors\Uploadable\UploadableInterface;
use Msi\Bundle\CmfBundle\Tools\Cutter;

/**
 * @ORM\Entity
 */
class GalleryImage implements UploadableInterface
{
    use \Msi\DoctrineBehaviors\Uploadable\Traits\UploadableEntity;
    use \Msi\DoctrineBehaviors\Timestampable\Traits\TimestampableEntity;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $published;

    /**
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="images")
     */
    protected $gallery;

    public function __construct()
    {
        $this->position = 1;
        $this->published = false;
    }

    public function getUploadDir()
    {
        return 'gallery/'.$this->getGallery()->getId();
    }

    public function processFile(\SplFileInfo $file)
    {
        $cutter = new Cutter;
        $cutter->setFile($file)->resize(460, 260)->save();
    }

    public function getAllowedExt()
    {
        return ['png', 'jpg', 'gif', 'jpeg'];
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
}
