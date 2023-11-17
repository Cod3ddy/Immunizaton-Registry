// page navigation
// buttons
const patientBtn = document.querySelector(".nav-patient-btn");
// pages
const patientPage = document.querySelector(".add-patient-page");

// navigation
patientBtn.addEventListener("click", () => {
	if (patientPage.style.display === "none") {
		patientPage.style.display = "block";
		dashboardPage.style.display = "none";
	}
});

dashboardBtn.addEventListener("click", () => {
	if (dashboardPage.style.display === "none") {
		dashboardPage.style.display = "block";
		patientPage.style.display = "none";
	}
});
