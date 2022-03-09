<template>
    <app-layout>
         <!-- <Head title="Produtos"/> -->

        <p class="font-weight-regular mb-5 text-h5">
            Produtos
        </p>

        <v-row class="mb-2">
            <v-col cols="6" md="10">
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn v-bind="props" small text>
                            Filtros
                            <v-icon color="deep-purple accent-3">mdi-chevron-down</v-icon>
                        </v-btn>
                    </template>

                    <form @submit.prevent="search">
                        <v-card width="800">
                            <v-card-text>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            label="Nome"
                                            color="deep-purple accent-3"
                                            clearable
                                            v-model="filters.name"
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-card-text>

                            <!-- <v-card-actions>
                                <v-spacer></v-spacer>

                                <Link :href="route('tenant.product.index')" class="mr-2">
                                    <v-btn
                                        color="deep-purple accent-3"
                                        small
                                        rounded
                                    >
                                        Limpar
                                    </v-btn>
                                 </Link>

                                <v-btn
                                    color="deep-purple accent-3"
                                    type="submit"
                                    small
                                    rounded
                                >
                                    Buscar
                                </v-btn>
                            </v-card-actions> -->
                        </v-card>
                    </form>
                </v-menu>
            </v-col>

            <v-col cols="6" md="2">
                <inertia-link :href="route('tenant.product.create')">
                    <v-btn
                        rounded
                        color="deep-purple accent-3"
                        block
                        small
                    >
                        Criar produto <v-icon>mdi-plus</v-icon>
                    </v-btn>
                </inertia-link>
            </v-col>
        </v-row>

        <v-card >
            <v-card-text class="px-5 py-5">
                <v-simple-table dense>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">NOME</th>
                                <th class="text-left">VALOR (Base)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="product in products.data"
                                :key="product.id"
                            >
                            <td>{{ product.name }}</td>
                            <td>{{ formatMoney(product.default_value) }}</td>
                            <td class="text-right">
                                <v-btn
                                    color="deep-purple lighten-5"
                                    class="mr-2 rounded-lg"
                                    small
                                    elevation="0"
                                >
                                    <v-icon color="deep-purple lighten-2">mdi-eye</v-icon>
                                </v-btn>
                                <v-btn
                                    color="green lighten-5"
                                    class="mr-2 rounded-lg"
                                    small
                                    elevation="0"
                                >
                                    <v-icon color="green lighten-2">mdi-pencil</v-icon>
                                </v-btn>
                                <v-btn
                                    color="red lighten-5"
                                    small
                                    elevation="0"
                                    class="rounded-lg"
                                >
                                    <v-icon color="red lighten-2">mdi-delete</v-icon>
                                </v-btn>
                            </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>

            <v-card-actions>
                <v-spacer></v-spacer>
                <pagination class="mt-6" :links="products.links" />
            </v-card-actions>
        </v-card>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Pagination from '@/Components/Pagination'

    export default {
        components: {
            AppLayout,
            Pagination
        },
        props: {
            products: Object,
            filters: Object,
        },
        data() {
            return {
            }
        },
        methods: {
            search() {
                this.$inertia.get(route('tenant.product.index'), this.filters)
            },
            formatMoney(value) {
                return !value ? null : (parseFloat(value)).toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL',
                });
            }
        },
    };
</script>
