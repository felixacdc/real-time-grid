'use strict';

$(document).ready(function() {

	new Vue({
	    el: "body",
	    data: {
            users: {},
            pusher: [],
            pusherChannel: []
        },
	    ready: function () {
	    	this.$http.get('/users').then((req) => {
	            this.users = req.data;			    
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
		      alert("hola");
		    });
	    }
	});
});