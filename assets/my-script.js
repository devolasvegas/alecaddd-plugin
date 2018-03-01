window.addEventListener('load', function() {

    // Store the tabs in a variable
    var tabs = document.querySelectorAll('.nav-tabs > li');

    // Loop ever tabs to add event listener
    for(var i = 0; i < tabs.length; i++) {
        var tab = tabs[i];
        tab.addEventListener('click', switchTab);
    }

    // Tabs click handler callback
    function switchTab(e) {

        e.preventDefault();

        document.querySelector('.nav-tabs .active').classList.remove('active');
        document.querySelector('.tab-pane.active').classList.remove('active');

        var clickedTab = e.currentTarget;
        var anchor = e.target;
        var activePaneID = anchor.getAttribute('href');
        
        clickedTab.classList.add('active');
        document.querySelector(activePaneID).classList.add('active');
        
    }
})