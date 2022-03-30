

window.Popper = require('@popperjs/core')
import 'bootstrap'
import {createApp} from "vue";


import serviceRequest from "./app/serviceRequest";
import buildersGuilderApp from "./app/buildersGuilderApp";
import AdminTabs from "./js-components/admin-tabs";

AdminTabs.init();



const serviceRequestArea = createApp(serviceRequest);
serviceRequestArea.mount('#website-service-request');

const builderGuideArea = createApp(buildersGuilderApp);
serviceRequestArea.mount('#builders-guide-instructions');

