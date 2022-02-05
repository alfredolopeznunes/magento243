<?php
namespace LeSite\CustomBar\Block;

class Index extends \Magento\Framework\View\Element\Template
{
  /**
   * @var \Magento\Framework\App\Http\Context
   */
  private $httpContext;
  protected $_dataHelper;

  public function __construct(
      \Magento\Framework\View\Element\Template\Context $context,
      \Magento\Framework\App\Http\Context $httpContext,
      \LeSite\CustomBar\Helper\Data $dataHelper,
      array $data = []
  ) {
      $this->httpContext = $httpContext;
      $this->_dataHelper = $dataHelper;
      parent::__construct($context, $data);
  }

  /**
  * @return boolean
  */
  public function isModuleEnabled()
  {
    return $this->_dataHelper->isModuleEnabled();
  }
}
