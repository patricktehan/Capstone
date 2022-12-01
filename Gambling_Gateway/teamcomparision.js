function onPageLoad(){
    setBackgroundColorComparison("division1","division2");
    setBackgroundColorComparison("head_coach_ranking1","head_coach_ranking2");
    setBackgroundColorComparison("offense_rating1","offense_rating2");
    setBackgroundColorComparison("defense_rating1","defense_rating2");
    setBackgroundColorComparison("QB_rating1","QB_rating2");
    setBackgroundColorComparison("record_ats_away1","record_ats_away2");
    setBackgroundColorComparison("record_ats_away_fav1","record_ats_away_fav2");
    setBackgroundColorComparison("ats_home1","ats_home2");
    setBackgroundColorComparison("ats_home_underdog1","ats_home_underdog2");
    setBackgroundColorComparison("ats_away_underdog1","ats_away_underdog2");
    setBackgroundColorComparison("ats_home_fav1","ats_home_fav2");
    setBackgroundColorComparison("third_down_offense1","third_down_offense2");
    setBackgroundColorComparison2("third_down_defense1","third_down_defense2");
    setBackgroundColorComparison("pass_yard_offense1","pass_yard_offense2");
    setBackgroundColorComparison2("pass_yard_defense1","pass_yard_defense2");
    setBackgroundColorComparison2("rush_yard_defense1","rush_yard_defense2");
    setBackgroundColorComparison("rush_yard_offense1","rush_yard_offense2");
    // setBackgroundColorComparison('spread',"spread2");

}

function setBackgroundColorComparison(team1,team2){
    let division1 = document.getElementById(team1);
    let division2 = document.getElementById(team2);
    console.log(division1.innerHTML,division1.innerHTML);

    if (division1.innerHTML === division2.innerHTML){
        division1.style.backgroundColor = "yellow";
        division1.style.color = "black"
        division2.style.backgroundColor = "yellow";
        division2.style.color = "black"
    }
    else if (division1.innerHTML > division2.innerHTML){
        division1.style.backgroundColor = "#146b1d";
        division2.style.backgroundColor = "#b81911";
    }
    else if (division1.innerHTML < division2.innerHTML){
        division1.style.backgroundColor = "#b81911";
        division2.style.backgroundColor = "#146b1d";
    }
}
// This function is for the defense stats where the lower number is better
function setBackgroundColorComparison2(team1,team2){
    let division1 = document.getElementById(team1);
    let division2 = document.getElementById(team2);
    console.log(division1.innerHTML,division1.innerHTML);


    if (division1.innerHTML === division2.innerHTML){
        division1.style.backgroundColor = "yellow";
        division1.style.color = "black"
        division2.style.backgroundColor = "yellow";
        division2.style.color = "black"
    }
    else if (division1.innerHTML < division2.innerHTML){
        division1.style.backgroundColor = "#146b1d";
        division2.style.backgroundColor = "#b81911";
    }
    else if (division1.innerHTML > division2.innerHTML){
        division1.style.backgroundColor = "#b81911";
        division2.style.backgroundColor = "#146b1d";
    }
}


// function spread(team){
//     let start_spread = 0;
//
//
//     let selection = document.getElementById(team);
//
//     let team1 = document.getElementById('team1');
//     let team2 = document.getElementById('team2');
//
//     let win_per = document.getElementById('win_per_1');
//     let win_per_2 = document.getElementById('win_per_2');
//
//
//     let round_2_adj_1 = document.getElementById('round_2_adj_1');
//     let round_2_adj_2 = document.getElementById('round_2_adj_2');

    //console.log(selection.innerHTML, team1.innerHTML);
    // console.log(team1.innerHTML);
//take adj 2 win per and subtract team 1 - team 2. col 9
//     if (selection.innerHTML === team1.innerHTML) {
//         start_spread = Math.round(round_2_adj_1 + round_2_adj_2).toFixed(2);}
//
//         else if (selection.innerHTML === team2.innerHTML){
//             if (round_2_adj_1 - round_2_adj_2 <= 0.049) {
//                 start_spread = 3;
//         }
//                 else if (round_2_adj_1 - round_2_adj_2 >= 0.05) {
//                     start_spread = -3.5;
//         } }

    //}
    // else {
    //     start_spread = 0;
    // }
        //let new_spread = round_2_win_per.innerHTML - round_2_win_per_2.innerHTML;
   // if (round_2_win_per - round_2_win_per_2 <= 0.049) {
   //          start_spread = 3;
   // }
   // else if (round_2_win_per - round_2_win_per_2 >= 0.05) {
   //          start_spread = 3.5;
   //      }
        //} else if (new_spread >= 0.1) {
        //start_spread = -4;
        //} else if (new_spread >= 0.15) {
        //start_spread = -4.5;
        //} else if (new_spread >= 0.2) {
        //start_spread = -5;
        //} //else start_spread = -3


//     document.write(start_spread);
//     document.close();
//
// }
//
//
//
// function over_under(team){
//     let selection = document.getElementById(team);
//     console.log(selection.innerHTML);
//     document.write(selection.innerHTML);
// }
//
// function moneyLine(team){
//     let selection = document.getElementById(team);
//     console.log(selection.innerHTML);
//     document.write(selection.innerHTML);
// }