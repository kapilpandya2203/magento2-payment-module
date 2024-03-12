<?php

namespace Epay\Payment\Setup\Patch\Data;

// use InMobile\InMobile\Helper\Data;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

/**
 * UpdateConfiguration Data Patch Class to remove old config values
 */
class UpdateConfiguration implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * UpdateConfiguration Data Patch constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    /**
     * Apply the data patch.
     */
    public function apply()
    {
        $this->updateConfiguration();
    }

    /**
     * Revert the data patch.
     */
    public function revert()
    {
        return true;
    }

    /**
     * Retrieve aliases for the data patch.
     *
     * @return array
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * Retrieve dependencies for the data patch.
     *
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Update the config Values in core_config_data table
     */
    private function updateConfiguration()
    {
        $configTable = $this->moduleDataSetup->getTable('core_config_data');
        $connection = $this->moduleDataSetup->getConnection();
    
        $select = $connection->select()->from($configTable)
            ->where('path LIKE ?', '%payment/bambora_epay%');
        $oldConfigValues = $connection->fetchAll($select);
    
        foreach ($oldConfigValues as $oldConfig) {
            // Skip certain paths
            if ($oldConfig['path'] === 'payment/bambora_epay/active' || $oldConfig['path'] === 'payment/bambora_epay/title') {
                continue; // Skip this iteration
            }
    
            // Define the new path here
            $path = str_replace('payment/bambora_epay', 'payment/epay', $oldConfig['path']);
    
            // Insert the new values into the database
            $connection->insert($configTable, [
                'scope' => $oldConfig['scope'],
                'scope_id' => $oldConfig['scope_id'],
                'path' => $path, // Use the new path
                'value' => $oldConfig['value'],
            ]);
        }
    }
   
}
