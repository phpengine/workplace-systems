Feature: Your first feature
Lets check out the home page is working

  Scenario: Lets check the Home Page works
    Given I start a new session
    Then I am on "http://www.workplace-systems.vm/"
    Then I should see the workplace logo
    Then I should see the site menu
    Then I end the session
