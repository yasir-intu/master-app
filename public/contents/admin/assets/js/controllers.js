//facebook messageController for super admin and managing directors
app.controller('mdmessageController', ["$rootScope", "$scope", "$http", "$timeout", "$interval",
 function ($rootScope, $scope, $http, $timeout, $interval) {
	var url="https://graph.facebook.com/v6.0/me?fields=conversations.limit(10){senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id,snippet}&access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";
	var pro_url1="https://graph.facebook.com/v6.0/";
	var pro_url2="?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";
    $rootScope.conversation = [];
    $scope.profile_pic = [];
    $scope.id = [];
	$scope.paging = [];
	$scope.checkid = [];
	$scope.se=null;
	$scope.e=null;
	var interval_time = 2000;
	$scope.IsLoading = true;
	
	function chatList(){
		
		$http.get(url).then(function (response){
			var list = response.data.conversations.data;
			if ($scope.paging === undefined || $scope.paging.length == 0){
				$scope.paging.push(response.data.conversations.paging.next);
			}
			angular.forEach(list, function (insert) { 
				insert.selected = false;
				if($rootScope.conversation.some(messages =>messages.senders.data[0].id === insert.senders.data[0].id)){
					index = $rootScope.conversation.findIndex(messages =>messages.senders.data[0].id === insert.senders.data[0].id);
					$rootScope.conversation.splice(index,1);
					$rootScope.conversation.splice(9,0, insert);		
				} else{
					$rootScope.conversation.splice(9,0, insert);
				}
			});
			angular.forEach($rootScope.conversation, function (message) { 
				if($scope.id.indexOf(message.senders.data[0].id) === -1 ){
					$scope.id.push(message.senders.data[0].id);
					var interval_time = 120000;
					$http.get(pro_url1+message.senders.data[0].id+pro_url2).then(function (response){
						$scope.profile_pic.push(response.data);
					});
				}
			});
			
			$scope.IsLoading = false;
			
		});
		
		$http.get(ass_url1).then(function (response){
			$scope.mess = response.data;
		});
		
		
	};
	
	function paging(){
		var interval_time = 60000;
		if ((document.documentElement.scrollTop+document.documentElement.offsetHeight) == document.documentElement.scrollHeight) {
			$scope.IsLoading = true;
			$http.get($scope.paging[0]).then(function (response){
				var next_list = response.data.data;
				$scope.paging.splice(0, 1, response.data.paging.next);
				angular.forEach(next_list, function (insert) {
					insert.selected = false;							
					if($rootScope.conversation.some(messages =>messages.senders.data[0].id === insert.senders.data[0].id)){
						index = $rootScope.conversation.findIndex(messages =>messages.senders.data[0].id === insert.senders.data[0].id);
						$rootScope.conversation.splice(index,1);									
						$rootScope.conversation.push(insert);
					} else{
						$rootScope.conversation.push(insert);
					}
				});
				angular.forEach($rootScope.conversation, function (message) { 
					if($scope.id.indexOf(message.senders.data[0].id) === -1 ){
						$scope.id.push(message.senders.data[0].id);
						var interval_time = 120000;
						$http.get(pro_url1+message.senders.data[0].id+pro_url2).then(function (response){
							$scope.profile_pic.push(response.data);
						});
					}
				});
				$scope.IsLoading = false;
			});
		}
	};
	
	window.onscroll = function() {paging()};
	
	function ass(){
		$http.get(ass_url).then(function (response){
			$scope.assigning = response.data;
		});
	};
	
	var interval_time = 2000;
	
    //interval after given time in var interval_time
    var chat;
	
	$scope.chatlist_interval = function(){
		$scope.stop_chatlist_interval();
		
		chat = $interval(function(){
			chatList();
		}, interval_time);
		
	};
	
	// stops the interval
    $scope.stop_chatlist_interval = function() {
		$interval.cancel(chat);
        chat = undefined;
    };
	
	$scope.chatlist_interval();
	chatList();
	ass();
	$scope.$on('$destroy', function() {
		$scope.stop_chatlist_interval();
    });
	
	$scope.stop = function () {
		if($rootScope.conversation.some(messages =>messages.selected === true)){
			$scope.stop_chatlist_interval();
			$scope.stopdiv= true;
		}else{
			$scope.stopdiv= false;
			chatList();
			$scope.chatlist_interval();
		}
		angular.forEach($rootScope.conversation, function (message) { 
			if (message.selected) {
				if($scope.checkid.indexOf(message.id) == -1){
					$scope.checkid.push(message.id);
				}
			} else {
				var index = $scope.checkid.indexOf(message.id);
				if(index!=-1) {
					$scope.checkid.splice(index, 1);
				}
			}
		});
	};
	
	$scope.postassign=function(){
		if($scope.checkid.length !== 0){
			$scope.validation2 = false;
			if($scope.se){
				$scope.validation3 = false;
				$scope.processing= true;
				var data ={
					multi_se: $scope.se,
					multi_e: $scope.e,
					mess_id: $scope.checkid,
				};
				$http.post(post_url, data)
			   .then(
					function(response){
					$scope.processing= false;
						if(response.data.success[0] === "upload success"){
							chatList();
							$scope.chatlist_interval();
							$scope.stopdiv= false;
							$scope.checkid=[];
							$scope.se=null;
							$scope.e=null;
							$scope.success_icon = true;
							$scope.fail_icon = false;
							$scope.modal_db ={
								"display" : "block",
								"animation" : "modal_ani .5s ease-out"
							};
							$timeout(function(){
								$scope.modal_db = {
									"display" : "block",
									"animation" : "modal_ani_out .8s ease-out",
									"transform" : "scale(0)"
								};
							}, 2000);
							$timeout(function(){
								$scope.modal_db = null;
							}, 2500);
						}
					}, 
				   function(response){
					$scope.processing= false;
					var errors=response.data.errors[0];
					 if(errors === "upload error"){
						 $scope.success_icon = false;
							$scope.fail_icon = true;
							$scope.modal_db ={
								"display" : "block",
								"animation" : "modal_ani .5s ease-out"
							};
							$timeout(function(){
								$scope.modal_db = {
									"display" : "block",
									"animation" : "modal_ani_out .8s ease-out",
									"transform" : "scale(0)"
								};
							}, 2000);
							$timeout(function(){
								$scope.modal_db = null;
							}, 2500);
					} else {
						$scope.validation = errors;
					}
				   }
				);
			}else{
				$scope.validation3 = true;
			}
		}else{
			$scope.validation2 = true;
		}
	};
}]);

//facebook messageController for senior executive
app.controller('semessageController', ["$rootScope", "$scope", "$http", "$timeout", "$interval",
 function ($rootScope, $scope, $http, $timeout, $interval) {
    var url="https://graph.facebook.com/v6.0/me?fields=conversations.limit(10){senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id,snippet}&access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";
	var pro_url1="https://graph.facebook.com/v6.0/";
	var pro_url2="?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";
	$rootScope.conversation_se = [];
    $scope.profile_pic_se = [];
    $scope.id_se = [];
	$scope.assigning_se = [];
	$scope.paging = [];
	$scope.checkid_se = [];
	$scope.e_se=null;
	var interval_time = 2000;
	$scope.IsLoading = true;
	
	function chatList(){
		var interval_time = 120000
		$http.get(se).then(function (response){
			$scope.mess_se = response.data;
			angular.forEach($scope.mess_se, function (mess) {
				$http.get('https://graph.facebook.com/v6.0/'+mess.mess_id+'?fields=senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id,updated_time,snippet&access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD').then(function (response){
					var message_se = response.data;
					message_se.selected = false;
					if($rootScope.conversation_se.some(messages =>messages.senders.data[0].id === message_se.senders.data[0].id)){
						index_id = $rootScope.conversation_se.findIndex(messages =>messages.senders.data[0].id === message_se.senders.data[0].id);
						if($rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time)>0){
							index_update = $rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time)-1;
						}else if($rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time)==0){
							index_update = $rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time);
						}else{
							index_update = $rootScope.conversation_se.length-1;
						}
						$rootScope.conversation_se.splice(index_id,1);
						$rootScope.conversation_se.splice(index_update,0, message_se);
					} else{
						if($rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time)>0){
						 index_update = $rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time);
						}else if($rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time)==0){
						 index_update = $rootScope.conversation_se.findIndex(messages =>messages.updated_time < message_se.updated_time);
						}else{
							index_update = $rootScope.conversation_se.length;
						}
						$rootScope.conversation_se.splice(index_update,0, message_se);
					}
					$scope.IsLoading = false;
					if($scope.id_se.indexOf(message_se.senders.data[0].id) === -1 ){
						$scope.id_se.push(message_se.senders.data[0].id);
						var interval_time = 120000;
						$http.get(pro_url1+message_se.senders.data[0].id+pro_url2).then(function (response){
							$scope.profile_pic_se.push(response.data);
						});
					}
				});
			});
		});
		
	};
	
	$scope.ass_skip = 0;
	function ass(skip){
		$http.get(se1+"/"+skip).then(function (response){
			var x = document.getElementById("select_e").scrollHeight-document.getElementById("select_e").offsetHeight;
			document.getElementById("select_e").scrollTop = x;
			$scope.IsLoading2 = false;
			angular.forEach(response.data, function (asss) {
				if($scope.assigning_se.findIndex(employee =>employee.id === asss.id) === -1){
					$scope.assigning_se.push(asss);
				}
			});
		});
	};
	
	function paging(){
		console.log((document.getElementById("select_e").scrollTop)+"==="+(document.getElementById("select_e").scrollHeight-document.getElementById("select_e").offsetHeight));
			if (((document.getElementById("select_e").scrollTop+document.getElementById("select_e").offsetHeight)-2) === document.getElementById("select_e").scrollHeight) {
				$scope.IsLoading2 = true;
				$scope.ass_skip = $scope.assigning_se.length;
				ass($scope.ass_skip);
			};
	};
	
	document.getElementById("select_e").onscroll = function() {paging()};
	
	var interval_time = 2000;
	
    //interval after given time in var interval_time
    var chat_se;
	
	$scope.chatlist_interval_se = function(){
		$scope.stop_chatlist_interval_se();
		
		chat_se = $interval(function(){
			chatList();
		}, interval_time);
		
	};
	
	// stops the interval
    $scope.stop_chatlist_interval_se = function() {
		$interval.cancel(chat_se);
        chat_se = undefined;
    };
	
	$scope.chatlist_interval_se();
	chatList();
	ass($scope.ass_skip);
	$scope.$on('$destroy', function() {
		$scope.stop_chatlist_interval_se();
    });
	
	$scope.stop = function () {
		if($rootScope.conversation_se.some(messages =>messages.selected === true)){
			$interval.cancel(chat_se);
            chat_se = undefined;
			$scope.stopdiv= true;
		}else{
			$scope.stopdiv= false;
			chatList();
			$scope.chatlist_interval_se();
		}
		angular.forEach($rootScope.conversation_se, function (message) { 
			if (message.selected) {
				if($scope.checkid_se.indexOf(message.id) == -1){
					$scope.checkid_se.push(message.id);
				}
			} else {
				var index = $scope.checkid_se.indexOf(message.id);
				if(index!=-1) {
					$scope.checkid_se.splice(index, 1);
				}
			}
		});
	};
	
	$scope.postassign=function(){
		if($scope.checkid_se.length !== 0){
			$scope.validation2 = false;
			if($scope.e_se){
				$scope.validation3 = false;
				$scope.processing= true;
				var data ={
					multi_e: $scope.e_se,
					mess_id: $scope.checkid_se,
				};
				$http.post(post_url_se1, data)
			   .then(
					function(response){
					$scope.processing= false;
						if(response.data.success[0] === "upload success"){
							chatList();
							$scope.chatlist_interval_se();
							$scope.stopdiv= false;
							$scope.checkid_se=[];
							$scope.e_se=null;
							$scope.success_icon = true;
							$scope.fail_icon = false;
							$scope.modal_db ={
								"display" : "block",
								"animation" : "modal_ani .5s ease-out"
							};
							$timeout(function(){
								$scope.modal_db = {
									"display" : "block",
									"animation" : "modal_ani_out .8s ease-out",
									"transform" : "scale(0)"
								};
							}, 2000);
							$timeout(function(){
								$scope.modal_db = null;
							}, 2500);
						}
					}, 
				   function(response){
					$scope.processing= false;
					var errors=response.data.errors[0];
					var errors2=response.data.errors[1];
					if(errors === "upload error"){
						 $scope.success_icon = false;
							$scope.fail_icon = true;
							$scope.modal_db ={
								"display" : "block",
								"animation" : "modal_ani .5s ease-out"
							};
							$timeout(function(){
								$scope.modal_db = {
									"display" : "block",
									"animation" : "modal_ani_out .8s ease-out",
									"transform" : "scale(0)"
								};
							}, 2000);
							$timeout(function(){
								$scope.modal_db = null;
							}, 2500);
					} else {
						$scope.validation = errors;
						$scope.validation1 = errors2;
					}
				   }
				);
			}else{
				$scope.validation3 = true;
			}
		}else{
			$scope.validation2 = true;
		}
	};
	
	$scope.postprogress=function(){
		if($scope.checkid_se.length !== 0){
			$scope.validation2 = false;
			$scope.processing= true;
			var data ={
				mess_id: $scope.checkid_se,
			};
			$http.post(post_url_se2, data)
			.then(
				function(response){
					$scope.processing= false;
					if(response.data.success[0] === "upload success"){
						chatList();
						$scope.chatlist_interval_se();
						$scope.stopdiv= false;
						$scope.checkid_se=[];
						$scope.success_icon = true;
						$scope.fail_icon = false;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					}
				}, 
				function(response){
					$scope.processing= false;
					var errors=response.data.errors[0];
					if(errors === "upload error"){
						$scope.success_icon = false;
						$scope.fail_icon = true;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					} else {
						$scope.validation = errors;
					}
				}
			);
		}else{
			$scope.validation2 = true;
		}
	};
	
	$scope.postcomplete=function(){
		if($scope.checkid_se.length !== 0){
			$scope.validation2 = false;
			$scope.processing= true;
			var data ={
				mess_id: $scope.checkid_se,
			};
			$http.post(post_url_se3, data)
			.then(
				function(response){
					$scope.processing= false;
					if(response.data.success[0] === "upload success"){
						chatList();
						$scope.chatlist_interval_se();
						$scope.stopdiv= false;
						$scope.checkid_se=[];
						$scope.success_icon = true;
						$scope.fail_icon = false;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					}
				}, 
				function(response){
					$scope.processing= false;
					var errors=response.data.errors[0];
					if(errors === "upload error"){
						$scope.success_icon = false;
						$scope.fail_icon = true;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					} else {
						$scope.validation = errors;
						$scope.validation1 = errors2;
					}
				}
			);
		}else{
			$scope.validation2 = true;
		}
	};
	
	$scope.postreprogress=function(){
		if($scope.checkid_se.length !== 0){
			$scope.validation2 = false;
			$scope.processing= true;
			var data ={
				mess_id: $scope.checkid_se,
			};
			$http.post(post_url_se4, data)
			.then(
				function(response){
					$scope.processing= false;
					if(response.data.success[0] === "upload success"){
						chatList();
						$scope.chatlist_interval_se();
						$scope.stopdiv= false;
						$scope.checkid_se=[];
						$scope.success_icon = true;
						$scope.fail_icon = false;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					}
				}, 
				function(response){
					$scope.processing= false;
					var errors=response.data.errors[0];
					var errors2=response.data.errors[1];
					if(errors === "upload error"){
						$scope.success_icon = false;
						$scope.fail_icon = true;
						$scope.modal_db ={
							"display" : "block",
							"animation" : "modal_ani .5s ease-out"
						};
						$timeout(function(){
							$scope.modal_db = {
								"display" : "block",
								"animation" : "modal_ani_out .8s ease-out",
								"transform" : "scale(0)"
							};
						}, 2000);
						$timeout(function(){
							$scope.modal_db = null;
						}, 2500);
					} else {
						$scope.validation = errors;
						$scope.validation1 = errors2;
					}
				}
			);
		}else{
			$scope.validation2 = true;
		}
	};
}]);
