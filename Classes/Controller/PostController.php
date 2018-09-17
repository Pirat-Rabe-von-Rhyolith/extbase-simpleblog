<?php
/**
 * Created by PhpStorm.
 * User: Stefan Reiss
 * Date: 07.09.2018
 * Time: 14:38
 */

namespace Lobacher\Simpleblog\Controller;


class PostController extends
    \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * postRepository
     * @var \Lobacher\Simpleblog\Domain\Repository\PostRepository
     */
    protected $postRepository;

    /**
     * @param \Lobacher\Simpleblog\Domain\Repository\PostRepository $postRepository
     */

    public function injectPostRepository(\Lobacher\Simpleblog\Domain\Repository\PostRepository $postRepository) {
        $this->postRepository=$postRepository;
    }

    /**
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */
    public function addFormAction (\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post=NULL) {
        $this->view->assign ('blog',$blog);
        $this->view->assign('post',$post);
        $this->view->assign('tags', $this->objectManager->get('Lobacher\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll());

    }

    /**
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function addAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post){

        //$this->postRepository->add($post);

        $blog->addPost($post);
        $this->objectManager->get('Lobacher\\Simpleblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->redirect('show','Blog',NULL,array('blog'=>$blog));
    }

    /**
     * show action - displays a single post
     *
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function showAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post) {
        $this->view->assign('blog', $blog);
        $this->view->assign('post',$post);
    }

    /**
     * updateForm action - displays a form for editing a post
     *
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function updateFormAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post) {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get('Lobacher\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll());
    }

    /**
     * update action - updates a post in the repository
     *
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function updateAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post) {
        $this->postRepository->update($post);
        $this->redirect('show','Blog',NULL,array('blog'=>$blog));
    }

    /**
     * delete action - deletes a post in the repository
     *
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function deleteAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post) {
        $blog->removePost($post);
        $this->objectManager->get('Lobacher\\Simpleblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->postRepository->remove($post);
        $this->redirect('show', 'Blog',NULL,array('blog'=>$blog));
    }

    /**
     * deleteConfirm action - confirms the deletion of a post
     *
     * @param \Lobacher\Simpleblog\Domain\Model\Blog $blog
     * @param \Lobacher\Simpleblog\Domain\Model\Post $post
     */

    public function deleteConfirmAction(\Lobacher\Simpleblog\Domain\Model\Blog $blog, \Lobacher\Simpleblog\Domain\Model\Post $post) {
        $this->view->assign ('blog', $blog);
        $this->view->assign('post',$post);
    }

}

?>