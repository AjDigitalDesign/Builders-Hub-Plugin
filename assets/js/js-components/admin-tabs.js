const AdminTabs = {
    init(){
        window.addEventListener('load', function (){
            const tabs = document.querySelectorAll('ul.nav-tabs > li');
            for (let i = 0; i < tabs.length; i++){
                tabs[i].addEventListener('click', switchTab);
            }

            function switchTab(e){
                e.preventDefault();
               const activeClass = document.querySelector('ul.nav-tabs li.active');
               activeClass.classList.remove('active');

                const activeClassPane = document.querySelector('.tab-pane.active');
                activeClassPane.classList.remove('active');

                const clickCurrentTab = e.currentTarget;
                const anchorRef = e.target;
                const activePaneID = anchorRef.getAttribute('href');



                clickCurrentTab.classList.add('active');

                document.querySelector(activePaneID).classList.add('active');

            }
        })
    }
}

export default AdminTabs;