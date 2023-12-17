<?php

namespace App\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Page;

class PageRepository extends ServiceEntityRepository implements RepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function createPaginator(array $criteria = [], array $sorting = []): iterable
    {
        // Implement logic to create a paginator
        // Example:
        $queryBuilder = $this->createQueryBuilder('p');
        // Add conditions based on criteria
        // Apply sorting
        // ...

        $query = $queryBuilder->getQuery();

        return new Paginator($query);
    }

    public function add($resource): void
    {
        // Implement logic to add a resource
        // Example:
        $this->getEntityManager()->persist($resource);
        $this->getEntityManager()->flush();
    }

    public function remove($resource): void
    {
        // Implement logic to remove a resource
        // Example:
        $this->getEntityManager()->remove($resource);
        $this->getEntityManager()->flush();
    }

    // Add your custom repository methods if needed
}
