<?php

namespace App\Controller;

use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends AbstractController
{
    protected PageRepository $repository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->repository = $pageRepository;
    }

    /**
     * @param string $slug
     * @param PageRepository $pages
     * @return Response
     */
    public function index($slug, PageRepository $pages)
    {
        $page = $pages->findOneBy(['slug' => $slug]);

        if (is_null($page)) {
            throw new NotFoundHttpException('Page not found.');
        }

        return $this->render('page.html.twig', ['page' => $page]);
    }
}
