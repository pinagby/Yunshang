<?php

namespace Yunshang\Bundle\ManageBundle\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Yunshang\Bundle\MarketBundle\Entity\Product;
use Yunshang\Bundle\MarketBundle\Form\ProductType;

/**
 * Product controller.
 *
 * @Route("/product")
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("/", name="product")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('YunshangMarketBundle:Product')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Product entity.
     *
     * @Route("/{id}/show", name="product_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
	    'basePath' =>$this->get('request')->getBasePath());
    }

    /**
     * Displays a form to create a new Product entity.
     *
     * @Route("/new", name="product_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Product();
	$identedCategories = $this->get("YunshangMarketBundle.productCategoryService")->getIdentedCategories();
        $form   = $this->createForm(new ProductType($identedCategories), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Product entity.
     *
     * @Route("/create", name="product_create")
     * @Method("post")
     * @Template("YunshangMarketBundle:Product:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Product();
        $request = $this->getRequest();
        $form    = $this->createForm(new ProductType(), $entity);
        $form->bindRequest($request);

        $currentDateTime = date_create(date("F j, Y, g:i a"));
        $currentMember = $this->get("security.context")->getToken()->getUser();
        
        $entity->setStatus(true);
        $entity->setMember($currentMember);
        $entity->setCreated($currentDateTime);
        $entity->setModified($currentDateTime);

	
	$fileUploadService = $this->get("YunshangCommonBundle.fileUploadService");
	$path = $fileUploadService->upload($entity->getMainPicture());
	$entity->setMainPicture($path);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     * @Route("/{id}/edit", name="product_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

	$identedCategories = $this->get("YunshangMarketBundle.productCategoryService")->getIdentedCategories();

        $editForm = $this->createForm(new ProductType($identedCategories), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Product entity.
     *
     * @Route("/{id}/update", name="product_update")
     * @Method("post")
     * @Template("YunshangMarketBundle:Product:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:Product')->find($id);
        $mainPicture = $entity->getMainPicture();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm   = $this->createForm(new ProductType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if(null!=$entity->getMainPicture()){
	    $fileUploadService = $this->get("YunshangCommonBundle.fileUploadService");
	    $path = $fileUploadService->upload($entity->getMainPicture());
	    $entity->setMainPicture($path);
	}else{
	  $entity->setMainPicture($mainPicture);
	}
	  
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Product entity.
     *
     * @Route("/{id}/delete", name="product_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('YunshangMarketBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
