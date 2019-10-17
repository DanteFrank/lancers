<?php

use App\Country;
use App\State;
use App\Currency;

function getCountry($id){
	return Country::find($id)->name;
}

function getState($id){
	return State::find($id)->name;
}

function getCurrency($id){
	return Currency::where('id', $id)->select('code', 'symbol')->first();
}

function dateSlash($date){
	return $date->format('d/m/Y');
}