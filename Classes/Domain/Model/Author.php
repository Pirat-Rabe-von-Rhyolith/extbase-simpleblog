<?php
namespace Lobacher\Simpleblog\Domain\Model;

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
 * Authors
 */
class Author extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * fullname
     * 
     * @var string
     */
    protected $fullname = '';

    /**
     * email
     * 
     * @var string
     */
    protected $email = '';

    /**
     * Returns the fullname
     * 
     * @return string $fullname
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Sets the fullname
     * 
     * @param string $fullname
     * @return void
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
