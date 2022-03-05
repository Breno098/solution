<template>
    <app-layout>
        <Head title="Produtos/Peças"/>

        <v-card>
            <v-card-text>
                <form @submit.prevent="search">
                    <v-row>
                        <v-col cols="11">
                            <h4>
                                Produtos/Peças
                            </h4>
                            <!-- {{ queryString }} -->
                            <!-- {{ $page.props.query_string }} -->
                        </v-col>
                        <v-col cols="1">
                            <v-btn color="deep-purple-accent-3" >
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                        </v-col>

                        <v-col cols="4">
                            <v-text-field
                                label="Nome"
                                color="deep-purple-accent-3"
                                clearable
                                v-model="filters.name"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="4">
                            <v-btn color="deep-purple-accent-3" type="submit">
                                <v-icon>mdi-account</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>
                </form>

                <v-table dense>
                    <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">NOME</th>
                            <th class="text-left">VALOR</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="product in products.data"
                            :key="product.id"
                        >
                        <td>{{ product.name }}</td>
                        <td>{{ product.default_value }}</td>
                        <td class="text-right">
                            <v-btn
                                rounded="lg"
                                color="deep-purple-accent-3"
                                class="mr-2"
                                size="small"
                            >
                                <v-icon>mdi-eye</v-icon>
                            </v-btn>
                            <v-btn
                                rounded="lg"
                                color="green-accent-3"
                                class="mr-2"
                                size="small"
                            >
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                            <v-btn
                                color="red-accent-4"
                                rounded="lg"
                                size="small"
                            >
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </td>
                        </tr>
                    </tbody>
                    </template>
                </v-table>
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
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Pagination,
            AppLayout,
            Head,
            Link,
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
        },
    })
</script>
