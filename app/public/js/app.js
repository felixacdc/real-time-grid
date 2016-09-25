'use strict';

$(document).ready(function() {

	new Vue({
	    el: "body",
	    data: {
            users: {},
            pusher: [],
            pusherChannel: [],
            displayUsers: {},
            totalRegisters: 0,
            temporalRegisters: 0,
            showBegin: 0,
            showEnd: 9,
            showNow: [],
            search: ''
        },
	    ready: function () {
	    	this.$http.get('/users').then((req) => {
	            this.users = req.data;
	            this.totalRegisters = this.users.length;
	            this.temporalRegisters = this.totalRegisters;
	            this.displayUsers = this.users;
	            this.fnShowNow();
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

                    if (name.search(stringSearch) >= 0 || email.search(stringSearch) >= 0)
                        return obj;
                });

                this.displayUsers = displayMiddleware;
                this.temporalRegisters = this.displayUsers.length;
                this.showBegin = 0;
                this.showEnd = 9;
                this.fnShowNow();
            },
            fnShowNow: function() {
            	this.showNow = [];
            	for (var i = this.showBegin; i <= this.showEnd; i++) {
            		if ( this.displayUsers[i] != undefined )
            			this.showNow.push(this.displayUsers[i]);
            	}
            },
            previous: function(event) {
            	event.preventDefault();
            	if ( this.showBegin > 0) {
            		this.showBegin -= 10;
            		this.showEnd -= 10;
            		this.fnShowNow()
            	}
            },
            next: function(event) {
            	event.preventDefault()
            	if ( (this.temporalRegisters - (this.showBegin + 10) ) > 0) {
            		this.showBegin += 10;
            		this.showEnd += 10;
            		this.fnShowNow()
            	}
            }
	    }
	});
});