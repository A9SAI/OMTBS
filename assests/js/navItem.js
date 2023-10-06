
var navItems = document.querySelectorAll('.navbar-nav .nav-item');

navItems.forEach(function(navItem) {
    navItem.addEventListener('click', function() {
        
        navItems.forEach(function(item) {
            item.classList.remove('active');
        });     
        navItem.classList.add('active');
     
        localStorage.setItem('activeNavItem', navItem.id);
    });
});

// Check if an active link is stored in localStorage and apply active class
var activeNavItemID = localStorage.getItem('activeNavItem');
if (activeNavItemID) {
    var activeNavItem = document.getElementById(activeNavItemID);
    if (activeNavItem) {
        activeNavItem.classList.add('active');
    }
}


    

    

    


