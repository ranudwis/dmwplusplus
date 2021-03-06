<?php

namespace App\Repository;

use App\Enity\Exam;
use App\Entity\CourseExam;
use App\Entiy\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CourseExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseExam[]    findAll()
 * @method CourseExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseExamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseExam::class);
    }

    public function getAllExamWithCourseSlug($slug)
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT exam, courseexam
            FROM App\Entity\Exam exam
            LEFT JOIN exam.courses courseexam
                WITH courseexam.course = (
                    SELECT course.id
                    FROM App\Entity\Course course

                    WHERE course.slug = :slug
                )

            WHERE exam.semester = (
                    SELECT semester.type
                    FROM App\Entity\Semester semester
                    JOIN semester.courses innerCourse

                    WHERE innerCourse.slug = :slug
                )
        ');

        $query->setParameter('slug', $slug);

        return $query->getResult();
    }
}
