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
 * This is a blog
 */
class Blog extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     * 
     * @var string
     * @validate NotEmpty, \Lobacher\Simpleblog\Validation\Validator\WordValidator(max=3)
     */
    protected $title = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * Blog posts
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Lobacher\Simpleblog\Domain\Model\Post>
     * @cascade remove
     */
    protected $posts = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->posts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Adds a Post
     * 
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     * @return void
     */
    public function addPost(\Lobacher\Simpleblog\Domain\Model\Post $post)
    {
        $this->posts->attach($post);
    }

    /**
     * Removes a Post
     * 
     * @param \Lobacher\Simpleblog\Domain\Model\Post $postToRemove The Post to be removed
     * @return void
     */
    public function removePost(\Lobacher\Simpleblog\Domain\Model\Post $postToRemove)
    {
        $this->posts->detach($postToRemove);
    }

    /**
     * Returns the posts
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Lobacher\Simpleblog\Domain\Model\Post> $posts
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Sets the posts
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Lobacher\Simpleblog\Domain\Model\Post> $posts
     * @return void
     */
    public function setPosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $posts)
    {
        $this->posts = $posts;
    }
}
