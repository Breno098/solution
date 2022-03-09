<template>
  <v-app id="inspire" style="background: #FAFAFA">
    <v-app-bar app color="grey darken-4">
        <v-container class="fill-height" fluid>
            <!-- <v-avatar
                class="mr-5"
                color="grey darken-1"
                size="32"
            ></v-avatar> -->

            <v-btn text color="white" small>
                Pedidos
            </v-btn>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-menu :offset-y="true">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        v-on="on"
                        small
                    >
                        Cadastros <v-icon color="deep-purple accent-3">mdi-chevron-down</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <inertia-link :href="route('tenant.product.index')">
                        <v-list-item>
                            <v-list-item-title class="mx-auto">Produtos</v-list-item-title>
                        </v-list-item>
                    </inertia-link>
                    <v-divider class="mx-2 grey-darken"></v-divider>
                    <v-list-item>
                        <v-list-item-title class="mx-auto">Serviços</v-list-item-title>
                    </v-list-item>
                    <v-divider class="mx-2 grey-darken"></v-divider>
                    <v-list-item>
                        <v-list-item-title class="mx-auto">Funcionários</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-menu :offset-y="true">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        v-on="on"
                        small
                    >
                        Relatórios <v-icon color="deep-purple accent-3">mdi-chevron-down</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item-title class="mx-auto">Financeiro</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-btn text color="white" small>
                Agenda
            </v-btn>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-btn text color="white" small>
                Custos e Despesas
            </v-btn>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-menu :offset-y="true">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        v-on="on"
                        small
                    >
                        Arquivos <v-icon color="deep-purple accent-3">mdi-chevron-down</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item-title class="mx-auto">Recibos de funcionários</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>

            <v-divider vertical class="mx-2 white"></v-divider>

            <v-spacer></v-spacer>

            <v-menu :offset-y="true">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="white"
                        text
                        v-bind="attrs"
                        v-on="on"
                        small
                    >
                        Username <v-icon color="deep-purple accent-3">mdi-chevron-down</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item-title class="mx-auto">Sair</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
      </v-container>
    </v-app-bar>


    <!-- <v-navigation-drawer v-model="drawer" fixed floating temporary>
        <v-list shaped>
            <div v-for="menuItem in menu"  :key="menuItem.title">
                <v-subheader>{{menuItem.title}}</v-subheader>

                <inertia-link
                    v-for="item in menuItem.items"
                    :key="item.title"
                    :href="route(item.route)"
                    style="text-decoration: none"
                >
                    <v-list-item class="d-flex justify-start ">
                        <v-list-item-icon>
                            <v-icon color="indigo darken-1">{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title v-text="item.title"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </inertia-link>

                <v-divider color="indigo darken-1" class="mx-5 mb-5"></v-divider>
            </div>
        </v-list>
    </v-navigation-drawer> -->

    <v-main>
        <v-container :fluid="false">
            <slot></slot>
        </v-container>
    </v-main>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
        drawer: false,
        drawerBids: false,
        menu: [
            {
                title: 'Home',
                icon: 'mdi-home',
                route: 'home.index'
            }, {
                title: 'Itens',
                icon: 'mdi-format-list-bulleted',
                route: 'item.index'
            }, {
                title: 'Categorias',
                icon: 'mdi-format-list-bulleted',
                route: 'category.index'
            }
        ],
        itemsSearch: [{
            label: 'Itens para leilão',
            route: 'informations.items'
        }, {
            label: 'Meus lances',
            route: 'informations.bids-to-user'
        }
        // {
        //     label: 'ITEM 2',
        //     route: 'informations.item',
        //     params: {
        //         id: 2
        //     }
        // }
        ]
    }),
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    },
    mounted() {
        // this.$vuetify.theme.dark = true;
    }
  }
</script>


<style>
@import 'vuetify/dist/vuetify.min.css';
/* @import url('https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=RocknRoll+One&display=swap'); */

* {
    /* font-family: 'RocknRoll One', sans-serif; */
    /* font-size: 10px; */
}

a {
    text-decoration: none;
}

.v-application ::-webkit-scrollbar {
    height: 8px;
    width: 13px;
}

.v-application ::-webkit-scrollbar-corner {
    background: transparent;
}

.v-application ::-webkit-scrollbar-thumb {
    background: #d5dbff;
    border-radius: 8px;
}
</style>
