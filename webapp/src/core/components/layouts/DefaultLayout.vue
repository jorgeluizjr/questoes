<template>
  <v-container
    fluid
    no-gutter
  >
    <app-toolbar
      class="app--toolbar"
    />
    <v-content>
      <!-- content -->
      <div class="page-wrapper">
        <router-view />
      </div>
    </v-content>
    <!-- Go to top -->
    <app-fab />

    <!-- App Footer -->
    <v-footer
      app
      inset
      absolute
    >
      <span class="caption">Questões {{ new Date().getFullYear() }}</span>
      <v-spacer />
      <span class="caption mr-1"> Jorge Luiz Jr. <a href="https://github.com/jorgeluizjr/questoes">https://github.com/jorgeluizjr/questoes</a></span>
    </v-footer>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex';
import AppToolbar from '@/core/components/AppToolbar';
import AppFab from '@/core/components/AppFab';

export default {
  components: {
    AppToolbar,
    AppFab,
  },
  mounted() {
  },
  created() {
  },
  methods: {
    ...mapActions({
    }),
  },
};
</script>

<style scoped>
.page-wrapper {
  min-height: calc(100vh - 64px - 50px - 81px);
}
</style>
