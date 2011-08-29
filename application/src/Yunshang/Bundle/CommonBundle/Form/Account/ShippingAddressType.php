<?php

namespace Yunshang\Bundle\CommonBundle\Form\Account;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ShippingAddressType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('shippingName')
            ->add('zip')
            ->add('mobile1')
            ->add('mobile2')
            ->add('phone1')
            ->add('phone2')
            ->add('country')
            ->add('state')
            ->add('city')
            ->add('address1')
            ->add('address2')
            ->add('shippingTimeStarted')
            ->add('shippingTimeEnded')
            ->add('sequence')
            ->add('status')
            ->add('created')
            ->add('modified')
            ->add('member')
        ;
    }

    public function getName()
    {
        return 'yunshang_bundle_commonbundle_account_shippingaddresstype';
    }
}
