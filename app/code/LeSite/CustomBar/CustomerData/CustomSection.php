<?php
namespace LeSite\CustomBar\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomSection extends \Magento\Framework\View\Element\Template implements SectionSourceInterface
{
    
    protected $_customerSession;
    protected $_customerGroupCollection;
  
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\SessionFactory $customerSession,
        \Magento\Customer\Model\Group $customerGroupCollection,
        array $data = []
    ) {
        $this->_customerSession = $customerSession->create();
        $this->_customerGroupCollection = $customerGroupCollection;
        parent::__construct($context, $data);
    }
  
    /**
    * @return string
    */
    public function getSectionData()
    {
        $result = [];
        if ($this->_customerSession->getCustomerId()):
            $groupId = $this->_customerSession->getCustomer()->getGroupId();
            $groupData = $this->_customerGroupCollection->load($groupId);
        
            $result = [
                'customerGroup' => $groupData->getCustomerGroupCode(),
            ];
        endif;

        return $result;
    }

}