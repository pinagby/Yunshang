<?php
namespace Yunshang\Bundle\ManageBundle\Service;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\CommonBundle\Service\YunshangService;
use Yunshang\Bundle\ManageBundle\Helper\System\ConfigurationHelper;

class ConfigurationService
{
    private $yunshangService;

    public function __construct(YunshangService  $yunshangService)
    {
        $this->yunshangService = $yunshangService;
    }

    public function getConfigurationHelper(){
        $configurationHelper = new ConfigurationHelper();
        $shopName =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopNameKey());
        $shopDescription =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopDescriptionKey());
        $shopLocale =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopLocaleKey());
        $shopTimezone =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopTimezoneKey());
        $shopLanguage =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopLanguageKey());
        $shopProvince =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopProvinceKey());
        $shopCity =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopCityKey());
        $shopAddress =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopAddressKey());
        $shopQQ =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopQQKey());
        $shopWangwang =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopWangwangKey());
        $shopSkype =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopSkypeKey());
        $shopYahooMessage =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopYahooMessageKey());
        $shopMsn =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopMsnKey());
        $shopEmail =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopEmailKey());
        $shopSalesPhone =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopSalesPhoneKey());
        $shopSupportPhone =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopSalesPhoneKey());
        $shopSupportMobile =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopSupportMobileKey());
        $shopAnnouncement =
            $this->yunshangService->getOptions(ConfigurationHelper::getShopAnnouncementKey());

        $configurationHelper->setShopName($shopName);
        $configurationHelper->setShopDescription($shopDescription);
        $configurationHelper->setShopLocale($shopLocale);
        $configurationHelper->setShopLanguage($shopLanguage);
        $configurationHelper->setShopTimezone($shopTimezone);
        $configurationHelper->setShopProvince($shopProvince);
        $configurationHelper->setShopCity($shopCity);
        $configurationHelper->setShopAddress($shopAddress);
        $configurationHelper->setShopQQ($shopQQ);
        $configurationHelper->setShopWangwang($shopWangwang);
        $configurationHelper->setShopSkype($shopSkype);
        $configurationHelper->setShopYahooMessage($shopYahooMessage);
        $configurationHelper->setShopMsn($shopMsn);
        $configurationHelper->setShopEmail($shopEmail);
        $configurationHelper->setShopSalesPhone($shopSalesPhone);
        $configurationHelper->setShopSupportPhone($shopSupportPhone);
        $configurationHelper->setShopSupportMobile($shopSupportMobile);
        $configurationHelper->setShopAnnouncement($shopAnnouncement);


        return $configurationHelper;
    }

    public function setConfigurationHelper(ConfigurationHelper $configurationHelper){
        $shopName = $configurationHelper->getShopName();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopNameKey(),$shopName);
              
        $shopDescription = $configurationHelper->getShopDescription();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopDescriptionKey(),$shopDescription);


        $shopLocale = $configurationHelper->getShopLocale();
        if(!empty($shopLocale)){
            $this->yunshangService->setOptions(ConfigurationHelper::getShopLocaleKey(),$shopLocale);
        }

        $shopLanguage = $configurationHelper->getShopLanguage();
        if(!empty($shopLanguage)){
            $this->yunshangService->setOptions(ConfigurationHelper::getShopLanguageKey(),$shopLanguage);
        }
        
        $shopTimezone = $configurationHelper->getShopTimezone();
        if(!empty($shopTimezone)){
            $this->yunshangService->setOptions(ConfigurationHelper::getShopTimezoneKey(),$shopTimezone);
        }

        $shopProvince = $configurationHelper->getShopProvince();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopProvinceKey(),$shopProvince);
        
        $shopCity = $configurationHelper->getShopCity();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopCityKey(),$shopProvince);

        $shopAddress = $configurationHelper->getShopAddress();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopAddressKey(),$shopAddress);
        
        $shopQQ = $configurationHelper->getShopQQ();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopQQKey(),$shopQQ);
        
        $shopWangwang = $configurationHelper->getShopWangwang();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopWangwangKey(),$shopWangwang);
        
        $shopSkype = $configurationHelper->getShopSkype();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopSkypeKey(),$shopSkype);
        
        $shopYahooMessage = $configurationHelper->getShopYahooMessage();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopYahooMessageKey(),$shopYahooMessage);
        
        $shopMsn = $configurationHelper->getShopMsn();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopMsnKey(),$shopMsn);
        
        $shopEmail = $configurationHelper->getShopEmail();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopEmailKey(),$shopEmail);
        
        $shopSalesPhone = $configurationHelper->getShopSalesPhone();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopSalesPhoneKey(),$shopSalesPhone);
        
        $shopSupportPhone = $configurationHelper->getShopSupportPhone();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopSupportPhoneKey(),$shopSupportPhone);
        
        $shopSupportMobile = $configurationHelper->getShopSupportMobile();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopSupportMobileKey(),$shopSupportMobile);
        
        $shopAnnouncement = $configurationHelper->getShopAnnouncement();
        $this->yunshangService->setOptions(ConfigurationHelper::getShopAnnouncementKey(),$shopAnnouncement);
        
        
    }

}
