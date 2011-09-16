<?php

namespace Yunshang\Bundle\MarketBundle\Form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Yunshang\Bundle\MarketBundle\Entity\ProductCategory;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;

class ProductCategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    { 
       // array_push($options, "apple");
        //print_r($options);
        $builder
            ->add('name')
            ->add('description')
            ->add('created')
            ->add('modified')
            ->add('sequence')
            ->add('creator')
            ->add('parent',null,array('required' => false))
            ->add('member')
        ;
    }

    public function getName()
    {
        return 'yunshang_bundle_marketbundle_productcategorytype';
    }
}
