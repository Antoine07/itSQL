<?php

namespace App\Controller;

use App\Entity\Beer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BarController extends AbstractController
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        // dd("hello"); // stop les scripts et affiche un debug
        // dump("hello"); ne stope pas les scripts
        return $this->render('bar/index.html.twig', [
            'controller_name' => 'BarController',
            'beers' => [
                ["name" => "Rousse 1", "degree" => 5.6],
                ["name" => "Rousse 2", "degree" => 4.6],
            ]
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('bar/contact.html.twig', [
            'title_contact' => 'Page contact',
        ]);
    }

    /**
     * @Route("/mention", name="mention")
     */
    public function mention(): Response
    {
        return $this->render('mention/index.html.twig', [
            'title_mention' => 'Page des mentions légales',
        ]);
    }

    /**
     * @Route("/beers", name="beers")
     */
    public function beers(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Beer::class);

        // dump($this->beers_api());
        // dd($this->beers_api()['beers']);
        // $beers = $this->beers_api() ;

        return $this->render('beers/index.html.twig', [
            //'beers' => $this->beers_api()['beers'],
            'beers' => $repository->findAll()
        ]);
    }


    private function beers_api(): array
    {
        $response = $this->client->request(
            'GET',
            'https://raw.githubusercontent.com/Antoine07/hetic_symfony/main/Introduction/Data/beers.json'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200 ? on a trouvé la resource sur le serveur et on a pu la servir
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray(); // on la transforme en tableau pour Symfony
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
