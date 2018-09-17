<?php
namespace Lobacher\Simpleblog\Domain\Repository;

/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Stefan Reiss, phth
 *
 ***/

/**
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository{


 /**
  * @param string $search
  * @param int $limit
  * return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
  *
  */

     public function findSearchForm ($search,$limit){
        $query=$this->createQuery();
         $query->matching(
         $query->like('title','%'.$search.'%')
         );
         $query->setOrderings(array('title'=>\TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
         $limit=(int)$limit;
         if ($limit>0) {
             $query->setLimit(5);
         }
         return $query->execute();
    }
}
?>