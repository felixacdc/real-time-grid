'use strict';

$(document).ready(function() {
	Vue.component('list-users', {
        template: "#listUsers",
        data: function() {
            return {
                users: {}
            }
        },
	    ready: function () {
	    	this.$http.get('/users').then((req) => {
	            this.users = req.data;
	        }, (req) => {
	            alert("error");
	        });
	    }
    });

	new Vue({
	    el: "body"
	});
});