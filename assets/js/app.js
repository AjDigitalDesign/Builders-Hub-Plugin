window.Popper = require('@popperjs/core')
import 'bootstrap'
import {createApp} from "vue";

import dashboard from "./app/dashboard";
import AdminTabs from "./js-components/admin-tabs";

AdminTabs.init();



// const homePage = createApp(dashboard);
// homePage.mount('#xml-feed');