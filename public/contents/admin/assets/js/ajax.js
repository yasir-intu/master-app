var url="https://graph.facebook.com/v6.0/me?fields=conversations.limit(10){senders,messages.limit(1){message,attachments.limit(1){image_data,file_url,video_data,size,mime_type,name},sticker,shares.limit(1){description,link},created_time,from,to,tags},unread_count,message_count,id,snippet}&access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";
//var ass_url=document.getElementById("assigning").getAttribute("data-ass-url");
//var post_url=document.getElementById("assigning").getAttribute("data-post-url");
var pro_url1="https://graph.facebook.com/v6.0/";
var pro_url2="?access_token=EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD";

//var app = angular.module('client-message', []);
app.filter('str_limit', function () {
    return function (input, chars) {
        return input.length > chars ? input.substring(0, chars) + '...' : input;
    };
});
app.controller('messageController', function ($rootScope, $scope, $http, $timeout, $interval) {
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
		
		$http.get(ass_url).then(function (response){
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
		chat = $interval(function(){
			chatList();
		}, interval_time);
	};
	$scope.chatlist_interval();
	chatList();
	ass();
	
	$scope.stop = function () {
		if($rootScope.conversation.some(messages =>messages.selected === true)){
			$interval.cancel(chat);
            chat = undefined;
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
								$scope.circle_icon = null;
								$scope.correct_icon = null;
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
								$scope.circle_icon = null;
								$scope.correct_icon = null;
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
});
