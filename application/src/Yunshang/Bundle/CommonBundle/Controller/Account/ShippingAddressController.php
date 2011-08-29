<?php

namespace Yunshang\Bundle\CommonBundle\Controller\Account;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Yunshang\Bundle\CommonBundle\Entity\Account\ShippingAddress;
use Yunshang\Bundle\CommonBundle\Form\Account\ShippingAddressType;

/**
 * Account\ShippingAddress controller.
 *
 * @Route("/account/shippingaddress")
 */
class ShippingAddressController extends Controller
{
    /**
     * Lists all Account\ShippingAddress entities.
     *
     * @Route("/", name="account_shippingaddress")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('YunshangCommonBundle:Account\ShippingAddress')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Account\ShippingAddress entity.
     *
     * @Route("/{id}/show", name="account_shippingaddress_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangCommonBundle:Account\ShippingAddress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account\ShippingAddress entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Account\ShippingAddress entity.
     *
     * @Route("/new", name="account_shippingaddress_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ShippingAddress();
        $form   = $this->createForm(new ShippingAddressType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Account\ShippingAddress entity.
     *
     * @Route("/create", name="account_shippingaddress_create")
     * @Method("post")
     * @Template("YunshangCommonBundle:Account\ShippingAddress:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new ShippingAddress();
        $request = $this->getRequest();
        $form    = $this->createForm(new ShippingAddressType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('account_shippingaddress_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Account\ShippingAddress entity.
     *
     * @Route("/{id}/edit", name="account_shippingaddress_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangCommonBundle:Account\ShippingAddress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account\ShippingAddress entity.');
        }

        $editForm = $this->createForm(new ShippingAddressType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Account\ShippingAddress entity.
     *
     * @Route("/{id}/update", name="account_shippingaddress_update")
     * @Method("post")
     * @Template("YunshangCommonBundle:Account\ShippingAddress:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangCommonBundle:Account\ShippingAddress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Account\ShippingAddress entity.');
        }

        $editForm   = $this->createForm(new ShippingAddressType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('account_shippingaddress_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Account\ShippingAddress entity.
     *
     * @Route("/{id}/delete", name="account_shippingaddress_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('YunshangCommonBundle:Account\ShippingAddress')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Account\ShippingAddress entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('account_shippingaddress'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
