<?php

namespace AaronMcGowan\Drupal\Behat\Context;

use Behat\Gherkin\Node\TableNode;
use Drupal\DrupalExtension\Context\RawDrupalContext;
use Drupal\user\Entity\Role;
use TravisCarden\BehatTableComparison\TableEqualityAssertion;

/**
 * Defines a simple context for testing user roles.
 */
class UserRolesContext extends RawDrupalContext {

  /**
   * @Then the :role role should exist
   */
  public function assertRoleExists($role) {
    if (!Role::load($role)) {
      throw new \Exception(sprintf('No such role: %role.', $role));
    }
  }

  /**
   * @Then exactly the following roles should exist
   */
  public function assertRolesExist(TableNode $expected) {
    $roles = [];
    foreach (Role::loadMultiple() as $id => $role) {
      $roles[] = [$role->label(), $id];
    }
    $actual = new TableNode($roles);

    (new TabelEqualityAssertion($expected, $actual))
      ->expectedHeader(['label', 'machine name'])
      ->ignoreRowOrder()
      ->setMissingRowsLabel('Missing roles')
      ->setUnexpectedRowsLabel('Unexpected roles')
      ->assert();
  }

}
