// Function to toggle the side menu
function toggleMenu() {
    console.log("Toggle menu function called");
    const sideMenu = document.getElementById('sideMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    
    if (sideMenu && menuOverlay) {
        sideMenu.classList.toggle('active');
        menuOverlay.classList.toggle('active');
        
        // Prevent scrolling when menu is open
        document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
        console.log("Menu toggled:", sideMenu.classList.contains('active'));
    } else {
        console.error("Menu elements not found");
    }
}

// Function to navigate to a page
function navigateTo(url) {
    console.log("Navigating to:", url);
    // Close the menu first
    toggleMenu();
    
    // Then navigate to the URL
    window.location.href = url;
}

// Initialize menu functionality when the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded, initializing menu");
    
    // Make sure the hamburger menu icon works
    const menuIcon = document.querySelector('.menu-icon');
    if (menuIcon) {
        console.log("Menu icon found, adding click listener");
        menuIcon.addEventListener('click', toggleMenu);
    } else {
        console.error("Menu icon not found");
    }
    
    // Make sure the close button works
    const closeButton = document.querySelector('#sideMenu button');
    if (closeButton) {
        console.log("Close button found, adding click listener");
        closeButton.addEventListener('click', toggleMenu);
    } else {
        console.error("Close button not found");
    }
    
    // Make sure the overlay works
    const menuOverlay = document.getElementById('menuOverlay');
    if (menuOverlay) {
        console.log("Menu overlay found, adding click listener");
        menuOverlay.addEventListener('click', toggleMenu);
    } else {
        console.error("Menu overlay not found");
    }
    
    // Add click event listeners to all menu items
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            console.log("Menu item clicked:", this.getAttribute('data-url'));
            // Remove active class from all menu items
            menuItems.forEach(i => {
                i.classList.remove('bg-[#FDCB58]');
            });
            
            // Add active class to clicked menu item
            this.classList.add('bg-[#FDCB58]');
        });
    });
});