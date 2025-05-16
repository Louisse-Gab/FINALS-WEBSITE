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

// Add active class to current menu item
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded, initializing menu");
    const currentPath = window.location.pathname;
    console.log("Current path:", currentPath);
    const menuItems = document.querySelectorAll('.menu-item');
    
    // First, remove the active class from all menu items
    menuItems.forEach(item => {
        item.classList.remove('bg-[#FDCB58]');
    });
    
    // Check if we're on the home page
    if (currentPath.endsWith('/index.php') || currentPath === '/' || currentPath.endsWith('/')) {
        console.log("On home page, highlighting Home menu item");
        // Find the Home menu item and highlight it
        menuItems.forEach(item => {
            const itemUrl = item.getAttribute('data-url');
            if (itemUrl && itemUrl.includes('index.php')) {
                item.classList.add('bg-[#FDCB58]');
            }
        });
    } else {
        // For other pages, highlight the corresponding menu item
        let activeItemFound = false;
        
        menuItems.forEach(item => {
            const itemUrl = item.getAttribute('data-url');
            if (itemUrl && currentPath.includes(itemUrl) && itemUrl !== '../index.php') {
                item.classList.add('bg-[#FDCB58]');
                activeItemFound = true;
                console.log("Active menu item found:", itemUrl);
            }
        });
        
        // If no active item was found, default to highlighting the Dashboard
        if (!activeItemFound) {
            console.log("No active item found, defaulting to Dashboard");
            menuItems.forEach(item => {
                const itemUrl = item.getAttribute('data-url');
                if (itemUrl && itemUrl.includes('dash.php')) {
                    item.classList.add('bg-[#FDCB58]');
                }
            });
        }
    }
    
    // Add click event listeners to all menu items
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
});