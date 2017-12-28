<?php

namespace AaronMcGowan\Drupal\Behat\Context;

use Drupal\DrupalExtension\Context\RawDrupalContext;

/**
 * Defines a simple context for testing user roles.
 */
class UserRolesContext extends RawDrupalContext {

  use UserRolesContextTrait;

}
