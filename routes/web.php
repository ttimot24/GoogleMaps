<?php

/*-------------------------------------------------

	If it's not responding, check if there's 
	a route prefix in Register.php 

--------------------------------------------------*/

Route::any('/test',function(){
	return "Yeah! Plugin routes working!";
});