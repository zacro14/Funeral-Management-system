<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpeg" href="../design/assets/img/logo.jpeg" style="border-radius:50%;"/>

    <title>Web-based Funeral Management System</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href='../plugins/fullcalendar-5.10.1/lib/main.min.css' rel='stylesheet' />
    <script src='../plugins/fullcalendar-5.10.1/lib/main.min.js'></script>
    <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      editable: false,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events:
      
    });

    calendar.render();
  });

</script>
</head>