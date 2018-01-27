<?php

namespace AaronMcGowan\Drupal\Behat\Context;

/**
 * Provides a trait for module related testing.
 */
trait ModuleContextTrait {

  /**
   * Ensures a module is enabled.
   *
   * @Given the module ":module_name" is installed
   *
   * @param string $module_name
   *   The name of the module to enable.
   *
   * @throws \Exception
   *   Thrown if the module was not installed.
   */
  public function theDefaultModuleIsInstalledOrEnabled($module_name) {
    /** @var \Drupal\Core\Extension\ModuleInstallerInterface $module_installer */
    $module_installer = \Drupal::service('module_installer');
    if (!$module_installer->install([$module_name])) {
      throw new \Exception(sprintf("The following module, '%s', cannot be installed.", $module_name));
    }
  }

}