@api
Feature: delete groups
As an admin
I want to be able to delete groups
So that I can remove unnecessary groups

	Background:
		Given using API version "1"

	Scenario Outline: Delete a group
		Given group "<group-name>" has been created
		When the administrator deletes group "<group-name>" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And group "<group-name>" should not exist
		Examples:
			| group-name          | comment                                 |
			| new-group           | dash                                    |
			| the.group           | dot                                     |
			| España              | special European characters             |
			| नेपाली              | Unicode group name                      |
			| 0                   | The "false" group                       |
			| Finance (NP)        | Space and brackets                      |
			| Admin&Finance       | Ampersand                               |
			| admin:Pokhara@Nepal | Colon and @                             |
			| maintenance#123     | Hash sign                               |
			| maint+eng           | Plus sign                               |
			| $x<=>[y*z^2]!       | Maths symbols                           |
			| Mgmt\Middle         | Backslash                               |
			| Mgmt/Sydney         | Slash (special escaping happens)        |
			| Mgmt//NSW/Sydney    | Multiple slash                          |
			| 50%pass             | Percent sign (special escaping happens) |
			| 50%25=0             | %25 literal looks like an escaped "%"   |
			| 50%2Eagle           | %2E literal looks like an escaped "."   |
			| 50%2Fix             | %2F literal looks like an escaped slash |
			| staff?group         | Question mark                           |
