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


$sql = mysqli_select_db('2021NFL_stats',$conn);

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
                <th>team 1</th>
            </table>
            <br>
        </div>

        <div class="pick2">
            <table>
                <th>team 2</th>
            </table>
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
            <p>Stat1</p>
            <p>Stat1</p>
            <p>Stat1</p>
            <p>Stat1</p>
            <p>Stat1</p>
        </div>
        <div class="team1">
            <table>
                <tr>
                    <td> <?php echo $division ?> <p>The Eagles average 110 rushing yards per game.</p></td>
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
                    <td> <?php echo $division_2 ?> <p> The cardinals give up 150 rushing yards per game.</p></td>
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