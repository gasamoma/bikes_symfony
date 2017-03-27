<?php

namespace EBikeBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use EBikeBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction(Request $request,$cat)
    {
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        $promImgRepo=$this->getDoctrine()->getRepository("EBikeBundle:PromImg");
        $promImgs=$promImgRepo->findAll();
        $session = $this->get("session");
        if($cat==-1)
            $products=$this->getDoctrine()->getRepository("EBikeBundle:Product")->findAll();
        else
            $products=$this->findCat($cat,$categories);
        // replace this example code with whatever you need
        return $this->render('EBikeBundle:General:index.html.twig', array("products"=>$products,"categories"=>$categories,"cat"=>$cat,'promImgs'=>$promImgs));
    }

    public function termsAndConditionsAction(Request $request)
    {
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        // replace this example code with whatever you need
        return $this->render('EBikeBundle:General:termsAndConditions.html.twig', array("categories"=>$categories));
    }

    public function contactAction(Request $request)
    {
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        // replace this example code with whatever you need
        return $this->render('EBikeBundle:General:contact.html.twig', array("categories"=>$categories));
    }

    /**
     * @param $cat
     * @param ArrayCollection $categories
     * @return \Doctrine\Common\Collections\Collection|null
     */
    private function findCat($cat, $categories){
        /** @var Category $category */
        foreach ($categories as $category) {
            if($category->getId()==$cat)
                return $category->getProducts();
        }
        return null;

    }
    public function mediaAction(){
        $mediasRepo=$this->getDoctrine()->getRepository("EBikeBundle:Media");
        $medias=$mediasRepo->findAll();
        return $this->render('EBikeBundle:General:media.html.twig', array("medias"=>$medias));

    }
}
