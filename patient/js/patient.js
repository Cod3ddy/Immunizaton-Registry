window.onload = () => {
	// onload set defaults
	const defaultNavTab = document.querySelector(
		".profile-content .nav-tab ul .overview"
	);
	const defaultNavLinks = document.querySelector(".nav-links .p-nav-dashboard");

	// show profile overview selected
	defaultNavTab.classList.add("active");
	// show dashboard selected
	defaultNavLinks.classList.add("active");
};

// pages navigations[side navigation bar[PATIENT]]
// get side navigations buttons
const patientProfileBtn = document.querySelector(
	".side-navigation .content .nav-links .p-nav-profile-btn"
);
const patientDashboardBtn = document.querySelector(
	".nav-links .p-nav-dashboard"
);
const patientMapBtn = document.querySelector(
	".side-navigation .content .nav-links .p-nav-map-btn"
);
const patientHistoryBtn = document.querySelector(
	".side-navigation .content .nav-links .p-nav-history-btn"
);

// get pages
const patientProfilePage = document.querySelector(".patient-profile-page");
const patientHistoryPage = document.querySelector(".patient-history-page");
const patientMapPage = document.querySelector(".patient-map-page");
const patientDashboardPage = document.querySelector(".patient-dashboard-page");

// profile page
patientProfileBtn.addEventListener("click", () => {
	if (patientProfilePage.style.display == "none") {
		patientProfilePage.style.display = "block";
		patientMapPage.style.display = "none";
		patientDashboardPage.style.display = "none";
		patientHistoryPage.style.display = "none";
	}
});

// history page
patientHistoryBtn.addEventListener("click", () => {
	console.log("history button clicked!");
	if (patientHistoryPage.style.display == "none") {
		patientHistoryPage.style.display = "block";
		patientProfilePage.style.display = "none";
		patientMapPage.style.display = "none";
		patientDashboardPage.style.display = "none";
	}
});

// map page

patientMapBtn.addEventListener("click", () => {
	if (patientMapPage.style.display == "none") {
		patientMapPage.style.display = "block";
		patientHistoryPage.style.display = "none";
		patientProfilePage.style.display = "none";
		patientDashboardPage.style.display = "none";
	}
});

// dashboard - page
patientDashboardBtn.addEventListener("click", () => {
	if (patientDashboardPage.style.display == "none") {
		patientDashboardPage.style.display = "block";
		patientHistoryPage.style.display = "none";
		patientProfilePage.style.display = "none";
		patientMapPage.style.display = "none";
	}
});

//profile page

// profile page
//get all tab-content
const overviewTab = document.querySelector(".profile-content .overview");
const editProfileTab = document.querySelector(".profile-content .edit-profile");
const changePasswordTab = document.querySelector(
	".profile-content .change-password"
);

//get box classes
const overviewBox = document.querySelector(".profile-content .overview-box");
const editProfileBox = document.querySelector(
	".profile-content .edit-profile-box"
);
const changePasswordBox = document.querySelector(
	".profile-content .change-password-box"
);

// listen click event on each tab-nav-item
overviewTab.addEventListener("click", () => {
	console.log("clicked overview");
	if (overviewBox.style.display === "none") {
		overviewBox.style.display = "flex";
		editProfileBox.style.display = "none";
		changePasswordBox.style.display = "none";
	}
});

// edit profile tab
editProfileTab.addEventListener("click", () => {
	if (editProfileBox.style.display === "none") {
		editProfileBox.style.display = "flex";
		overviewBox.style.display = "none";
		changePasswordBox.style.display = "none";
	}
});

// change password tab
changePasswordTab.addEventListener("click", () => {
	if (changePasswordBox.style.display === "none") {
		changePasswordBox.style.display = "flex";
		overviewBox.style.display = "none";
		editProfileBox.style.display = "none";
	}
});
