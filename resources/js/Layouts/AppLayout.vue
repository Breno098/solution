<template>
    <!-- <Head :title="title" /> -->

    <!--
        #primary - deep-purple-accent-3
     -->

    <v-app>
        <v-toolbar app color="grey-darken-4" height="50">
            <span class="subheading mr-2">{{ appName }}</span>

            <v-toolbar-items>
                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-btn text>
                    Pedidos
                </v-btn>

                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn v-bind="props">
                            Cadastros
                            <v-icon color="deep-purple-accent-3">mdi-chevron-down</v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title class="mx-auto">Clientes</v-list-item-title>
                        </v-list-item>
                        <v-divider class="mx-2 bg-grey-darken-4"></v-divider>
                         <Link :href="route('tenant.product.index')">
                            <v-list-item>
                                <v-list-item-title class="mx-auto">Produtos</v-list-item-title>
                            </v-list-item>
                        </Link>

                         <v-divider class="mx-2 bg-grey-darken-4"></v-divider>
                        <v-list-item>
                            <v-list-item-title class="mx-auto">Serviços</v-list-item-title>
                        </v-list-item>
                         <v-divider class="mx-2 bg-grey-darken-4"></v-divider>
                        <v-list-item>
                            <v-list-item-title class="mx-auto">Funcionários</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn v-bind="props">
                            Relatórios
                            <v-icon color="deep-purple-accent-3">mdi-chevron-down</v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Financeiro</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-btn text>
                    Agenda
                </v-btn>

                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-btn text>
                    Cursos e Despesas
                </v-btn>

                <v-divider vertical class="bg-white mx-2"></v-divider>

                <v-menu rounded="lg">
                    <template v-slot:activator="{ props }">
                        <v-btn v-bind="props">
                            Arquivos
                            <v-icon color="deep-purple-accent-3">mdi-chevron-down</v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item>
                            <v-list-item-title>Recibos de funcionários</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>

                <v-divider vertical class="bg-white mx-2"></v-divider>
            </v-toolbar-items>

            <v-spacer></v-spacer>

            <v-menu rounded="lg">
                <template v-slot:activator="{ props }">
                    <v-btn v-bind="props">
                        USER
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item>
                        <v-list-item-title>Sair</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>


        </v-toolbar>

        <v-main app>
            <v-container fluid>
                 <slot></slot>
            </v-container>
        </v-main>
<!--
        <v-footer app>
        </v-footer> -->
    </v-app>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            Link,
        },
        props: {
        },
        data() {
            return {
                appName: 'Solution',
            }
        },
        methods: {
        }
    })
</script>

<style>
  /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); */

  * {
    /* font-family: 'Roboto', sans-serif; */
    background: '#FAFAFA'
  }

  a {
    text-decoration: none;
  }

  /* .v-application ::-webkit-scrollbar {
    height: 8px;
    width: 13px;
  }

  .v-application ::-webkit-scrollbar-corner {
    background: transparent;
  }

  .v-application ::-webkit-scrollbar-thumb {
    background: #00BCD4;
    border-radius: 8px;
  } */
</style>
