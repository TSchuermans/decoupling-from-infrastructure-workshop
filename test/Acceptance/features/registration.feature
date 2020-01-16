Feature: Registration

  Scenario: A scheduled training shows up in Upcoming events
    Given today is "01-01-2020"
    When the organizer schedules a new training called "Decoupling from infrastructure" for "24-01-2020"
    Then it shows up on the list of upcoming events

  @ignore
  Scenario: Attendees can register themselves for sessions
    Given the organizer has scheduled a training
    When a user buys a ticket for this training
    Then they should be registered as an attendee

  @ignore
  Scenario: Attendees can't register themselves if the maximum number of attendees was reached
    Given the organizer has scheduled a training with a maximum of 5 attendees
    And so far 4 attendees have registered themselves for this training
    When a user buys a ticket for this training
    Then the training will be sold out
    And it's impossible to buy another ticket for this training

  @ignore
  Scenario: After the end-of-sales date you can't register for it anymore
    Given a trainig has been scheduled for which sales ends on "15-01-2020"
    When it's "15-01-2020"
    Then it's impossible to buy a ticket for this training

  @ignore
  Scenario: On the day of the training, it will no longer be an upcoming event
    Given a trainig has been scheduled for "24-01-2020"
    When it's "24-01-2020"
    Then it does not show up on the list of upcoming events anymore
