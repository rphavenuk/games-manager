Feature:
  When I view active branch games
  I want to see the number of slots free
  So I can determine if any games are available to join.

  Scenario: All games are active:
    Given that there are games:

      | Branch      | System             | Name                 | Slots | Players  | Status            | Starts           | Ends             | Sessions |
      | Stratford   | D&D 5E             | Servants of Aurelia  |  5    |   4      | Accepting Players | 2024-01-01 19:00 | 2024-04-01 22:00 | 12       |
      | Hammersmith | D&D 5E             | The Mysterious Keep  |  5    |   5      | Accepting Players | 2024-01-01 19:00 | 2024-04-01 22:00 | 12       |
      | Stratford   | Modiphius Infinity | Black Sanction       |  5    |   1      | Accepting Players | 2024-01-01 19:00 | 2024-04-01 22:00 | 12       |
      | Liverpool   | Modiphius Infinity | Pacman vs Godzilla   |  5    |   4      | Accepting Players | 2023-01-01 19:00 | 2024-01-01 22:00 | 12       |

    And today is '2024-02-03'
    When I check available games
    Then I see the following games:

      | Branch      | System             | Name                 | Slots | Players  | Status            | Starts           | Ends             | Sessions |
      | Stratford   | D&D 5E             | Servants of Aurelia  |  5    |   4      | Accepting Players | 2024-01-01 19:00 | 2024-04-01 22:00 | 12       |
      | Stratford   | Modiphius Infinity | Black Sanction       |  5    |   1      | Accepting Players | 2024-01-01 19:00 | 2024-04-01 22:00 | 12       |

