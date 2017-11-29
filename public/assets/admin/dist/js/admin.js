let Module = (function(){


	"use strict";


	let initAll = function() {
		ajaxSetup();
		initEvents();
	};

	/**
	 * Run ajaxSetup first prevent csrf_token error
	 * when using ajax POST
	 */
	let ajaxSetup = function() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	};

	/**
	 * Initialize all events
	 * 
	 * @return
	 */
	let initEvents = function() {
		/*
		 |------------------------------------------------------
		 | Logout
		 |------------------------------------------------------ 
		 */
		$('.btn-signout').on('click', function(){
			$.ajax({
	          url: 'admin/logout',
	          type: 'POST',
	          success: function(response){
	            window.location = '/admin/login';
	          }
	        });
		});
	}

	return {
		initAll: initAll
	}

})();