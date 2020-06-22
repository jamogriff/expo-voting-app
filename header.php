<?php
  if(!isset($page_title)) { $page_title = "Expo Fall 2019"; }
  ?>
<!doctype html>

<html lang="en">
  <title><?php if(isset($page_title)) { echo $page_title; } ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="bootstrap.css"/>

  <header>
    <div class="container-fluid">
      <div class="row bg-dark align-items-center" style="padding-bottom:10px; padding-top:15px;">
        <div class="col-md-4 text-center img-logo"><img src="scaled-logo_light.svg"></div>
        <h1 class="col-md-6 text-center text-light"><?php echo $page_title; ?></h1>
      </div>
    </div>
  </header>
