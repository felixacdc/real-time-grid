'use strict';

$(document).ready(function() {

	new Vue({
	    el: "body",
	    data: {
            users: {},
            pusher: [],
            pusherChannel: [],
            displayUsers: [],
            totalRegisters: 0,
            search: ''
        },
	    ready: function () {
	    	this.$http.get('/users').then((req) => {
	            this.users = req.data;
	            this.totalRegisters = this.users.length;
	            this.displayUsers = this.users;
	        }, (req) => {
	            alert("error");
	        });

            Pusher.logToConsole = true;

            var _this = this;
		    this.pusher = new Pusher('cb0102088810c7a6e5c0', {
			  encrypted: true
			});

		    this.pusherChannel = this.pusher.subscribe('test_channel');
		    this.pusherChannel.bind("App\\Events\\UserRegistered", function(data) {
		    	_this.users.unshift(data.user);
		    	_this.totalRegisters++;
		    	_this.searchUsers();
		    });
	    },
	    methods: {
	    	searchUsers: function() {
	    		var _this = this;
                var displayMiddleware = jQuery.map(this.users, function(obj) {

                    var name = obj.name.toLowerCase();
                    var email = obj.email.toLowerCase();
                    var stringSearch = _this.search.toLowerCase();

                    if (name.search(stringSearch) >= 0)
                        return obj;
                    else if(email.search(stringSearch) >= 0)
                    	return obj;
                });

                this.displayUsers = displayMiddleware;
            }
	    }
	});
});