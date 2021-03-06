@api
Feature: delete groups
As an admin
I want to be able to delete groups
So that I can remove unnecessary groups

	Background:
		Given using API version "2"

	Scenario: Delete a group
		Given group "new-group" has been created
		When the administrator deletes group "new-group" using the API
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And group "new-group" should not exist

	Scenario: Delete a group with special characters
		Given group "España" has been created
		When the administrator deletes group "España" using the API
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And group "España" should not exist