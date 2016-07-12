<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 10/07/2016
 * Time: 11:41
 */

namespace CardGameBundle\Controller;

use CardGameBundle\Stub\PostContentGenerator;
use CardGameBundle\Utils\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CardGameController
 * @package CardGameBundle\Controller
 *
 * @Route("/cards")
 */
class CardGameController extends Controller
{
    /**
     * @Route("/get", name="card-game-homepage")
     */
    public function indexAction(){
        $resourceGet  = 'cards/57187b7c975adeb8520a283c';
        // Récupérer la main de 10 cartes
        $result = json_encode($this->atexoCardGameClient()->get($resourceGet));
        $result = json_decode($result,true);

        $exerciseId = $result['exerciceId'];

        // Trier la main.
        $sortedCards = Factory::sort($result);
        $sortedCards = $this->get('atexo.service.flattener_array')->flatten($sortedCards);

        // Poster le resultat.
        $postResult = $this->atexoCardGameClient()->post($exerciseId,  $this->computeJsonToSend($sortedCards,$result));

       $template = $postResult['statusCode']== 200 ? 'CardGameBundle:CardGame:success.html.twig':'CardGameBundle:CardGame:failure.html.twig';

        return $this->render($template, $postResult+json_decode($this->computeJsonToSend($sortedCards,$result),true));
    }

    private function atexoCardGameClient(){
        return $this->get('amf_web_services_client.rest.atexo_card_game_client');
    }
    private function computeJsonToSend($sortedCards, $result){
        return json_encode(array('cards' => $sortedCards, 'categoryOrder' => $result['data']['categoryOrder'], 'valueOrder' => $result['data']['valueOrder']));
    }
}