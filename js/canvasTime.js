$(document).ready(function(){

  //***********************************************************************************
  //***** Canvas Events for time.php
  //***********************************************************************************

  // --------- Create Clock ----------------------------------------------------------

  <script>
    var canvas = document.getElementById('startTCanvas');
    var context = canvas.getContext('2d');
    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;
    var radius = 140;

    context.beginPath();
    context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
    context.fillStyle = 'green';
    context.fill();
    context.lineWidth = 1;
    context.strokeStyle = '#003300';
    context.stroke();
  </script>

  // ---------------------------------------------------------------------------------

  

}); //END - Document Ready