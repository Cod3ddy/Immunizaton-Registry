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

editProfileTab.addEventListener("click", () => {
	if (editProfileBox.style.display === "none") {
		editProfileBox.style.display = "flex";
		overviewBox.style.display = "none";
		changePasswordBox.style.display = "none";
	}
});

changePasswordTab.addEventListener("click", () => {
	if (changePasswordBox.style.display === "none") {
		changePasswordBox.style.display = "flex";
		overviewBox.style.display = "none";
		editProfileBox.style.display = "none";
	}
});

// pages navigations[side navigation bar]

// get side navigations buttons
const profileBtn = document.querySelector(
	".side-navigation .content .nav-links .nav-profile-btn"
);
const dashboardBtn = document.querySelector(".nav-links .nav-dashboard");
const mapBtn = document.querySelector(
	".side-navigation .content .nav-links .nav-map-btn"
);
const historyBtn = document.querySelector(
	".side-navigation .content .nav-links .nav-history-btn"
);

// get pages
const profilePage = document.querySelector(".profile-page");
const historyPage = document.querySelector(".history-page");
const mapPage = document.querySelector(".map-page");
const dashboardPage = document.querySelector(".dashboard-page");

// profile page
profileBtn.addEventListener("click", () => {
	if (profilePage.style.display == "none") {
		profilePage.style.display = "block";
		mapPage.style.display = "none";
		dashboardPage.style.display = "none";
		historyPage.style.display = "none";
	}
});

// history page
historyBtn.addEventListener("click", () => {
	console.log("history button clicked!");
	if (historyPage.style.display == "none") {
		historyPage.style.display = "block";
		profilePage.style.display = "none";
		mapPage.style.display = "none";
		dashboardPage.style.display = "none";
	}
});

// map page

mapBtn.addEventListener("click", () => {
	if (mapPage.style.display == "none") {
		mapPage.style.display = "block";
		historyPage.style.display = "none";
		profilePage.style.display = "none";
		dashboardPage.style.display = "none";
	}
});

// dashboard - page
dashboardBtn.addEventListener("click", () => {
	if (dashboardPage.style.display == "none") {
		dashboardPage.style.display = "block";
		historyPage.style.display = "none";
		profilePage.style.display = "none";
		mapPage.style.display = "none";
	}
});
