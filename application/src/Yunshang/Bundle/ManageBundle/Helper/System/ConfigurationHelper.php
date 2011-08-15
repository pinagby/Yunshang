<?php

namespace Yunshang\Bundle\ManageBundle\Helper\System;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Helper Class as POJO, for system\configuration form.
 * @author <a href="http://haulynjason.net">Haulyn Jason</a>
 * @version 0.1
 */
class ConfigurationHelper{

    /**
     * @Assert\NotBlank()
     */
    private $shopName;

    public function setShopName($shopName){
        $this->shopName = $shopName;
    }

    public function getShopName(){
        return $this->shopName;
    }

    public static function getShopNameKey(){
        return 'YUNSHANGSHOPNAME';
    }
    
    private $shopDescription;

    public function setShopDescription($shopDescription){
        $this->shopDescription = $shopDescription;
    }

    public function getShopDescription(){
        return $this->shopDescription;
    }

    public static function getShopDescriptionKey(){
        return 'YUNSHANGSHOPDESCRIPTION';
    }

    private $shopLocale;

    public function setShopLocale($shopLocale){
        $this->shopLocale = $shopLocale;
    }

    public function getShopLocale(){
        return $this->shopLocale;
    }

    public static function getShopLocaleKey(){
        return 'YUNSHANGSHOPLOCALE';
    }


    private $shopTimezone;

    public function setShopTimezone($shopTimezone){
        $this->shopTimezone = $shopTimezone;
    }

    public function getShopTimezone(){
        return $this->shopTimezone;
    }

    public static function getShopTimezoneKey(){
        return 'YUNSHANGSHOPTIMEZONE';
    }
    
    private $shopLanguage;

    public function setShopLanguage($shopLanguage){
        $this->shopLanguage = $shopLanguage;
    }

    public function getShopLanguage(){
        return $this->shopLanguage;
    }

    public static function getShopLanguageKey(){
        return 'YUNSHANGSHOPLANGUAGE';
    }
    
    private $shopProvince;

    public function setShopProvince($shopProvince){
        $this->shopProvince = $shopProvince;
    }

    public function getShopProvince(){
        return $this->shopProvince;
    }

    public static function getShopProvinceKey(){
        return 'YUNSHANGSHOPPROVINCE';
    }

    private $shopCity;

    public function setShopCity($shopCity){
        $this->shopCity = $shopCity;
    }

    public function getShopCity(){
        return $this->shopCity;
    }

    public static function getShopCityKey(){
        return 'YUNSHANGSHOPCITY';
    }

    private $shopAddress ;

    public function setShopAddress($shopAddress){
        $this->shopAddress($shopAddress);
    }

    public function getShopAddress(){
        return $this->shopAddress;        
    }

    public static function getShopAddressKey(){
        return 'YUNSHANGSHOPADDRESS';
    }

    private $shopQQ ;

    public function setShopQQ($shopQQ){
        $this->shopQQ = $shopQQ;
    }

    public function getShopQQ(){
        return $this->shopQQ;
    }

    public static function getShopQQKey(){
        return 'YUNSHANGSHOPQQ';
    }

    private $shopWangwang;

    public function setShopWangwang($shopWangwang){
        $this->shopWangwang = $shopWangwang;
    }

    public function getShopWangwang(){
        return $this->shopWangwang;
    }

    public static function getShopWangwangKey(){
        return 'YUNSHANGSHOPWANGWANG';
    }

    private $shopSkype;

    public function setShopSkype($shopSkype){
        $this->shopSkype = $shopSkype;
    }

    public function getShopSkype(){
        return $this->shopSkype;
    }

    public static function getShopSkypeKey(){
        return 'YUNSHANGSHOPSKYPE';
    }

    private $shopYahooMessage ;

    public function setShopYahooMessage($shopYahooMessage){
        $this->shopYahooMessage = $shopYahooMessage;
    }

    public function getShopYahooMessage(){
        return $this->shopYahooMessage;
    }

    public static function getShopYahooMessageKey(){
        return 'YUNSHANGSHOPYAHOOMESSAGE';
    }

    private $shopMsn ;

    public function setShopMsn($shopMsn){
        $this->shopMsn = $shopMsn;
    }

    public function getShopMsn(){
        return $this->shopMsn;
    }

    public static function getShopMsnKey(){
        return 'YUNSHANGSHOPMSN';
    }

    private $shopEmail;

    public function setShopEmail($shopEmail){
        $this->shopEmail = $shopEmail;
    }

    public function getShopEmail(){
        return $this->shopEmail;
    }

    public static function getShopEmailKey(){
        return 'YUNSHANGSHOPEMAIL';
    }

    private $shopSalesPhone;

    public function setShopSalesPhone($shopSalesPhone){
        $this->shopSalesPhone = $shopSalesPhone;
    }

    public function getShopSalesPhone(){
        return $this->shopSalesPhone;
    }

    public static function getShopSalesPhoneKey(){
        return 'YUNSHANGSHOPSALESPHONE';
    }

    private $shopSalesMobile ;

    public function setShopSalesMobile($shopSalesMobile){
        $this->shopSalesMobile = $shopSalesMobile;
    }

    public function getShopSalesMobile() {
        return $this->shopSalesMobile;
    }

    public static function getShopSalesMobileKey(){
        return 'YUNSHANGSHOPSALESMOBILE';
    }

    private $shopSupportPhone;

    public function setShopSupportPhone($shopSupportPhone){
        $this->shopSupportPhone = $shopSupportPhone;
    }

    public function getShopSupportPhone(){
        return $this->shopSupportPhone;
    }

    public static function getShopSupportPhoneKey(){
        return 'YUNSHANGSHOPSUPPORTPHONE';
    }

    private $shopSupportMobile;

    public function setShopSupportMobile($shopSupportMobile){
        $this->shopSupportMobile = $shopSupportMobile;
    }

    public function getShopSupportMobile(){
        return $this->shopSupportMobile;
    }

    public static function getShopSupportMobileKey(){
        return 'YUNSHANGSHOPSUPPORTMOBILE';
    }

    private $shopAnnouncement;

    public function setShopAnnouncement($shopAnnouncement){
        $this->shopAnnouncement = $shopAnnouncement;
    }

    public function getShopAnnouncement(){
        return $this->shopAnnouncement;
    }

    public static function getShopAnnouncementKey(){
        return 'YUNSHANGSHOPANNOUNCEMENT';
    }

    private $shopMaxUplaod;

    public function setShopMaxUpload($shopMaxUpload){
        $this->shopMaxUpload = $shopMaxUpload;
    }

    public function getShopMaxUpload(){
        return $this->shopMaxUpload;
    }

    public static function getShopMaxUploadKey(){
        return 'YUNSHANGSHOPMAXUPLOADKEY';
    }

    // for a new world.
    /*
是我生命中的精灵
你知道我所有的心情
是你将我从梦中叫醒
再一次　再一次给我开放的心灵

关于爱情的路啊　我们都曾经走过
关于爱情的歌啊　我们已听的太多

关于我们的事啊　他们统统都猜错
关于心中的话　心中的话
只对你　一个人说

我所有目光的交点
在你额头的两道弧线
它隐隐约约它若隐若现
衬托你　衬托你腼腆的容颜
     */
}