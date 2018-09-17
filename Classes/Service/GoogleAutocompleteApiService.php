<?php
/**
 * Created by PhpStorm.
 * User: Stefan Reiss
 * Date: 14.09.2018
 * Time: 12:17
 */

namespace Lobacher\Simpleblog\Service;


class GoogleAutocompleteApiService implements \TYPO3\CMS\Core\SingletonInterface
{
    /**
     * @param mixed §object
     * @param string $property
     * @return array
     */

    public function validateData($object,$property){
        $errors =array();
        $getter ='get'.ucfirst($property);
        $getValue =strtolower($object->$getter());
        $url='http://www.google.com/complete/search?output=firefox&q='.urlencode($getValue);
        if(!empty($getValue)) {
            $result=json_decode(utf8_encode(file_get_contents($url)));
        }
        if(!empty($getValue)&&(empty ($result[1])||array_search($getValue,$result[1])===FALSE)){
            $errors[$property]='No autocomplete entry for <strong>'.$getValue.'</strong>';
            if(!empty($result[1])){
                $errors[$property].='(possible values are:'.implode(',',$result[1]).')';
            }
            }
            return $errors;
    }

}