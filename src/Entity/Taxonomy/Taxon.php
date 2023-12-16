<?php

declare(strict_types=1);

namespace App\Entity\Taxonomy;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Taxon as BaseTaxon;
use Sylius\Component\Taxonomy\Model\TaxonTranslationInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_taxon')]
class Taxon extends BaseTaxon
{
    use TimestampableTrait;


    protected function createTranslation(): TaxonTranslationInterface
    {
        return new TaxonTranslation();
    }

    /**
     * @var DateTimeInterface|null
     */
    protected $updatedAt;

    // ...



}
