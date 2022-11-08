<?php

include ('connection.php');
global $conn;

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
$third_down_offense = '';
$third_down_defense = '';
$pass_yard_offense = '';
$pass_yard_defense = '';
$rush_yard_defense = '';
$rush_yard_offense = '';

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
$third_down_offense_2 = '';
$third_down_defense_2 = '';
$pass_yard_offense_2 = '';
$pass_yard_defense_2 = '';
$rush_yard_defense_2 = '';
$rush_yard_offense_2 = '';

//query 1 for team one query2 for team 2 information
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
                        <input type="submit" name="submit" value="submit" onclick="setBackgroundColorComparison()">
                    </select>
                    </form>
                    <br>
                    <br>
                    <br>
<!--                    sets the selection from the dropdown to a variable-->
                    <?php
                    $selection_team1 = $_GET['team1'];
                    echo $selection_team1;
                    ?>
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
                    <br>
                    <?php
                    $selection_team2 = $_POST['team2'];
                    echo $selection_team2;
                    ?>

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
            ?>


        <div class="bet">
            <table>
                <tr>

                    <td>Spread</td>
                    <td>Over/Under</td>
                    <td>Money Line</td>
                </tr>
                <tr>
                    <td>Spread</td>
                    <td>Over/Under</td>
                    <td>Money Line</td>
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
                    <td > <?php echo $division_2 ?></td>
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
        <div id="chart" style="width:700px; height:900px;">
            <canvas id="yardChart"></canvas>
        </div>
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
                            backgroundColor:"red",
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
</body>
</html>