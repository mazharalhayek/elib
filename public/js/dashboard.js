$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
$(document).ready(function() {
    $('.toggle-dashboard').click(function() {
      $('.dashboard').toggleClass('show-dashboard');
    });

    $(document).click(function(e) {
      if (!$(e.target).closest('.dashboard').length && !$(e.target).is('.toggle-dashboard')) {
        $('.dashboard').removeClass('show-dashboard');
      }
    });
  });
  function showNotification(notificationText) {
    var notification = document.getElementById("notification");
    var notificationContent = document.getElementById("notification-content");

    notificationContent.innerHTML = notificationText;
    notification.classList.add("show");

    setTimeout(function() {
      notification.classList.remove("show");
    }, 3000);
  }
//sidebar buttons close/open
  function toggleOptions(id) {
    var optionsDivs = document.querySelectorAll('.options');
    optionsDivs.forEach(function(optionsDiv) {
        optionsDiv.style.display = "none";
    });
    var selectedOptionsDiv = document.getElementById(id);
    selectedOptionsDiv.style.display = "block";
}
