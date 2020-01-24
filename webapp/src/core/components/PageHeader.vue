<template>
  <v-container
    fluid
    class="pb-0"
  >
    <v-breadcrumbs
      class="pa-0 pt-2"
      divider=">"
      :items="breadcrumbs"
    />
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      title: 'Home',
      breadcrumbs: [
      ],
    };
  },
  watch: {
    /* eslint-disable func-names */
    '$route.path': function () {
      this.computeBreadcrumbs();
    },
  },
  created() {
    this.computeBreadcrumbs();
  },
  methods: {
    computeBreadcrumbs() {
      const breadcrumbs = [
        {
          text: 'Home',
          href: '/',
          disabled: false,
        },
      ];

      let path = '';
      let appends = this.$route.matched.filter(item => item.meta.title);
      appends = appends.map((item) => {
        let nameRoute = '';
        path = item.path || '';
        if (item.name) {
          path = '';
          nameRoute = { name: item.name, params: Object.assign({}, this.$route.params) };
        }

        return {
          text: item.meta.title || '',
          href: path,
          to: nameRoute || '',
          disabled: item.path === this.$route.path,
        };
      });

      this.breadcrumbs = breadcrumbs.concat(appends);
    },
  },
};
</script>
<style lang="stylus" scoped>
  .disabled
    color: grey
    pointer-events: none
    text-decoration: blink
</style>
