window.onload = () => {
	// onload set defaults
	const defaultNavTab = document.querySelector(
		".profile-content .nav-tab ul .overview"
	);
	const defaultNavLinks = document.querySelector(".nav-links .nav-dashboard");

	// show profile overview selected
	defaultNavTab.classList.add("active");
	// show dashboard selected
	defaultNavLinks.classList.add("active");
};

// global
const pages = document.querySelector(".pages");

// drop down script
const dropdown = document.querySelector(".profile-tab");
dropdown.addEventListener("click", () => {
	const dropdownMenu = document.querySelector(".dropdown-menu");
	if (dropdownMenu.style.display === "none") {
		dropdownMenu.style.display = "flex";
	} else {
		dropdownMenu.style.display = "none";
	}
});

// nav-links selection
const navLinks = document.querySelectorAll(".nav-links li");

//listen click event on each nav-item
navLinks.forEach((link) => {
	link.addEventListener("click", () => {
		navLinks.forEach((link) => link.classList.remove("active"));
		link.classList.add("active");
	});
});

// profile tab section color change

const navTab = document.querySelectorAll(".profile-content .nav-tab ul li");

//listen click event on each tab-nav-item
let arr = [navTab[1]];
// console.log(arr[0]);

// console.log(navTab);
navTab.forEach((tab) => {
	tab.addEventListener("click", () => {
		navTab.forEach((tab) => {
			tab.classList.remove("active");
		});
		tab.classList.add("active");
	});
});

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

// pages navigations[side navigation bar[PATIENT]]
// get side navigations buttons
const patientProfileBtn = document.querySelector(
	".side-navigation .content .nav-links .patient-nav-profile-btn"
);
const patientDashboardBtn = document.querySelector(
	".nav-links .patient-nav-dashboard"
);
const patientMapBtn = document.querySelector(
	".side-navigation .content .nav-links .patient-nav-map-btn"
);
const patientHistoryBtn = document.querySelector(
	".side-navigation .content .nav-links .patient-nav-history-btn"
);

// get pages
const patientProfilePage = document.querySelector(".patient-profile-page");
const patientHistoryPage = document.querySelector(".patient-history-page");
const patientMapPage = document.querySelector(".patient-map-page");
const patientDashboardPage = document.querySelector(".patient-dashboard-page");

// profile page
patientProfileBtn.addEventListener("click", () => {
	if (profilePage.style.display == "none") {
		profilePage.style.display = "block";
		mapPage.style.display = "none";
		dashboardPage.style.display = "none";
		historyPage.style.display = "none";
	}
});

// history page
patientHistoryBtn.addEventListener("click", () => {
	console.log("history button clicked!");
	if (historyPage.style.display == "none") {
		historyPage.style.display = "block";
		profilePage.style.display = "none";
		mapPage.style.display = "none";
		dashboardPage.style.display = "none";
	}
});

// map page

patientMapBtn.addEventListener("click", () => {
	if (mapPage.style.display == "none") {
		mapPage.style.display = "block";
		historyPage.style.display = "none";
		profilePage.style.display = "none";
		dashboardPage.style.display = "none";
	}
});

// dashboard - page
patientDashboardBtn.addEventListener("click", () => {
	if (dashboardPage.style.display == "none") {
		dashboardPage.style.display = "block";
		historyPage.style.display = "none";
		profilePage.style.display = "none";
		mapPage.style.display = "none";
	}
});

// toggle side navigation bar
const toggleBtn = document.querySelectorAll(".toggle-side-nav-bar");
const sideNav = document.querySelector(".side-navigation");
let isSideNavActive = true;
//show or hide navigation bar on  mouse-btn click
// toggleBtn.addEventListener("click", () => {
// 	console.log("side is active : " + isSideNavActive);
// 	// sideNav.style.display = sideNav.style.display === "none" ? "block" : "none";
// 	sideNav.classList.toggle("show");
// 	sideNav.classList.add("inactive");

// 	pages.classList.toggle("show");
// 	pages.classList.add("inactive");
// 	// pages.style.marginLeft = isSideNavActive ? "0px" : "250px";
// });

toggleBtn.forEach((button) => {
	button.addEventListener("click", () => {
		console.log("side is active : " + isSideNavActive);
		// sideNav.style.display = sideNav.style.display === "none" ? "block" : "none";
		sideNav.classList.toggle("show");
		sideNav.classList.add("inactive");

		pages.classList.toggle("show");
		pages.classList.add("inactive");
		// pages.style.marginLeft = isSideNavActive ? "0px" : "250px";
	});
});
