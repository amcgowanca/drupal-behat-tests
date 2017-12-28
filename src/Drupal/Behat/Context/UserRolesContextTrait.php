<?php

namespace AaronMcGowan\Drupal\Behat\Context;

use Behat\Gherkin\Node\TableNode;
use Drupal\user\Entity\Role;
use TravisCarden\BehatTableComparison\TableEqualityAssertion;

/**
 * Provides a trait for assertion testing user roles using table comparisons.
 */
trait UserRolesContextTrait {

  /**
   * @Then exactly the following roles should exist
   */
  public function assertRolesExist(TableNode $expected) {
    $roles = [];
    foreach (Role::loadMultiple() as $id => $role) {
      $roles[] = [$role->label(), $id];
    }
    $actual = new TableNode($roles);

    $assertion = new TableEqualityAssertion($expected, $actual);
    $assertion->expectedHeader(['label', 'machine name'])
      ->ignoreRowOrder()
      ->setMissingRowsLabel('Missing roles')
      ->setUnexpectedRowsLabel('Unexpected roles')
      ->assert();
  }

}
