<?php

namespace Yunshang\Bundle\ManageBundle\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Yunshang\Bundle\MarketBundle\Entity\ProductCategory;
use Yunshang\Bundle\MarketBundle\Form\ProductCategoryType;

/**
 * ProductCategory controller.
 *
 * @Route("/product/category")
 */
class ProductCategoryController extends Controller
{

    /**
     * Lists all ProductCategory entities.
     *
     * @Route("/", name="product_category")
     * @Template()
     */
    public function indexAction()
    {
        $productCategoryService = $this->get('YunshangMarketBundle.productCategoryService');
        $entities = $productCategoryService->getIdentedCategories();
        return array('entities' => $entities);
    }

    /**
     * Finds and displays a ProductCategory entity.
     *
     * @Route("/{id}/show", name="product_category_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView()
        );
    }

    /**
     * Displays a form to create a new ProductCategory entity.
     *
     * @Route("/new", name="product_category_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProductCategory();

        $productCategoryService = $this->get('YunshangMarketBundle.productCategoryService');
        $entities = $productCategoryService->getIdentedCategories(2);
        $formType = new ProductCategoryType($entities);
        $form = $this->createForm($formType, $entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new ProductCategory entity.
     *
     * @Route("/create", name="product_category_create")
     * @Method("post")
     * @Template("YunshangMarketBundle:ProductCategory:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new ProductCategory();
        $request = $this->getRequest();

        $productCategoryService = $this->get('YunshangMarketBundle.productCategoryService');
        $entities = $productCategoryService->getCategories();
        $formType = new ProductCategoryType($entities);

        $form= $this->createForm($formType, $entity);        
        $form->bindRequest($request);

        if ($form->isValid()) {
	  $currentMember = $this->get("security.context")->getToken()->getUser();
	  $productCategoryService->createCategory($entity,$currentMember);

	  return $this->redirect($this->generateUrl('product_category_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing ProductCategory entity.
     *
     * @Route("/{id}/edit", name="product_category_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $editTime = date_create(date("F j, Y, g:i a"));
        
        $entity = $em->getRepository('YunshangMarketBundle:ProductCategory')->find($id);
        $entity->setModified($editTime);
        $name=$entity->getName();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

	$productCategoryService = $this->get("YunshangMarketBundle.ProductCategoryService");
        $entities = $productCategoryService->getIdentedCategories(2);
        $formType = new ProductCategoryType($entities);

        $entity->setName($name);
        $editForm = $this->createForm($formType, $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ProductCategory entity.
     *
     * @Route("/{id}/update", name="product_category_update")
     * @Method("post")
     * @Template("YunshangMarketBundle:ProductCategory:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $productCategoryService = $this->get('YunshangMarketBundle.productCategoryService');
        $entities = $productCategoryService->getCategories();
        $formType = new ProductCategoryType($entities);

        $editForm   = $this->createForm($formType, $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
	  $productCategoryService->updateCategory($entity);
	  
	  return $this->redirect($this->generateUrl('product_category_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ProductCategory entity.
     *
     * @Route("/{id}/delete", name="product_category_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('YunshangMarketBundle:ProductCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product_category'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
