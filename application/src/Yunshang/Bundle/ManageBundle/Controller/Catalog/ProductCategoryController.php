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
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('YunshangMarketBundle:ProductCategory')->findAll();

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
        
        $form   = $this->createForm(new ProductCategoryType(), $entity);
        
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
        $form    = $this->createForm(new ProductCategoryType(), $entity);        
        $form->bindRequest($request);

        $currentDatetime = date_create(date("F j, Y, g:i a"));
        
        $entity->setCreated($currentDatetime);
        $entity->setModified($currentDatetime);

        $currentMember = $this->get("security.context")->getToken()->getUser();
        
        $entity->setMember($currentMember);

        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);            
            $em->flush();

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
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $editForm = $this->createForm(new ProductCategoryType(), $entity);
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

        $editForm   = $this->createForm(new ProductCategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product_category_edit', array('id' => $id)));
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
