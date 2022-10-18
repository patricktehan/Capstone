<?php

include ('connection.php');
global $conn;

//team 1
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

//team 2 stats
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


//$sql = mysqli_select_db('2021NFL_stats',$conn);
$query = $conn->query("SELECT * FROM 2021NFL_stats");
$query2 = $conn->query("SELECT * FROM 2021NFL_stats");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gambling Gateway</title>
    <link rel="stylesheet" href="gambling_gateway.css">
</head>
<body>
<img>
<h1>Gambling Gateway</h1>
<div class="grid">
    <main>
        <div class="pick1">
            <table >
                <th>
                    <form method="GET" action="">
                    <select name="team1">
                        <option value="Choose">Choose a team!</option>
                        <?php
                        while($rows = $query->fetch_assoc()){
                            $team_name = $rows['Team_name'];
                            echo "<option value = '$team_name'>$team_name</option>";
                        }
                        ?>
                        <input type="submit" name="submit" value="submit">
                    </select>
                    </form>
                    <br>

                    <?php
                    $selection_team1 = $_GET['team1'];
                    echo $selection_team1;
                    ?>

                </th>
            </table>
            <br>
        </div>
        <div class="pick2">
            <table>
                <th>
                    <form method="POST" action="">
                        <select name="team2">
                            <option value="Choose">Choose a team!</option>
                            <?php
                            while($rows = $query2->fetch_assoc()){
                                $team_name_2 = $rows['Team_name'];
                                echo "<option value = '$team_name_2'>$team_name_2</option>";
                            }
                            ?>
                            <input type="submit" name="submit2" value="submit">
                        </select>
                    </form>
                    <br>
                    <?php
                    $selection_team2 = $_POST['team2'];
                    echo $selection_team2;
                    ?>
                </th>
            </table>

            <?php

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

        </div>
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
                    <td> <?php echo $division_score ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $head_coach_ranking ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $offense_ranting ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $defense_ranting ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $QB_ranting ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $record_ats_away ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $record_ats_away_fav ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home_underdog ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_away_underdog ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home_fav ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $third_down_offense ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $third_down_defense ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $pass_yard_offense ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $pass_yard_defense ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $rush_yard_defense ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $rush_yard_offense ?> </td>
                </tr>
            </table>
        </div>

        <div class="team2">
            <table>
                <tr>
                    <td> <?php echo $division_2 ?></td>
                </tr>
                <tr>
                    <td> <?php echo $division_score_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $head_coach_ranking_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $offense_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $defense_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $QB_ranting_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $record_ats_away_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $record_ats_away_fav_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home_underdog_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_away_underdog_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $ats_home_fav_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $third_down_offense_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $third_down_defense_2  ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $pass_yard_offense_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $pass_yard_defense_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $rush_yard_defense_2 ?> </td>
                </tr>
                <tr>
                    <td> <?php echo $rush_yard_offense_2 ?> </td>
                </tr>
            </table>
        </div>

    </main>
</div>
<footer>
    <p>graph here</p>
</footer>

</body>
</html>