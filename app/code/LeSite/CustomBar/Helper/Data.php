<?php
namespace LeSite\CustomBar\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
   const MODULE_ENABLE = "LeSite_CustomBar/general/enable";

   /**
   * @param string $path
   * @return array
   */
   public function getDefaultConfig($path)
   {
       return $this->scopeConfig->getValue($path, \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
   }

  /**
  * @return boolean
  */
   public function isModuleEnabled()
   {
       return (bool) $this->getDefaultConfig(self::MODULE_ENABLE);
   }
 }