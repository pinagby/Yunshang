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
            ->add('description')
            ->add('shortDescription')
            ->add('status')
            ->add('created')
            ->add('modified')
            ->add('started')
            ->add('ended')
            ->add('code')
            ->add('price')
            ->add('specialPrice')
            ->add('specialPriceStarted')
            ->add('specialPriceEnded')
            ->add('mainPicture')
            ->add('amount')
            ->add('specialAmount')
            ->add('productCategory')
            ->add('member')
            ->add('productAttributeSet')
            ->add('productType')
        ;
    }

    public function getName()
    {
        return 'yunshang_bundle_marketbundle_producttype';
    }
}
