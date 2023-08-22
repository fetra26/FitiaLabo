<?php

namespace App\Controller;

use App\Entity\Laboratoire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class LaboratoireController extends AbstractController
{
    #[Route('/laboratoires', name: 'laboratoire_index', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $laboratoires = $doctrine
            ->getRepository(Laboratoire::class)
            ->findAll();

        $data = [];

        foreach ($laboratoires as $labo) {
            $data[] = [
                'id' => $labo->getId(),
                'nom' => $labo->getNom(),
                'adresse' => $labo->getAdresse(),
                'description' => $labo->getDescription(),
                'numeroArrete' => $labo->getNumeroArrete(),
                'stat' => $labo->getStat(),
                'nif' => $labo->getNif(),
                'numeroLabo' => $labo->getNumeroLabo(),
                'examens' => $labo->getExamens(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/laboratoires', name: 'laboratoire_create', methods: ['POST'])]
    public function create(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $laboratoire = new Laboratoire();
        $laboratoire->setNom($request->request->get('nom'));
        $laboratoire->setAdresse($request->request->get('adresse'));
        $laboratoire->setDescription($request->request->get('description'));
        $laboratoire->setNumeroArrete($request->request->get('numeroArrete'));
        $laboratoire->setStat($request->request->get('stat'));
        $laboratoire->setNif($request->request->get('nif'));
        $laboratoire->setNumeroLabo($request->request->get('numeroLabo'));

        $entityManager->persist($laboratoire);
        $entityManager->flush();

        return $this->json('Nouveau laboratoire crée avec succès');
    }

    #[Route('/laboratoires/{id}', name: 'laboratoire_show', methods: ['GET'])]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $laboratoire = $doctrine->getRepository(Laboratoire::class)->find($id);

        if (!$laboratoire) {
            return $this->json('Aucun laboratoire trouvé pour id ' . $id, 404);
        }

        $data = [
            'id' => $laboratoire->getId(),
            'adresse' => $laboratoire->getAdresse(),
            'nom' => $laboratoire->getNom(),
            'description' => $laboratoire->getDescription(),
            'numeroArrete' => $laboratoire->getNumeroArrete(),
            'stat' => $laboratoire->getStat(),
            'nif' => $laboratoire->getNif(),
            'numeroLabo' => $laboratoire->getNumeroLabo(),
            'examens' => $laboratoire->getExamens(),
        ];

        return $this->json($data);
    }


    #[Route('/laboratoires/{id}', name: 'laboratoire_update', methods: ['PUT', 'PATCH'])]
    public function update(ManagerRegistry $doctrine, Request $request, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $laboratoire = $entityManager->getRepository(Laboratoire::class)->find($id);

        if (!$laboratoire) {
            return $this->json('Aucun laboratoire trouvé pour id ' . $id, 404);
        }

        $laboratoire->setAdresse($request->request->get('adresse'));
        $laboratoire->setNom($request->request->get('nom'));
        $laboratoire->setDescription($request->request->get('description'));
        $laboratoire->setNumeroArrete($request->request->get('numeroArrete'));
        $laboratoire->setStat($request->request->get('stat'));
        $laboratoire->setNif($request->request->get('nif'));
        $laboratoire->setNumeroLabo($request->request->get('numeroLabo'));

        $entityManager->flush();

        $data = [
            'id' => $laboratoire->getId(),
            'adresse' => $laboratoire->getAdresse(),
            'nom' => $laboratoire->getNom(),
            'description' => $laboratoire->getDescription(),
            'numeroArrete' => $laboratoire->getNumeroArrete(),
            'stat' => $laboratoire->getStat(),
            'nif' => $laboratoire->getNif(),
            'numeroLabo' => $laboratoire->getNumeroLabo(),
            'examens' => $laboratoire->getExamens(),
        ];

        return $this->json($data);
    }

    #[Route('/laboratoires/{id}', name: 'laboratoire_delete', methods: ['DELETE'])]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $laboratoire = $entityManager->getRepository(Laboratoire::class)->find($id);

        if (!$laboratoire) {
            return $this->json('Aucun laboratoire trouvé pour id ' . $id, 404);
        }

        $entityManager->remove($laboratoire);
        $entityManager->flush();

        return $this->json('Laboratoire supprimé avec succès');
    }
}
