function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.left = (sidebar.style.left === '0px') ? '-200px' : '0px';
  
    const content = document.querySelector('.content');
    content.style.marginLeft = (sidebar.style.left === '0px') ? '250px' : '50px';

    const menubar = document.querySelector('.menubar');
    menubar.style.left = (sidebar.style.left === '0px') ? '250px' : '50px';
};


// Side bar clike color
const sidebar_menu = document.querySelectorAll(".sidebar-menu li a");

sidebar_menu.forEach(function(menu) {
    menu.addEventListener('click', function() {
        
        sidebar_menu.forEach(function(item) {
            item.classList.remove('active');
        });     
        menu.classList.add('active');
     
        localStorage.setItem('activeNavItem', menu.id);
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