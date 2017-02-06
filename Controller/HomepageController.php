<?php
/**
 * Created by PhpStorm.
 * User: Tonish
 * Date: 06/02/17
 * Time: 09:14
 */

namespace Tonish\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TonishBlog/homepage/index.html.twig');
    }

    public function searchAction(Request $request)
    {
        $word = $request->get('word');

        $finder = $this->container->get('fos_elastica.finder.app.blog');
        $blogs = $finder->find($word);

        return $this->render('@TonishBlog/homepage/search-response.html.twig', array(
            'blogs' => $blogs
        ));
    }
}