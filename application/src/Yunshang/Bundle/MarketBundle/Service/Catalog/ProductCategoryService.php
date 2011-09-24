<?php

namespace Yunshang\Bundle\MarketBundle\Service\Catalog;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\MarketBundle\Entity\Catalog\ProductCategory;

/**
 *
 *@author <a href="http://haulynjason.net">Haulyn Jason</a>
 *
 */
class ProductCategoryService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }    

    public function getTopParentCategories(){
        $query = $this->em->createQuery('SELECT pc FROM YunshangMarketBundle:ProductCategory pc WHERE pc.parent is null');
        $entities = $query->getResult();
        return $entities;
    }

    /**
     *@author <a href="http://haulynjason.net" target="_blank">Haulyn Jason</a>
     *@fixme This function does not support unlimited subcategory, it only support 3 level
     * I will fix this problem later, refactor to support mulitple unlimited subcategory.
     *
     */
    public function getIdentedCategories($level=3){
        $result = array();
        $topParentCategories = $this->getTopParentCategories();
        foreach($topParentCategories as $category){
            $result[]=$category;
            if($category->hasSubCategory()){
                foreach($category->getSubCategory() as $subCategory){
                    $result[]=$this->buildIdentedCategoryName($subCategory);
                    //@important you need to make sure the level to be 2 if you want people to create new subcategory
                    if($subCategory->hasSubCategory()&&$level==3){
                        foreach($subCategory->getSubCategory() as $ssubCategory){
                            $result[]=$this->buildIdentedCategoryName($ssubCategory);
                        }
            }

                }
            }
        }
        return $result;
    }

    private function buildIdentedCategoryName($category){
        if($category->getDeep()===1){
            $leng = $category->getDeep()+2;
        }else{
            $leng = $category->getDeep()*2+2;
        }
        $nameArray = array();
        $nameArray[0] = '|';
        for($i=1;$i<$leng-1;$i++){
            $nameArray[$i]='-';
        }
        $nameArray[$leng] = $category->getName();
        $name = implode($nameArray);
        $category->setName($name);
        return $category;
    }

}