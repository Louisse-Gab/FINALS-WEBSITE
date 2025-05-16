// Simplified toggleMenu function
function toggleMenu() {
    console.log("Toggle menu function called");
    
    // Get the menu elements
    const sideMenu = document.getElementById('sideMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    
    // Toggle the active class on the side menu
    if (sideMenu) {
        sideMenu.classList.toggle('active');
        console.log("Menu toggled:", sideMenu.classList.contains('active') ? "open" : "closed");
    } else {
        console.error("Side menu element not found!");
    }
    
    // Toggle the overlay if it exists
    if (menuOverlay) {
        menuOverlay.classList.toggle('active');
    }
    
    // Toggle body scroll
    document.body.style.overflow = (sideMenu && sideMenu.classList.contains('active')) ? 'hidden' : '';
}

// Make sure toggleMenu is globally accessible
window.toggleMenu = toggleMenu;

<button onclick="toggleMenu()" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; padding: 10px; background: red; color: white;">
    Test Toggle Menu
</button>