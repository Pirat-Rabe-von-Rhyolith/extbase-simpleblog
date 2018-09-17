<?php
/**
 * Created by PhpStorm.
 * User: Stefan Reiss
 * Date: 17.09.2018
 * Time: 09:52
 */

namespace Lobacher\Simpleblog\ViewHelpers;


class PropertyViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @param string $propertyName
     * @param mixed $object
     * @return mixed
     */

    public function render($propertyName, $subject=NULL){
        if ($subject===NULL){
            $subject=$this->renderChildren();
        }
        return \TYPO3\CMS\Extbase\Reflection\Objectaccess::getPropertyPath($subject,$propertyName);
    }

}