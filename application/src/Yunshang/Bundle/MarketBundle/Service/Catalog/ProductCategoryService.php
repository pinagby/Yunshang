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

    public function getCategories(){
      return $this->em->getRepository('YunshangMarketBundle:ProductCategory')->findAll();
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
     *@fixme Has fatal bug, it display categories as the following
     *
     *
     *1	服装鞋帽	服装鞋帽		Edit 
     *2	 |-|-|-|-男士衬衫	男士衬衫	服装鞋帽	Edit 
     *3	家用电器	家用电器		Edit 
     *4	 |-|-电冰箱	电冰箱	家用电器	Edit 
     *5	 |-电脑	电脑	家用电器	Edit
     *
     *@important fixme
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

    public function createCategory($category,$member){
      if(null!=$category->getParent()&&null!=$category->getParent()->getParent()
	 &&null!=$category->getParent()->getParent()->getParent()){
	throw new \OverflowException("Only 3 levels category support");
      }
        $currentDatetime = date_create(date("F j, Y, g:i a"));
        $category->setCreated($currentDatetime);
        $category->setModified($currentDatetime);
        $category->setMember($member);
	$this->em->persist($category);
	$this->em->flush();
    }

    public function updateCategory($category){
      if(null!=$category->getParent()&&null!=$category->getParent()->getParent()
	 &&null!=$category->getParent()->getParent()->getParent()){
	throw new \OverflowException("Only 3 levels category support");
      }
      $currentDatetime = date_create(date("F j,Y,g:i a"));
      $category->setModified($currentDatetime);
      $this->em->persist($category);
      $this->em->flush();
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