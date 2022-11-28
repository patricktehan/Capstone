<?php

include ('connection.php');

global $conn;
error_reporting(0);
session_start();

//team 1 statistics
$team_name = '';
$division = '';
$division_score = '';
$head_coach_ranking = '';
$offense_ranting = '';
$defense_ranting = '';
$QB_ranting = '';
$record_ats_away = '';
$record_ats_away_fav = '';
$ats_home = '';
$ats_home_underdog = '';
$ats_away_underdog = '';
$ats_home_fav = '';
$third_down_offense = 0;
$third_down_defense = 0;
$pass_yard_offense = 0;
$pass_yard_defense = 0;
$rush_yard_defense = 0;
$rush_yard_offense = 0;

//team 1 algorithm stats
$wins = 0;
$losses = 0;
$games = 0;
$win_per = 0;
$round_1_adj = 0;
$round_1_win_percent = 0;
$round_2_adj = 0;
$round_2_win_percent = 0;
$rank_raw = 0;
$rank_adj_1 = 0;
$rank_adj_2 = 0;
$raw_to_adj_change = 0;
$rank_change_raw_to_adj = 0;
$sos_rank = 0;


//team 2 statistics
$team_name_2 = '';
$division_2 = '';
$division_score_2 = '';
$head_coach_ranking_2 = '';
$offense_ranting_2 = '';
$defense_ranting_2 = '';
$QB_ranting_2 = '';
$record_ats_away_2 = '';
$record_ats_away_fav_2 = '';
$ats_home_2 = '';
$ats_home_underdog_2 = '';
$ats_away_underdog_2 = '';
$ats_home_fav_2 = '';
$third_down_offense_2 = 0;
$third_down_defense_2 = 0;
$pass_yard_offense_2 = 0;
$pass_yard_defense_2 = 0;
$rush_yard_defense_2 = 0;
$rush_yard_offense_2 = 0;

//team 2 stats for Algorithms
$wins_2 = 0;
$losses_2= 0;
$games_2 = 0;
$win_per_2 = 0;
$round_1_adj_2 = 0;
$round_1_win_percent_2 = 0;
$round_2_adj_2 = 0;
$round_2_win_percent_2 = 0;
$rank_raw_2 = 0;
$rank_adj_1_2 = 0;
$rank_adj_2_2 = 0;
$raw_to_adj_change_2 = 0;
$rank_change_raw_to_adj_2 = 0;
$sos_rank_2 = 0;

//query 1 for team one query2 for team 2 database
$query = $conn->query("SELECT * FROM 2021NFL_stats");
$query2 = $conn->query("SELECT * FROM 2021NFL_stats");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="teamcomparision.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gambling Gateway</title>
    <link rel="stylesheet" href="gambling_gateway.css">
</head>
<body>
<h1><img src="img/gamblinggatewaylogo.png" alt="Gambling Gateway" height="200px" width ="250px"></h1>
<div class="grid">
    <main>

        <p><img class ="nfl_logo" src="img/nfl.jpg" alt="NFL" ></p>
        <div id= "team1Pick" class="pick1">
            <table >
                <tr>
                    <form method="GET" action="">
                        <select name="team1">
                            <option value="Choose">Team #1</option>
                            <?php

                            //creation of the dropdown by gathering every team name from database
                            while($rows = $query->fetch_assoc()){
                                $team_name = $rows['Team_name'];
                                echo "<option value = '$team_name'>$team_name</option>";
                            }
                            ?>
                            <input type="submit" name="submit" value="submit" onclick="spread()">
                        </select>
                    </form>
                    <br>
                    <br>
                    <div id="'home">
                        Home team
                        <br>
                        <br>
                        <!--                    sets the selection from the dropdown to a variable-->
                        <?php
                        $selection_team1 = $_GET['team1'];
                        echo $selection_team1.'<br>';
                        ?>
                    </div>

                </tr>
            </table>
            <br>
        </div>
        <div id="team2Pick" class="pick2">
            <table>
                <tr>
                    <form method="POST" action="">
                        <select name="team2">
                            <option value="Choose">Team #2</option>
                            <?php
                            while($rows = $query2->fetch_assoc()){
                                $team_name_2 = $rows['Team_name'];
                                echo "<option value = '$team_name_2'>$team_name_2</option>";
                            }
                            ?>
                            <input type="submit" name="submit2" value="submit" onclick="setBackgroundColorComparison()">
                        </select>
                    </form>
                    <br>
                    <br>
                    <div id="away">
                        Away Team
                        <br>
                        <br>
                        <?php
                        $selection_team2 = $_POST['team2'];
                        echo $selection_team2;
                        ?>
                    </div>
                </tr>
            </table>
        </div>
        <?php
        //gathering every statistic from the database based on the team1 selection and setting each value to a variable
        $team_query = $conn->query("SELECT * FROM 2021NFL_stats where Team_name = '$selection_team1'");
        while ($row = mysqli_fetch_array($team_query)){
            $division = $row['Division'];
            $division_score = $row['Division_score'];
            $head_coach_ranking = $row['Head_coach_rating'];
            $offense_ranting = $row['offense_rating'];
            $defense_ranting = $row['defense_rating'];
            $QB_ranting = $row['QB_rating'];
            $record_ats_away = $row['record_ATS_away'];
            $record_ats_away_fav = $row['record_ATS_away_fav'];
            $ats_home = $row['ats_home'];
            $ats_home_underdog = $row['ats_home_underdog'];
            $ats_away_underdog = $row['ats_away_underdog'];
            $ats_home_fav = $row['ats_home_fav'];
            $third_down_offense = $row['3rd_down_offense'];
            $third_down_defense = $row['3rd_down_defense'];
            $pass_yard_offense = $row['pass_yard_offense'];
            $pass_yard_defense = $row['pass_yard_defense'];
            $rush_yard_defense = $row['rush_yard_defense'];
            $rush_yard_offense = $row['rush_yard_offense'];
        }
        //gathering every statistic from the database based on the team2 selection and setting each value to a variable
        $team_query_2 = $conn->query("SELECT * FROM 2021NFL_stats where Team_name = '$selection_team2'");
        while ($row = mysqli_fetch_array($team_query_2)){
            $division_2 = $row['Division'];
            $division_score_2 = $row['Division_score'];
            $head_coach_ranking_2 = $row['Head_coach_rating'];
            $offense_ranting_2 = $row['offense_rating'];
            $defense_ranting_2 = $row['defense_rating'];
            $QB_ranting_2 = $row['QB_rating'];
            $record_ats_away_2 = $row['record_ATS_away'];
            $record_ats_away_fav_2 = $row['record_ATS_away_fav'];
            $ats_home_2 = $row['ats_home'];
            $ats_home_underdog_2 = $row['ats_home_underdog'];
            $ats_away_underdog_2 = $row['ats_away_underdog'];
            $ats_home_fav_2 = $row['ats_home_fav'];
            $third_down_offense_2 = $row['3rd_down_offense'];
            $third_down_defense_2 = $row['3rd_down_defense'];
            $pass_yard_offense_2 = $row['pass_yard_offense'];
            $pass_yard_defense_2 = $row['pass_yard_defense'];
            $rush_yard_defense_2 = $row['rush_yard_defense'];
            $rush_yard_offense_2 = $row['rush_yard_offense'];
        }
        // Gathering algorithm data and setting it to usable variables based off team 1 selection
        $team_algo_query = $conn->query("SELECT * FROM table_alg_test2 where Team = '$selection_team1'");
        while ($row = mysqli_fetch_array($team_algo_query)) {
            $wins = $row['Wins'];
            $losses = $row['Losses'];
            $games = $row['Games'];
            $win_per = $row['Win_per'];
            $round_1_adj = $row['Round_1_ADJ'];
            $round_1_win_percent = $row['Round_1_Win_per'];
            $round_2_adj = $row['Round_2_ADJ'];
            $round_2_win_percent = $row['Round_2_Win_per'];
            $rank_raw = $row['Rank_Raw'];
            $rank_adj_1 = $row['Rank_ADJ_1'];
            $rank_adj_2 = $row['Rank_ADJ_2'];
            $raw_to_adj_change = $row['Raw_to_ADJ_Change'];
            $rank_change_raw_to_adj = $row['Rank_Change_Raw_to_ADJ'];
            $sos_rank = $row['SOS_Rank'];
        }

        // Gathering algorithm data and setting it to usable variables based off team 2 selection
        $team_algo_query2 = $conn->query("SELECT * FROM table_alg_test2 where Team = '$selection_team2'");
        while ($row = mysqli_fetch_array($team_algo_query2)){
            $wins_2 = $row['Wins'];
            $losses_2= $row['Losses'];
            $games_2 = $row['Games'];
            $win_per_2 = $row['Win_per'];
            $round_1_adj_2 = $row['Round_1_ADJ'];
            $round_1_win_percent_2 = $row['Round_1_Win_per'];
            $round_2_adj_2 = $row['Round_2_ADJ'];
            $round_2_win_percent_2 =$row['Round_2_Win_per'];
            $rank_raw_2 = $row['Rank_Raw'];
            $rank_adj_1_2 = $row['Rank_ADJ_1'];
            $rank_adj_2_2 = $row['Rank_ADJ_2'];
            $raw_to_adj_change_2 = $row['Raw_to_ADJ_Change'];
            $rank_change_raw_to_adj_2 = $row['Rank_Change_Raw_to_ADJ'];
            $sos_rank_2 = $row['SOS_Rank'];
        }
        ?>
        <div class="team1_algo_stats">
            <div id = "wins_1"><?php echo $wins;?></div>
            <div id = "losses_1"><?php echo $losses;?></div>
            <div id = "games_1"><?php echo $games;?></div>
            <div id = "win_per_1"><?php echo $win_per;?></div>
            <div id = "round_1_adj_1"><?php echo $round_1_adj;?></div>
            <div id = "round_1_win_percent_1"><?php echo $round_1_win_percent;?></div>
            <div id = "round_2_adj_1"><?php echo $round_2_adj;?>j</div>
            <div id = "round_2_win_percent_1"><?php echo $round_2_win_percent;?></div>
            <div id = "rank_raw_1"><?php echo $rank_raw;?></div>
            <div id = "rank_adj_1_1"><?php echo $rank_adj_1;?></div>
            <div id = "rank_adj_2_1"><?php echo $rank_adj_2;?></div>
            <div id = "raw_to_adj_change_1"><?php echo $raw_to_adj_change;?></div>
            <div id = "rank_change_raw_to_adj_1"><?php echo $rank_change_raw_to_adj;?></div>
            <div id = "sos_rank_1"><?php echo $sos_rank;?></div>
        </div>
        <div class="team2_algo_stats">
            <div id = "wins_2"><?php echo $wins_2;?></div>
            <div id = "losses_2"><?php echo $losses_2;?></div>
            <div id = "games_2"><?php echo $games_2;?></div>
            <div id = "win_per_2"><?php echo $win_per_2;?></div>
            <div id = "round_1_adj_2"><?php echo $round_1_adj_2;?></div>
            <div id = "round_1_win_percent_2"><?php echo $round_1_win_percent_2;?></div>
            <div id = "round_2_adj_2"><?php echo $round_2_adj_2;?>j</div>
            <div id = "round_2_win_percent_2"><?php echo $round_2_win_percent_2;?></div>
            <div id = "rank_raw_2"><?php echo $rank_raw_2;?></div>
            <div id = "rank_adj_1_2"><?php echo $rank_adj_1_2;?></div>
            <div id = "rank_adj_2_2"><?php echo $rank_adj_2_2;?></div>
            <div id = "raw_to_adj_change_2"><?php echo $raw_to_adj_change_2;?></div>
            <div id = "rank_change_raw_to_adj_2"><?php echo $rank_change_raw_to_adj_2;?></div>
            <div id = "sos_rank_2"><?php echo $sos_rank_2;?></div>
        </div>

        <div class="bet">
            <table>
                <tr>
                    <td>Team</td>
                    <td>Spread</td>
                    <td>Over/Under</td>
                    <td>Money Line</td>
                </tr>
                <tr>
                    <td id ='team1'><?php echo $selection_team1?></td>
                    <td>
                    <?php
                        $spread = -3;
                        if($round_2_adj - $round_2_adj_2 <= 0.049 and $round_2_adj - $round_2_adj_2 >= -0.049){
                             $spread = -3;
                        }
                        else if($round_2_adj - $round_2_adj_2 >= 0.05 and $round_2_adj - $round_2_adj_2 <= 0.09){
                             $spread -= .5;
                        }
                        else if ($round_2_adj - $round_2_adj_2 >= 0.1 and $round_2_adj - $round_2_adj_2 <= 0.149 ){
                             $spread -= 1;
                        }
                        else if($round_2_adj - $round_2_adj_2 >= 0.15){
                            $spread -= 1.5;
                        }
                        else if($round_2_adj - $round_2_adj_2 <= -0.05 and $round_2_adj - $round_2_adj_2 >= -0.09){
                            $spread += .5;
                        }
                        else if ($round_2_adj - $round_2_adj_2 >= -0.1 and $round_2_adj - $round_2_adj_2 <= -0.149 ){
                            $spread += 1;
                        }
                        else if ($round_2_adj - $round_2_adj_2 >= -0.15){
                            $spread += 1.5;
                        }

//                        3rd down calcs

//                        if ($third_down_offense > $third_down_defense_2){
//                            $spread -= .5;
//                        }

                    //                        else if ($third_down_offense < $third_down_defense_2){
                    //                            $spread += .5;
                    //                        }
                    //                        else if ($third_down_offense = $third_down_defense_2){
                    //                            $spread -= 0;
                    //                        }
                        else if ($third_down_offense > $third_down_offense_2){
                            $spread -= .5;
                        }
                        else if ($third_down_offense < $third_down_offense_2){
                            $spread += .5;
                        }

                        else if ($third_down_defense < $third_down_defense_2){
                            $spread -= .5;
                        }
                        else if ($third_down_defense > $third_down_defense_2){
                            $spread += .5;
                        }




                    echo $spread
                    ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td id ='team2'><?php echo $selection_team2?></td>
                    <td><?php echo '+ '.$spread * -1 ?></td>
                    <td><script>over_under('team2');</script></td>
                    <td><script>moneyLine('team2');</script></td>
                </tr>
            </table>
        </div>
        <div class="stat_description">
            <p>Division</p>
            <p>Division Score</p>
            <p>Head Coach Rating (1-5)</p>
            <p>Offensive Rating (1-5)</p>
            <p>Defensive Rating (1-5)</p>
            <p>Quarterback Rating (1-5)</p>
            <p>Record Against the Spread (Away)</p>
            <p>Record Against the Spread (Away Favorite)</p>
            <p>Record Against the Spread (Home)</p>
            <p>Record Against the Spread (Home Underdog)</p>
            <p>Record Against the Spread (Away Underdog)</p>
            <p>Record Against the Spread (Home Favorite)</p>
            <p>Third Down Conversion Percentage (Offense)</p>
            <p>Third Down Conversion Percentage (Defense)</p>
            <p>Passing Yards (Offense)</p>
            <p>Passing Yards Allowed (Defense)</p>
            <p>Rushing Yards Allowed (Defense)</p>
            <p>Rushing Yards (Offense)</p>
        </div>
        <div class="team1">
            <table>
                <tr>
                    <td> <?php echo $division ?></td>
                </tr>

                <tr>
                    <td id="division1"> <?php echo $division_score; ?></td>
                </tr>
                <tr>
                    <td id="head_coach_ranking1"> <?php echo $head_coach_ranking ?> </td>
                </tr>
                <tr>
                    <td id="offense_rating1"> <?php echo $offense_ranting ?> </td>
                </tr>
                <tr>
                    <td id="defense_rating1"> <?php echo $defense_ranting ?> </td>
                </tr>
                <tr>
                    <td id="QB_rating1"> <?php echo $QB_ranting ?> </td>
                </tr>
                <tr>
                    <td id="record_ats_away1"> <?php echo $record_ats_away ?> </td>
                </tr>
                <tr>
                    <td id="record_ats_away_fav1"> <?php echo $record_ats_away_fav ?> </td>
                </tr>
                <tr>
                    <td id="ats_home1"> <?php echo $ats_home ?> </td>
                </tr>
                <tr>
                    <td id="ats_home_underdog1"> <?php echo $ats_home_underdog ?> </td>
                </tr>
                <tr>
                    <td id="ats_away_underdog1"> <?php echo $ats_away_underdog ?> </td>
                </tr>
                <tr>
                    <td id="ats_home_fav1"> <?php echo $ats_home_fav ?> </td>
                </tr>
                <tr>
                    <td id="third_down_offense1"> <?php echo $third_down_offense ?> </td>
                </tr>
                <tr>
                    <td id="third_down_defense1"> <?php echo $third_down_defense ?> </td>
                </tr>
                <tr>
                    <td id="pass_yard_offense1"> <?php echo $pass_yard_offense ?> </td>
                </tr>
                <tr>
                    <td id="pass_yard_defense1"> <?php echo $pass_yard_defense ?> </td>
                </tr>
                <tr>
                    <td id="rush_yard_defense1"> <?php echo $rush_yard_defense ?> </td>
                </tr>
                <tr>
                    <td id="rush_yard_offense1"> <?php echo $rush_yard_offense ?> </td>
                </tr>
            </table>
        </div>

        <div class="team2">
            <table>
                <tr>
                    <td> <?php echo $division_2 ?> </td>
                </tr>
                <tr>
                    <td id="division2"> <?php echo $division_score_2 ?> </td>
                </tr>
                <tr>
                    <td id="head_coach_ranking2"> <?php echo $head_coach_ranking_2 ?> </td>
                </tr>
                <tr>
                    <td id="offense_rating2"> <?php echo $offense_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td id="defense_rating2"> <?php echo $defense_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td id="QB_rating2"> <?php echo $QB_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td id="record_ats_away2"> <?php echo $record_ats_away_2 ?> </td>
                </tr>
                <tr>
                    <td id="record_ats_away_fav2"> <?php echo $record_ats_away_fav_2 ?> </td>
                </tr>
                <tr>
                    <td id="ats_home2"> <?php echo $ats_home_2 ?> </td>
                </tr>
                <tr>
                    <td id="ats_home_underdog2"> <?php echo $ats_home_underdog_2 ?> </td>
                </tr>
                <tr>
                    <td id="ats_away_underdog2"> <?php echo $ats_away_underdog_2 ?> </td>
                </tr>
                <tr>
                    <td id="ats_home_fav2"> <?php echo $ats_home_fav_2 ?> </td>
                </tr>
                <tr>
                    <td id="third_down_offense2"> <?php echo $third_down_offense_2 ?> </td>
                </tr>
                <tr>
                    <td id="third_down_defense2"> <?php echo $third_down_defense_2  ?> </td>
                </tr>
                <tr>
                    <td id="pass_yard_offense2"> <?php echo $pass_yard_offense_2 ?> </td>
                </tr>
                <tr>
                    <td id="pass_yard_defense2"> <?php echo $pass_yard_defense_2 ?> </td>
                </tr>
                <tr>
                    <td id="rush_yard_defense2"> <?php echo $rush_yard_defense_2 ?> </td>
                </tr>
                <tr>
                    <td id="rush_yard_offense2"> <?php echo $rush_yard_offense_2 ?> </td>
                </tr>
            </table>
        </div>
        <p id="outChart">
        <div id="chart" >
            <canvas id="yardChart"></canvas>
        </div>
        </p>
        <script>
            let team1Pick = '<?php echo $selection_team1;?>' ;
            let passYardOffense1 = document.getElementById('pass_yard_offense1');
            let passYardDefense1 = document.getElementById('pass_yard_defense1');
            let rushYardOffense1 = document.getElementById('rush_yard_offense1');
            let rushYardDefense1 = document.getElementById('rush_yard_defense1');

            let team2Pick = '<?php echo $selection_team2;?>';
            let passYardOffense2 = document.getElementById('pass_yard_offense2');
            let passYardDefense2 = document.getElementById('pass_yard_defense2');
            let rushYardOffense2 = document.getElementById('rush_yard_offense2');
            let rushYardDefense2 = document.getElementById('rush_yard_defense2');

            let labels = ['Passing Yards (Offense)','Passing Yards Allowed (defense)','Rushing Yards (offense)','Rushing Yards Allowed (Defense)']
            let team1_data = [passYardOffense1.innerHTML,passYardDefense1.innerHTML,rushYardOffense1.innerHTML,rushYardDefense1.innerHTML]
            let team2_data = [passYardOffense2.innerHTML,passYardDefense2.innerHTML,rushYardOffense2.innerHTML,rushYardDefense2.innerHTML]
            const data = {
                labels:labels,
                datasets: [{
                    label: team1Pick,
                    data:team1_data,
                    backgroundColor:'green',
                },
                    {
                        label:team2Pick,
                        data:team2_data,
                        backgroundColor:'red',
                    }]
            };
            const config = {
                type: 'bar',
                data: data
            };
            const chart = new Chart(
                document.getElementById('yardChart'),
                config
            );

        </script>

    </main>
</div>
<script>
    onPageLoad();
</script>
<footer>
</footer>
</body>
</html>