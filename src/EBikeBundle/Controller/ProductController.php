<?php

namespace EBikeBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use EBikeBundle\Entity\Category;
use EBikeBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{

    public function showProductAction($id)
    {
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        $productRepo=$this->getDoctrine()->getRepository("EBikeBundle:Product");
        $product=$productRepo->find($id);
        if($product!=null)
            return $this->render('EBikeBundle:Product:product.html.twig', array("product"=>$product,"categories"=>$categories));
        else
            return $this->redirectToRoute('homepage');
    }
    public function showCartAction()
    {
        $session = $this->get("session");
        $cart=$session->get('cart');
        if($cart==null){
            $this->addFlash(
                'notice',
                'No tienes articulos en tu carrito!'
            );
            return $this->redirectToRoute('homepage');
        }
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        $productRepo=$this->getDoctrine()->getRepository("EBikeBundle:Product");
        $products= new ArrayCollection();
        foreach ($cart as $key => $productId) {
            $products->add($productRepo->find($productId));
        }

        return $this->render('EBikeBundle:Product:cart.html.twig', array("products"=>$products,"categories"=>$categories));

    }
    public function addProductAction($idProd)
    {
        $session = $this->get("session");
        $cart=$session->get('cart');
        $cart[]=$idProd;
        $session->set('cart', $cart);
        return $this->redirectToRoute('homepage');
    }

    public function removeProductAction($idProd)
    {
        $session = $this->get("session");
        $cart=$session->get('cart');
        foreach ($cart as $key => $value) {
            if($value==$idProd){
                unset($cart[$key]);
                break;
            }
        }
        $session->set('cart', $cart);
        return $this->redirectToRoute('show_cart');
    }
    public function checkoutAction()
    {
        $session = $this->get("session");
        $cart=$session->get('cart');
        if($cart==null){
            $this->addFlash(
                'notice',
                'No tienes articulos en tu carrito!'
            );
            return $this->redirectToRoute('homepage');
        }
        $catRepo=$this->getDoctrine()->getRepository("EBikeBundle:Category");
        $categories=$catRepo->findAll();
        $productRepo=$this->getDoctrine()->getRepository("EBikeBundle:Product");
        $products= new ArrayCollection();
        $totalValue=0;
        foreach ($cart as $key => $productId) {
            /** @var Product $rProd */
            $rProd=$productRepo->find($productId);
            $products->add($rProd);
            $totalValue+=$rProd->getPrice();
        }
        return $this->render('EBikeBundle:Product:checkout.html.twig', array("products"=>$products,"categories"=>$categories, "totalValue"=>$totalValue));

    }

}
