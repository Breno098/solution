require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import Vuetify from 'vuetify';
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)
Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

const app = document.getElementById('app');

new Vue({
    vuetify: new Vuetify({
        theme: {
            themes: {
              light: {
                primary: '#651FFF',
                error: '#F44336',
                success: '#00BCD4',
                warning: '#E65100',

                sideBar: '#00B8D4',
                sidebarActive: '#000',

                btnPrimary: '#00BCD4',
                btnSecondary: '#00838F',
                btnDanger: "#F44336",
                btnCleanFilter: '#E0E0E0'
              },
            },
        },
    }),
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
                resolveErrors: page => (page.props.errors || {}),
            },
        }),
}).$mount(app);
