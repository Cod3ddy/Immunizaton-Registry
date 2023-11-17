window.onload = () => {
	// onload set defaults
	const defaultNavTab = document.querySelector(
		".profile-content .nav-tab ul .overview"
	);
	const defaultNavLinks = document.querySelector(".nav-links .h-dash-btn");

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

// console.log(navTab);
navTab.forEach((tab) => {
	tab.addEventListener("click", () => {
		navTab.forEach((tab) => {
			tab.classList.remove("active");
		});
		tab.classList.add("active");
	});
});

// page navigation
// buttons
const dashBtn = document.querySelector(".h-dash-btn");
const patientBtn = document.querySelector(".h-patient-btn");
const healthcareBtn = document.querySelector(".h-healthcare-btn");
const profileBtn = document.querySelector(".h-profile-btn");

// pages

const dashPage = document.querySelector(".h-dash-page");
const patientPage = document.querySelector(".h-patient-page");
const profilePage = document.querySelector(".profile-page");

// navigation
patientBtn.addEventListener("click", () => {
	if (patientPage.style.display === "none") {
		patientPage.style.display = "block";
		dashPage.style.display = "none";
		profilePage.style.display = "none";
	}
});

dashBtn.addEventListener("click", () => {
	if (dashPage.style.display === "none") {
		dashPage.style.display = "block";
		patientPage.style.display = "none";
		profilePage.style.display = "none";
	}
});

profileBtn.addEventListener("click", () => {
	if (profilePage.style.display === "none") {
		profilePage.style.display = "block";
		patientPage.style.display = "none";
		dashPage.style.display = "none";
	}
});

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
