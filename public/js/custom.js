$(document).ready(function(){
emmitTask();
   setInterval(function() {
        emmitTask();
        $('#succes_msg').hide();
         $('#sucess_output').hide();
          $('#delete_output').hide();
          $('#error_output').hide(); 
    }, 2000);
//Send task cmntent to the server...
	 	 $('#task_form').on('submit', function(event){
	            event.preventDefault();

	            var formData = $('#task_form').serialize();
	            $.ajax({
	                url:"inserttask",
	                method:"POST",
	                data:formData,
	                dataType:"JSON",
	                success:function(data) {

	                	if (data.msgs != '') {
	                    	if (data.msgs == 'success') {
		                        $('#succes_msg').show();
		                        $('#task_form')[0].reset();
		                        $('#add_task').hide();
	                        }else {
	                        	$('#error_msg').html(data.msgs);
	                        	$('#task_title').val(data.task_title);
	                        	$('#desc_text_area_sty').val(data.task_description);
	                        	$('#accomp_text_area_sty').val(data.task_accomplish_method);
	                        	$('#add_task').show();
	                        	$('#error_msg_div').show();
	                        } 
	                    }
	                    
	                 }
	       })
        }); 
//Send confirm  to the server...

	 	 $('#confirm_task_form').on('submit', function(event){
	            event.preventDefault();

	            var task_id = $('#yes_confirm').val();
	            var status = $('#status').val();

	            $.ajax({
	                url:"confirm",
	                method:"POST",
	                data:{task_id: task_id, status: status},
	                success:function(data) {
	                	if (data != '') {
	                        $('#holder').html(data);
                		 	$('#confirm_task').hide();
	                        $('#yes_div').css('background', '#e6e6e6');	
	                        $("#confirm-btn").prop("disabled", true);

			                 $('#close_confirm_task').on('click', function() {
						 		$('#sucess_output').hide();
						 		$('#error_output').hide();

						 	});	
					                	
					    }	
	                    
	                 }
	            })

        }); 

//Send de;lete  to the server...

	 	 $('#delete_task_form').on('submit', function(event){ 
	            event.preventDefault();

	            var task_id = $('#yes_delete').val();

	            $.ajax({
	                url:"delete",
	                method:"POST",
	                data:{task_id: task_id},
	                success:function(data) {
	                    if (data) {

		                        $('#delete_output').show();	
		                        $('#delete_output').html(data);	
		                        $('#yes_del_div').css('background', '#e6e6e6');	
		                        $("#del-btn").prop("disabled", true);
		                        $('.choose_sty').css('color', 'black');
		                        $('#delete_task').hide();                       					 		
	                        }
	                    }
	            })

        }); 
	 	 	 	 

	$('#task_pop_window').on('click', function() {
     
		$('#add_task').show();
		$('#succes_msg').hide();
		$('#error_msg_div').hide();

 	});

	$('#task_pop_window2').on('click', function() {   
		$('#add_task').show();
 	});

	
 	$('#close_add_task').on('click', function() {
     
		$('#add_task').hide();
		$('#error_msg_div').hide();
		$('#task_form')[0].reset();

 	});

 	$('#close_error').on('click', function() {
     
		$('#error_msg_div').hide();

 	});

 	$('#close_success').on('click', function() {
		$('#succes_msg').hide();

 	});

 	$("#add_task").on('click', function() {
     
		$('#error_msg_div').hide();

 	});
 	//Confirm task click
 	 $(document).on('click', '.confirm_btn', function(){
       var task_id = $(this).data('totask_id');

		$('#confirm_task').show();
		$('#yes_confirm').val(task_id);

 	});
 
 	$('#close_confirm_task, #no_div').on('click', function() {
     	
 		$('#confirm_task').hide();
 		$('#yes_div').css('background', '#e6e6e6');	
 		$("#confirm-btn").prop("disabled", true);
 		$('#sucess_output').hide();
 		$('#error_output').hide();

 	});
 
   	$('#yes_div').on('click', function() {
   		 $('#yes_div').css('background', 'lightgreen');	
 		 $('#confirm-btn').removeAttr("disabled");
 	});

 
//Delete task 
	$(document).on('click', '.delete_btn', function(){
       var task_id = $(this).data('totask_id');

		$('#delete_task').show();
		$('#yes_delete').val(task_id);

 	});

 	 $('#yes_del_div').on('click', function() {
   		 $('#yes_del_div').css('background', 'red');
   		 $('.choose_sty').css('color', 'white');	
 		 $('#del-btn').removeAttr("disabled");
 	});

	$('#close_del_task, #no_div').on('click', function() {     	
 		$('#delete_task').hide();
 		$('.choose_sty').css('color', 'black');
 		$('#yes_del_div').css('background', '#e6e6e6');	
 		$("#del-btn").prop("disabled", true);

 	});
//Emit the task from the database

	 	 function emmitTask() {
		    var action = "fetch_task";
		    $.ajax({
		        url:"emmittask",
		        method:"POST",
		        data:{action:action},
		        success:function(data) {
		            $('#task_sty').html(data);

		            $('#task_pop_window3').on('click', function() {   
						$('#add_task').show();
				 	});

		            //this click controls the corfirm task pop up
				 	
		        }
		    })
		}



});