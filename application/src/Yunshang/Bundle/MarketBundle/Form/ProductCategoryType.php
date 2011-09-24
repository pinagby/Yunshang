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
    private $categories;
    public function __construct($categories){
        $this->categories = $categories;
    }
    public function buildForm(FormBuilder $builder, array $options)
    { 
        $builder
            ->add('name')
            ->add('description')
            ->add('sequence')
            ->add('parent',null,array('required' => false,
                                          'choices'=>$this->categories));
    }

    public function getName()
    {
        return 'yunshang_bundle_marketbundle_productcategorytype';
    }
}
