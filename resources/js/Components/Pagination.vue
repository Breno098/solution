<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap mb-1">
    <inertia-link
        v-for="(link, index) in links"
        :key="index"
        :href="link.url | urlRoute"
    >
            <v-btn
                v-if="ifShow(link.label)"
                :color="link.active ?  'deep-purple lighten-5 mx-1' : 'deep-purple accent-3 mx-1'"
                :disabled="ifDisabled(link)"
                small
                elevation="0"
                :dark="ifDark(link)"
            >
                <!-- <v-icon v-if="labelOrIcon(link.label) === 'icon'">
                    {{ link.label | labelButton }}
                </v-icon> -->
                <span>
                     {{ link.label }}
                </span>
            </v-btn>
      </inertia-link>
    </div>
  </div>
</template>

<script>

    export default {
        props: {
            links: Array,
        },
        methods: {
            ifShow(value) {
                return !value.includes('Previous') && !value.includes('Next');
            },
            ifDisabled(link) {
                return link.active || link.label.includes('...');
            },
            ifDark(link) {
                return !link.active && !link.label.includes('...');
            }
        },
        filters: {
            urlRoute(value) {
                return value ? value : '#';
            },
            labelButton(value) {
                if(value.includes('Previous')) {
                    return 'mdi-arrow-left-bold';
                }

                if(value.includes('Next')) {
                    return 'mdi-arrow-right-bold';
                }

                return value;
            }
        }
    }
</script>
