<?php
// corona api link
$link = "https://api.covid19api.com/summary";

// get data
$data = json_decode(file_get_contents($link), false);

//* global data
$G_Confirmed = $data->Global->TotalConfirmed;
$G_Deaths = $data->Global->TotalDeaths;
$G_Recovered = $data->Global->TotalRecovered;
$G_Active = $G_Confirmed - ($G_Deaths + $G_Recovered);
$Date = $data->Date;


//*Countries data
$Countries = $data->Countries;