const AdminTabs = {
    init(){
        window.addEventListener('load', function (){
            const tabs = document.querySelectorAll('ul.db_nav-tabs > li');
            for (let i = 0; i < tabs.length; i++){
                tabs[i].addEventListener('click', switchTab);
            }

            function switchTab(e){
                e.preventDefault();
               const activeClass = document.querySelector('ul.db_nav-tabs li.db_active');
               activeClass.classList.remove('db_active');

                const activeClassPane = document.querySelector('.db_tab-pane.db_active');
                activeClassPane.classList.remove('db_active');

                const clickCurrentTab = e.currentTarget;
                const anchorRef = e.target;
                const activePaneID = anchorRef.getAttribute('href');



                clickCurrentTab.classList.add('db_active');

                document.querySelector(activePaneID).classList.add('db_active');

            }
        })
    }
}

export default AdminTabs;