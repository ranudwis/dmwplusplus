<?php

namespace App\Controller;

use App\Entity\Semester;
use App\Repository\SemesterRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/semester")
 */
class SemesterController extends Controller
{
    private $repository;

    public function __construct(SemesterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index()
    {
        $semesters = $this->repository->findAll();

        return $this->jsonResponse(compact('semesters'), [
            'includes' => ['id', 'type', 'slug', 'title']
        ]);
    }

    /**
     * @Route("/withCourses", methods={"GET"})
     */
    public function withCourses()
    {
        $semesters = $this->repository->getAllWithCourses();

        return $this->jsonResponse(compact('semesters'), [
            'includes' => [
                'id',
                'type',
                'slug',
                'title',
                'courses' => [
                    'id',
                    'slug',
                    'code',
                    'title'
                ]
            ]
        ]);
    }

    /**
     * @Route("/{slug}")
     * @ParamConverter("semester", options={"mapping": {"slug": "slug"}})
     */
    public function show(Semester $semester)
    {
        return $this->jsonResponse($semester, [
            'includes' => ['id', 'type', 'slug', 'title', 'courses' => [
                'title'
            ]]
        ]);
    }
}
