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
        $builder
            ->add('name')
            ->add('description')
            ->add('sequence')
            ->add('parent','choice',array('required' => false));
    }

    public function getName()
    {
        return 'yunshang_bundle_marketbundle_productcategorytype';
    }
}
