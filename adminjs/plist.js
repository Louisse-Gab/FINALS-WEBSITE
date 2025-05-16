// menu.js
console.log("Menu JS loaded successfully");

// Function to toggle the side menu
function toggleMenu() {
    const sideMenu = document.getElementById('sideMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    
    sideMenu.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    
    // Prevent scrolling when menu is open
    document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
}

// Function to navigate to a page
function navigateTo(url) {
    console.log("Navigating to:", url);
    // Close the menu first
    toggleMenu();
    
    // Then navigate to the URL
    window.location.href = url;
}