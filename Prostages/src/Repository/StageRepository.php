<?php

namespace App\Repository;

use App\Entity\Stage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stage[]    findAll()
 * @method Stage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stage::class);
    }

    // /**
    //  * @return Stage[] Returns an array of Stage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stage
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    
    public function findByFormationDQL($nom): ?Stage
    {
        $requete = $this->getEntityManager()->createQuery("SELECT s,f
        from App\Entity\Stage s
        JOIN s.formations f
         WHERE f.libelle = :nom"
        );
        $requete->setParameter('nom',$nom);
        return $requete->execute();
    }

    public function findByFormation($nom)
    {
        return $this -> createQueryBuilder ('s')
                    ->join('s. formations ','f')
                    ->join('s. entreprise ','e')
                    ->where ('f. libelle = :nomFormations')
                    -> setParameter ('nomFormations', $nom )
                    -> getQuery ()
                    -> getResult ();
    }

    public function findByEntreprise ( $entreprise)
    {
        return $this -> createQueryBuilder ('s')
                    ->join('s. entreprise ','e')
                    ->join('s. formations ','f')
                    ->where ('e. nom = :nomEntreprise')
                    -> setParameter ('nomEntreprise', $entreprise )
                    -> getQuery ()
                    -> getResult ();
    }

    public function 
    RecupererTousLesStages()
    {
        $requete = $this->getEntityManager()->createQuery("SELECT s,f,e
        from App\Entity\Stage s
        JOIN s.formations f
        JOIN s.entreprise e"
        );
        return $requete->execute();
    }


}
