<?php
namespace Yunshang\Bundle\CommonBundle\Service;


use Symfony\Component\HttpFoundation\Request;


class InfrastructureService
{
    private Request $request ;

    public function __construct(Request $request){
        $this->request = $request ;
    }
    
    public function getCurrentDatetime(){
        return date_create(date("F j, Y, g:i a"));
    }

    public function getBasePath(){
        return $this->request->getBasePath();
    }
}