@api

Feature: User roles
  In order to protect my site and its content
  As an administrator
  I want to control access with user roles

  Scenario: User roles
    Then exactly the following roles should exist
      | label          | machine name   |
      | Anonymous user | anonymous      |
      | Administrator  | administrator  |
      | Authenticated  | authenticated  |
      | Content editor | content_editor |
