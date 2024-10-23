<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/fetch-contacts", name="fetch_contacts", methods={"GET"}, options={"expose"=true})
     */
    public function fetchContacts(): Response
    {
        $contacts = [
            [
                'firstName'=>'John',
                'lastName'=>'Smith',
                'email'=>'john.smith@mail.com'
            ]
        ];
        $contacts = $this->connection->fetchAllAssociative('SELECT * FROM Contact');
        return $this->json(
            $contacts
        );
    }
}
