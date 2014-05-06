$(document).ready(function(){

  //***********************************************************************************
  //***** Admin Events
  //***********************************************************************************

  // --------- Create Client -----------------------------------------------------------
  $('#btnAddClient').on('click', function() {
    var clientName          = $('#clientName').val();
    var createClient_form   = $('#createClient_form');
    var addClientInputArea  = $('#addClientInputArea');
    var clientAddSubmit     = $('#clientAddSubmit');
    var clientAddedText     = $('#clientAddedText');
    var gifLoader           = $('.gifLoader');

    //dataString serializes form data to submit to PHP
    var dataString = $('form#createClient_form').serialize();
    console.log('dataString: '+ dataString);

    //replace form input with loading GIF
    addClientInputArea.addClass('hidden');
    gifLoader.removeClass('hidden');

    //POST dataString through AJAX to PHP
    var jqxhr = $.post('includes/mkAddClient.php', dataString, function() {
      //if success, replace form with 'client added' message
      gifLoader.addClass('hidden');
      clientAddSubmit.addClass('hidden');
      clientAddedText.removeClass('hidden');
      //clear modal after 0.8 second delay
      setTimeout(function() {
          $('a.close-reveal-modal').trigger('click');
          //reset form for next submission, after a delay
          setTimeout(function() {
            addClientInputArea.removeClass('hidden');
            clientAddSubmit.removeClass('hidden');
            clientAddedText.addClass('hidden');
            $('#clientName').val('');
          }, 400);
        }, 800);
      //update new project client dropdown list
      $('#projectModal select').append('<option value="'+ clientName +'" data-id="'+ clientName +'">'+ clientName +'</option>');
      console.log('success');
    })
    .done(function(returnData) {
      console.log('done:'+ returnData);
    })
    .fail(function() {
      //else, if failure, add error message above input
      $('#clientAddError').removeClass('hidden');
      console.log('error');
    })
    .always(function() {
      console.log('always');
    })
  }); // END ajax function
  // ---------------------------------------------------------------------------------

  // --------- Add Project -----------------------------------------------------------
  //When a Client is selected, update clientID field in hidden input
  $('#projectClientSelect').change(function() {
    var option = $('option:selected', this).attr('data-id');
    $('#clientID').val(option);
    console.log('clientID set to: '+ option)
  });

  //Add billing category
  $('#addAnotherRole').on('click', function() {
    var numRoles = $('.newRoleName').length;
    console.log('number of Roles: '+ numRoles);
    $('#addRoleInput').append('<div class="small-9 columns"><input type="text" placeholder="billing category" class="newRoleName" /></div><div class="small-3 columns"><span class="postfix">+</span></div>');
  });

  //Add the project to the database
  $('#btnAddProject').on('click', function() {
    var projectName         = $('#projectName').val();
    var createProject_form  = $('#createProject_form');
    var addProjectInputArea = $('#addProjectInputArea');
    var projectAddSubmit    = $('#projectAddSubmit');
    var projectAddedText     = $('#projectAddedText');
    var gifLoader           = $('.gifLoader');

    var dataString = $('form#createProject_form').serialize();
    console.log('dataString: '+ dataString);

    //replace form input with loading GIF
    addProjectInputArea.addClass('hidden');
    gifLoader.removeClass('hidden');

    //submit POST data through AJAX
    var jqxhr = $.post('includes/mkAddProject.php', dataString, function() {
      //if success, replace form with 'client added' message
      gifLoader.addClass('hidden');
      projectAddSubmit.addClass('hidden');
      projectAddedText.removeClass('hidden');
      //clear modal after 0.8 second delay
      setTimeout(function() {
        $('a.close-reveal-modal').trigger('click');
        //reset form for next submission, after a delay
        setTimeout(function() {
          addProjectInputArea.removeClass('hidden');
          projectAddSubmit.removeClass('hidden');
          projectAddedText.addClass('hidden');
          $('#projectName').val('');
        }, 800);
      }, 800);
      //update new Task project dropdown list
      //$('#taskModal select').append('<option value="'+ projectName +'" data-id="'+ projectName +'">'+ projectName +'</option>');
      console.log('success');
    })
    .done(function(returnData) {
      console.log('done:'+ returnData);
    })
    .fail(function() {
      //else, if failure, add error message above input
      $('#clientAddError').removeClass('hidden');
      console.log('error');
    })
    .always(function() {
      console.log('always');
    })
  }); // END ajax function
  // ---------------------------------------------------------------------------------

  // --------- Add Task -----------------------------------------------------------
  //When a project is selected, update projectID field in hidden input
  $('#taskProjectSelect').change(function() {
    var option = $('option:selected', this).attr('data-id');
    $('#projectID').val(option);
    console.log('projectID set to: '+ option)
  });

  //Add the task to the database
  $('#btnAddTask').on('click', function() {
    var taskName         = $('#taskName').val();
    var createTask_form  = $('#createTask_form');
    var addTaskInputArea = $('#addTaskInputArea');
    var taskAddSubmit    = $('#taskAddSubmit');
    var taskAddedText     = $('#taskAddedText');
    var gifLoader           = $('.gifLoader');

    var dataString = $('form#createTask_form').serialize();
    console.log('dataString: '+ dataString);

    //replace form input with loading GIF
    addTaskInputArea.addClass('hidden');
    gifLoader.removeClass('hidden');

    //submit POST data through AJAX
    var jqxhr = $.post('includes/mkAddTask.php', dataString, function() {
      //if success, replace form with 'project added' message
      gifLoader.addClass('hidden');
      taskAddSubmit.addClass('hidden');
      taskAddedText.removeClass('hidden');
      //clear modal after 0.8 second delay
      setTimeout(function() {
        $('a.close-reveal-modal').trigger('click');
        //reset form for next submission, after a delay
        setTimeout(function() {
          addTaskInputArea.removeClass('hidden');
          taskAddSubmit.removeClass('hidden');
          taskAddedText.addClass('hidden');
          $('#taskName').val('');
        }, 800);
      }, 800);
      //update new Task task dropdown list
      //$('#taskModal select').append('<option value="'+ taskName +'" data-id="'+ taskName +'">'+ taskName +'</option>');
      console.log('success');
    })
    .done(function(returnData) {
      console.log('done:'+ returnData);
    })
    .fail(function() {
      //else, if failure, add error message above input
      $('#projectAddError').removeClass('hidden');
      console.log('error');
    })
    .always(function() {
      console.log('always');
    })
  }); // END ajax function
  // ---------------------------------------------------------------------------------


}); //END - Document Ready