$(document).ready(function(){

  //***********************************************************************************
  //***** Admin Events
  //***********************************************************************************

  // --------- Create Client ---------
  $('#btnAddClient').on('click', function() {
    var clientName = $('#clientName').val();
    var dataString = $('input').serialize();
    console.log('dataString: '+ dataString);
    //replace form input with loading GIF
    $('#addClientInputArea').html('<img src="img/loader.gif" />');

    //submit POST data through AJAX
    var jqxhr = $.post('includes/mkAddClient.php', dataString, function() {
      //if success, replace form with 'client added' message
      $('#createClient_form').html('<div class="row"><div class="large-12 columns"><h3>Client Added!</h3></div></div>');
      setTimeout(function() {
          $('a.close-reveal-modal').trigger('click');
        }, 800);
      //update new project client dropdown list
      $('#projectModal select').append('<option value="'+ clientName +'" data-id="'+ clientName +'">'+ clientName +'</option>');
      console.log('success');
    })
    .done(function(returnData) {
      console.log('done:'+ returnData);
    })
    .fail(function() {
      //else, if failure, add input back to form with error message above input
      $('#addClientInputArea').html('<h5>Sorry, there was an error submitting the data.</h5></h5><label>Client Name : <input type="text" placeholder="Client Name" name="clientName" /></label><input type="text" name="memberID" class="hidden" value="7" />');
      console.log('error');
    })
    .always(function() {
      console.log('always');
    })
  }); // END ajax function
  // ---------------------------------------------------------------------------------

  // --------- Create Client ---------
  $('#btnAddProject').on('click', function() {
    var projectName = $('#projectName').val();
    var dataString = $('form').serialize();
    console.log('dataString: '+ dataString);
    //replace form input with loading GIF
    $('#addProjectInputArea').html('<img src="img/loader.gif" />');

    //submit POST data through AJAX
    var jqxhr = $.post('includes/mkAddProject.php', dataString, function() {
      //if success, replace form with 'client added' message
      $('#createProject_form').html('<div class="row"><div class="large-12 columns"><h3>Client Added!</h3></div></div>');
      setTimeout(function() {
          $('a.close-reveal-modal').trigger('click');
        }, 800);
      //update new project client dropdown list
      //$('#taskModal select').append('<option value="'+ projectName +'" data-id="'+ projectName +'">'+ projectName +'</option>');
      console.log('success');
    })
    .done(function(returnData) {
      console.log('done:'+ returnData);
    })
    .fail(function() {
      //else, if failure, add input back to form with error message above input
      $('#addClientInputArea').html('<h5>Sorry, there was an error submitting the data.</h5></h5><label>Client Name : <input type="text" placeholder="Client Name" name="clientName" /></label><input type="text" name="memberID" class="hidden" value="7" />');
      console.log('error');
    })
    .always(function() {
      console.log('always');
    })
  }); // END ajax function
  // ---------------------------------------------------------------------------------



}); //END - Document Ready