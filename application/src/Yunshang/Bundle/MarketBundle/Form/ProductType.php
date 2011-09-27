<?php

namespace Yunshang\Bundle\MarketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('code')
            ->add('description')
            ->add('shortDescription')
            ->add('price')
	  ->add('mainPicture','file',array('required'=>false))
            ->add('productCategory')
            ->add('productType')
        ;
    }

    public function getName()
    {
        return 'yunshang_bundle_marketbundle_producttype';
    }
}
