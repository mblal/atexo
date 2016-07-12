<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 10/07/2016
 * Time: 14:24
 */
namespace CardGameBundle\Stub;
/**
 * Un bouchon de test -- Pahse de DEV ---------|--------Ca ne sert plus  à rien.
 *
 * Class PostContentGenerator
 * @package CardGameBundle\Stub
 */
class PostContentGenerator {

    public static function getContent(){
        return $content = '{"cards":[{"category":"HEART","value":"SIX"},{"category":"HEART","value":"SIX"},{"category":"HEART","value":"SEVEN"},{"category":"HEART","value":"NINE"},{"category":"SPADE","value":"FOUR"},{"category":"SPADE","value":"EIGHT"},{"category":"SPADE","value":"TEN"},{"category":"SPADE","value":"KING"},{"category":"CLUB","value":"FOUR"},{"category":"CLUB","value":"NINE"},{"category":"CLUB","value":"KING"}],"categoryOrder":["DIAMOND","HEART","SPADE","CLUB"],"valueOrder":["ACE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","JACK","QUEEN","KING"]}';
    }

    public static function getContent2(){
        return '{"cards":[{"category":"DIAMOND","value":"TEN"},{"category":"DIAMOND","value":"KING"},{"category":"HEART","value":"EIGHT"},{"category":"DIAMOND","value":"QUEEN"},{"category":"HEART","value":"NINE"},{"category":"SPADE","value":"FIVE"},{"category":"SPADE","value":"SEVEN"},{"category":"SPADE","value":"KING"},{"category":"CLUB","value":"ACE"},{"category":"CLUB","value":"TWO"}],"categoryOrder":["DIAMOND","HEART","SPADE","CLUB"],"valueOrder":["ACE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","JACK","QUEEN","KING"]}';
    }

    public static function getContent3(){
        return '{"exerciceId":"5784049c975adeb8520a3b1b","dateCreation":1468269724323,"candidate":{"candidateId":"57187b7c975adeb8520a283c","firstName":"Othmane","lastName":"QABLAOUI"},"data":{"cards":[{"category":"SPADE","value":"NINE"},{"category":"CLUB","value":"FIVE"},{"category":"HEART","value":"TEN"},{"category":"HEART","value":"NINE"},{"category":"DIAMOND","value":"FIVE"},{"category":"SPADE","value":"FOUR"},{"category":"DIAMOND","value":"SIX"},{"category":"DIAMOND","value":"EIGHT"},{"category":"DIAMOND","value":"JACK"},{"category":"DIAMOND","value":"KING"},{"category":"SPADE","value":"TWO"}],"categoryOrder":["HEART","SPADE","CLUB","DIAMOND"],"valueOrder":["ACE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","QUEEN","KING","JACK"]},"name":"cards"}';
    }
}