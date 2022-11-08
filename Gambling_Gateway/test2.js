 void Raw_Calculate(); {
    string = away_team;
    string = home_team;
    start_line = 2;
    end_Line = Sheet1.Cells[Rows.Count, "A"].End(xlUp).Row;
    Sheet2.Range("A2:E999").ClearContents;
    Sheet3.Range("B2:E999").ClearContents;
    new_line = 1;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        loca = Sheet1.Cells[start_line, 1].Value;
        away_team = Sheet1.Cells[start_line, 2].Value;
        home_team = Sheet1.Cells[start_line, 3].Value;
        away_score = Sheet1.Cells[start_line, 4].Value;
        home_score = Sheet1.Cells[start_line, 5].Value;
        // Away Team Lookup
        away_lookup = Team_Lookup(away_team);
        if ((away_lookup == 0)) {
            new_line = (new_line + 1);
            away_lookup = new_line;
            Sheet2.Cells[away_lookup, 1].Value = away_team;
        }

        if ((away_score > home_score)) {
            Sheet2.Cells[away_lookup, 2].Value = (Sheet2.Cells[away_lookup, 2].Value + 1);
        }
        else {
            Sheet2.Cells[away_lookup, 3].Value = (Sheet2.Cells[away_lookup, 3].Value + 1);
        }

        Sheet2.Cells[away_lookup, 4].Value = (Sheet2.Cells[away_lookup, 4].Value + 1);
        // Home team lookup
        home_lookup = Team_Lookup(home_team);
        if ((home_lookup == 0)) {
            new_line = (new_line + 1);
            home_lookup = new_line;
            Sheet2.Cells[home_lookup, 1].Value = home_team;
        }

        if ((home_score > away_score)) {
            Sheet2.Cells[home_lookup, 2].Value = (Sheet2.Cells[home_lookup, 2].Value + 1);
        }
        else {
            Sheet2.Cells[home_lookup, 3].Value = (Sheet2.Cells[home_lookup, 3].Value + 1);
        }

        Sheet2.Cells[home_lookup, 4].Value = (Sheet2.Cells[home_lookup, 4].Value + 1);
        if ((loca == "H")) {
            if ((home_score > away_score)) {
                Sheet3.Cells[2, 2].Value = (Sheet3.Cells[2, 2].Value + 1);
                Sheet3.Cells[3, 3].Value = (Sheet3.Cells[3, 3].Value + 1);
            }
            else {
                Sheet3.Cells[2, 3].Value = (Sheet3.Cells[2, 3].Value + 1);
                Sheet3.Cells[3, 2].Value = (Sheet3.Cells[3, 2].Value + 1);
            }

            Sheet3.Cells[2, 4].Value = (Sheet3.Cells[2, 4].Value + 1);
            Sheet3.Cells[3, 4].Value = (Sheet3.Cells[3, 4].Value + 1);
        }

    }

    start_line = 2;
    end_Line = Sheet2.Cells[Rows.Count, "A"].End(xlUp).Row;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        wins = Sheet2.Cells[start_line, 2].Value;
        games = Sheet2.Cells[start_line, 4].Value;
        Sheet2.Cells[start_line, 5] = (wins / games);
    }

    Sheet3.Cells[2, 5].Value = (Sheet3.Cells[2, 2].Value / Sheet3.Cells[2, 4].Value);
    Sheet3.Cells[3, 5].Value = (Sheet3.Cells[3, 2].Value / Sheet3.Cells[3, 4].Value);
}

// Team Lookup
 void Team_Lookup(string = team_param); {
    start_line = 2;
    end_Line = Sheet2.Cells[Rows.Count, "A"].End(xlUp).Row;
    output_line = 0;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        team_sheet2 = Sheet2.Cells[start_line, 1].Value;
        if ((team_sheet2 == team_param)) {
            output_line = start_line;
            Team_Lookup = output_line;
        }

    }

    print(output_line)
}

// First Round of Adjustments
 void Adjustment_Round_1(); {
    string = away_team;
    string = home_team;
    start_line = 2;
    end_Line = Sheet1.Cells[Rows.Count, "A"].End(xlUp).Row;
    Sheet2.Range("F2:G999").ClearContents;
    home_wp = Sheet3.Cells[2, 5].Value;
    away_wp = Sheet3.Cells[3, 5].Value;
    league_avg = ((home_wp + away_wp)
        / 2);
    home_adv = (home_wp - league_avg);
    away_adv = (away_wp - league_avg);
    new_line = 1;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        loca = Sheet1.Cells[start_line, 1].Value;
        away_team = Sheet1.Cells[start_line, 2].Value;
        home_team = Sheet1.Cells[start_line, 3].Value;
        away_score = Sheet1.Cells[start_line, 4].Value;
        home_score = Sheet1.Cells[start_line, 5].Value;
        away_lookup = Team_Lookup(away_team);
        home_lookup = Team_Lookup(home_team);
        away_winpct = Sheet2.Cells[away_lookup, 5].Value;
        home_winpct = Sheet2.Cells[home_lookup, 5].Value;
        away_dif = (away_winpct - league_avg);
        home_dif = (home_winpct - league_avg);
        if ((loca == "H")) {
            Sheet2.Cells[away_lookup, 6].Value = (Sheet2.Cells[away_lookup, 6].Value
                + (home_dif + hom_adv));
            Sheet2.Cells[home_lookup, 6].Value = (Sheet2.Cells[home_lookup, 6].Value
                + (away_dif + away_adv));
        }
        else {
            Sheet2.Cells[away_lookup, 6].Value = (Sheet2.Cells[away_lookup, 6].Value + home_dif);
            Sheet2.Cells[home_lookup, 6].Value = (Sheet2.Cells[home_lookup, 6].Value + away_dif);
        }

        if ((loca == "H")) {
            Sheet2.Cells[away_lookup, 6].Value = (Sheet2.Cells[away_lookup, 6].Value
                + (home_dif + hom_adv));
            Sheet2.Cells[home_lookup, 6].Value = (Sheet2.Cells[home_lookup, 6].Value
                + (away_dif + away_adv));
        }
        else {
            Sheet2.Cells[away_lookup, 6].Value = (Sheet2.Cells[away_lookup, 6].Value + home_dif);
            Sheet2.Cells[home_lookup, 6].Value = (Sheet2.Cells[home_lookup, 6].Value + away_dif);
        }

    }

    start_line = 2;
    end_Line = Sheet2.Cells[Rows.Count, "A"].End(xlUp).Row;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        adj = Sheet2.Cells[start_line, 6].Value;
        games = Sheet2.Cells[start_line, 4].Value;
        Sheet2.Cells[start_line, 6].Value = (adj / games);
        Sheet2.Cells[start_line, 7].Value = (Sheet2.Cells[start_line, 5]
            + (adj / games));
    }

}

// Second Round of Adjustments
 void Adjustment_Round_2(); {
    string = away_team;
    string = home_team;
    start_line = 2;
    end_Line = Sheet1.Cells[Rows.Count, "A"].End(xlUp).Row;
    home_wp = Sheet3.Cells[2, 5].Value;
    away_wp = Sheet3.Cells[3, 5].Value;
    league_avg = ((home_wp + away_wp)
        / 2);
    home_adv = (home_wp - league_avg);
    away_adv = (away_wp - league_avg);
    new_line = 1;
    col_newadj = 8;
    col_newwp = 9;
    col_oldwp = 7;
    Sheet2.Range(Sheet2.Cells[2, col_newadj], Sheet2.Cells[999, col_newwp]).ClearContents;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        loca = Sheet1.Cells[start_line, 1].Value;
        away_team = Sheet1.Cells[start_line, 2].Value;
        home_team = Sheet1.Cells[start_line, 3].Value;
        away_score = Sheet1.Cells[start_line, 4].Value;
        home_score = Sheet1.Cells[start_line, 5].Value;
        away_lookup = Team_Lookup(away_team);
        home_lookup = Team_Lookup(home_team);
        away_winpct = Sheet2.Cells[away_lookup, col_oldwp].Value;
        home_winpct = Sheet2.Cells[home_lookup, col_oldwp].Value;
        away_dif = (away_winpct - league_avg);
        home_dif = (home_winpct - league_avg);
        if ((loca == "H")) {
            Sheet2.Cells[away_lookup, col_newadj].Value = (Sheet2.Cells[away_lookup, col_newadj].Value
                + (home_dif + hom_adv));
            Sheet2.Cells[home_lookup, col_newadj].Value = (Sheet2.Cells[home_lookup, col_newadj].Value
                + (away_dif + away_adv));
        }
        else {
            Sheet2.Cells[away_lookup, col_newadj].Value = (Sheet2.Cells[away_lookup, col_newadj].Value + home_dif);
            Sheet2.Cells[home_lookup, col_newadj].Value = (Sheet2.Cells[home_lookup, col_newadj].Value + away_dif);
        }

    }

    start_line = 2;
    end_Line = Sheet2.Cells[Rows.Count, "A"].End(xlUp).Row;
    for (start_line = 2; (start_line <= end_Line); start_line++) {
        adj = Sheet2.Cells[start_line, col_newadj].Value;
        games = Sheet2.Cells[start_line, 4].Value;
        Sheet2.Cells[start_line, col_newadj].Value = (adj / games);
        Sheet2.Cells[start_line, col_newwp].Value = (Sheet2.Cells[start_line, col_oldwp]
            + (adj / games));
    }

}