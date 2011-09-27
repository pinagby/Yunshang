<?php
namespace Yunshang\Bundle\CommonBundle\Service;

class InfrastructureService
{
    public function getCurrentDatetime(){
        return date_create(date("F j, Y, g:i a"));
    }

}