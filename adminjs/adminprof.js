   // Function to toggle the side menu
    function toggleMenu() {
        const sideMenu = document.getElementById('sideMenu');
        const menuOverlay = document.getElementById('menuOverlay');
        
        if (sideMenu && menuOverlay) {
            sideMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            
            // Prevent scrolling when menu is open
            document.body.style.overflow = sideMenu.classList.contains('active') ? 'hidden' : '';
        }
    }
    
    // Function to show success message
    function showSuccessMessage() {
        const successMessage = document.getElementById('successMessage');
        successMessage.classList.add('show');
        
        // Hide the message after 3 seconds
        setTimeout(() => {
            successMessage.classList.remove('show');
        }, 3000);
    }

    // Initialize menu functionality when the DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Make sure the hamburger menu icon works
        const menuIcon = document.querySelector('.menu-icon');
        if (menuIcon) {
            menuIcon.addEventListener('click', toggleMenu);
        }
        
        // Make sure the close button works
        const closeButton = document.querySelector('#sideMenu button');
        if (closeButton) {
            closeButton.addEventListener('click', toggleMenu);
        }
        
        // Make sure the overlay works
        const menuOverlay = document.getElementById('menuOverlay');
        if (menuOverlay) {
            menuOverlay.addEventListener('click', toggleMenu);
        }
        
        // Profile picture preview
        const profilePictureInput = document.getElementById('profilePicture');
        let selectedFile = null;
        
        if (profilePictureInput) {
            profilePictureInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    selectedFile = this.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // Update main profile picture
                        updateProfileImage('mainProfilePic', e.target.result);
                        
                        // Also update header profile picture
                        updateProfileImage('headerProfilePic', e.target.result);
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
        
        // Function to update profile image
        function updateProfileImage(elementId, src) {
            const container = document.getElementById(elementId);
            
            // Check if there's already an image
            let img = container.querySelector('img');
            
            if (!img) {
                // Create new image if it doesn't exist
                img = document.createElement('img');
                img.classList.add('w-full', 'h-full', 'object-cover');
                container.appendChild(img);
            }
            
            // Set the image source
            img.src = src;
        }
        
        // Handle form submission
        const profileForm = document.getElementById('profileForm');
        if (profileForm) {
            profileForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                
                // Create FormData object
                const formData = new FormData(this);
                
                // Send AJAX request
                fetch('../adminphp/update_profile.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showSuccessMessage();
                        
                        // If a profile picture was uploaded and the server returns a URL
                        if (data.profilePicture) {
                            // Update both profile pictures with the server-returned URL
                            updateProfileImage('mainProfilePic', data.profilePicture);
                            updateProfileImage('headerProfilePic', data.profilePicture);
                        }
                        
                        // Update admin name in the header if it was changed
                        if (data.adminName) {
                            const headerAdminName = document.getElementById('headerAdminName');
                            if (headerAdminName) {
                                headerAdminName.textContent = data.adminName;
                            }
                        }
                    } else {
                        // Handle error
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating your profile.');
                });
            });
        }
    });

    