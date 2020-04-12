# Database_projects

This project is done under course id CSE 5330. This project contains the queries for below statements

1.  Create the following tables for the SOCCER (world cup 2014 information) database with fields: COUNTRY, PLAYER, MATCH_RESULTS, PLAYER_ASSISTS_GOALS, PLAYER_CARDS.

2.  Write one or more database programs to load the records that will be provided to you into each of the tables that you created.

3.  Write down the queries for the English queries that are listed below :

 *  Print the name, club, and country name of all midfielder players whose country is 'USA'.

 *  Print the name, club, country and age of captains of each country participating in the 2014 world cup (this database)

*  Retrieve the names of countries participating in the 2014 world cup (this database) that have won the world cup more than twice.

*  Retrieve the names of countries participating in the 2014 world cup (this database) that have never won the world cup.

*  Retrieve the name and country of the player who had neither red cards nor yellow cards in the 2014 world cup.

*  Retrieve the name and country of the players with the most Red cards in the 2014 world cup.

*  For each Host city, retrieve the HostCity and the total number of games played in that city.

*  Retrieve the names of host city with the most games played in that city.

*  For each country, retrieve the country name and the number of games they played as Team1 in the MATCH_RESULTS table, and the total goals scored (SUM of Team1_score) and the goals against (SUM of Team2_score).

* For each country, retrieve the country name and the number of games they played as Team2 in the MATCH_RESULTS table, and the total goals scored (SUM of Team12_score) and the goals against (SUM of Team1_score)


* Write a query that combines the results of the queries in 9. and 10. To get the total number of games each country has played (either as Team1 or as Team2), their total goals scored and their total goals against. Create a view TEAM_SUMMARY that has the following data attributes to hold the result of the combined query: CountryName, NoOfGames, TotalGoalsFor, TotalGoalsAgainst. Order in descending order of number of games played.

* For each match, print the date of match, name of team1, name of team2, name of winning team and goal difference between teams. Goal difference should be a positive value.

* Find all the matches played with country ‘Brazil’.

* Retrieve the names of the players who have scored at least one goal, the player’s country, and the number of goals each player scored. Order the result by number of goals scored in descending order.

* Repeat before query. But only for the players who have more than 2 goals.

*  Make a list of participating countries and their population, ordered in descending order of population. 



4.  Execute 3 more Insert commands that attempt to insert 3 more records, such that the records violate the integrity constraints. Make each of the 3 records violate a different type of integrity constraint. 

5.  Execute a sql command to Delete a record that violates a referential integrity constraint.

6.  Repeat 5, but Insert three new records that do not violate any integrity constraints. 

Schema : 

COUNTRY
Country_Name    Population  No_of_Worldcup_won  Manager


PLAYERS
Player_id
Name    Fname   Lname   DOB Country
Height  Club    Position    Caps_
for_
country Is_captain


MATCH_RESULTS
Match_id    Date    Start_
time    Team1
Team2
Team1_score Team2_score Stadium Host_city


PLAYER_CARD
Player_id   No_of_Yellow_cards  No_of_Red_cards


PLAYER_ASSISTS_GOALS
Player_id   No_of_Matches   Goals   Assists Minutes_Played


COUNTRY table attribute data types:
Country_Name Varchar(20),
Population  decimal(10,2),
No_of_Worldcup_won int,
Manager varchar (20),


PLAYERS table attribute data types:
Player_id int,
Name varchar (40),
Fname varchar (20),
Lname varchar (35),
DOB date,
Country varachar(20),
Height(cms) int,
Club varchar(30),
Position varchar(10),
Caps_for_Country int,
IS_CAPTAIN Boolean,


MATCH_RESULTS table attribute data types:
Match_id int,
Date_of_Match date,
Start_Time_Of_Match time,
Team1 varchar(25),
Team2 varchar(25),
Team1_score int,
Team2_score int,
Stadium_Name varchar(35),
Host_City varchar(20),


PLAYER_CARDS table attribute data types:
Player_id int,
Yellow_Cards int,
Red_Cards int,


PLAYER_ASSISTS_GOALS table attribute data types:
Player_id int,
No_of_Matches int,
Goals int,
Assists int,
Minutes_Played int,

