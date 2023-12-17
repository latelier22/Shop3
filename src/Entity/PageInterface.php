<?php

namespace App\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

interface PageInterface extends ResourceInterface
{
    public function getSlug();
    public function setSlug(string $slug);
    public function getContent();
    public function setContent(?string $content);
}