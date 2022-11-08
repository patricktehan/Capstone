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
    setBackgroundColorComparison("third_down_defense1","third_down_defense2");
    setBackgroundColorComparison("pass_yard_offense1","pass_yard_offense2");
    setBackgroundColorComparison("pass_yard_defense1","pass_yard_defense2");
    setBackgroundColorComparison("rush_yard_defense1","rush_yard_defense2");
    setBackgroundColorComparison("rush_yard_offense1","rush_yard_offense2");
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
        division1.style.backgroundColor = "green";
        division2.style.backgroundColor = "red";
    }
    else if (division1.innerHTML < division2.innerHTML){
        division1.style.backgroundColor = "red";
        division2.style.backgroundColor = "green";
    }
}

