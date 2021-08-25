<?php
namespace AHT\Salesagents\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.2') < 0) {

            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->removeAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'sale_agent_id'
            );


            $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'sale_agent_id', [
                'group' => 'SaleAgents',
                'type' => 'text',
                'backend' => '',
                'frontend' => '',
                'sort_order' => 200,
                'label' => 'Sales Agent',
                'input' => 'select',
                'class' => '',
                'source' => 'AHT\Salesagents\Model\Source\Salesagent',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'apply_to' => ''
                ]);
                
                $eavSetup->removeAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'commission_type'
                );
            $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'commission_type', [
                'group' => 'SaleAgents',
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'sort_order' => 210,
                'label' => 'Commission Type',
                'input' => 'select',
                'class' => '',
                'source' => 'AHT\Salesagents\Model\Source\Commissiontype',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'apply_to' => ''
            ]);
                
            $eavSetup->removeAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'commission_value'
            );
            $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'commission_value', [
                'group' => 'SaleAgents',
                'type' => 'decimal',
                'backend' => '',
                'frontend' => '',
                'sort_order' => 220,
                'label' => 'Commission Value',
                'input' => 'text',
                'class' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'unique' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'apply_to' => ''
            ]);
        }
        $setup->endSetup();
    }
}