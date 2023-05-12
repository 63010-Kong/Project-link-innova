<template>
  <v-app class="position-relative">
    <app-bar
      v-if="
        currentPage == 'Home' ||
        currentPage == 'News-and-activities' ||
        currentPage == 'Current-projects' ||
        currentPage == 'Completed-projects' ||
        currentPage == 'Join-us' ||
        currentPage == 'Our-partner' ||
        currentPage == 'Contact-us' ||
        currentPage == 'Details-join-us' ||
        currentPage == 'News-and-activities-read' ||
        currentPage == 'Single-current-project' ||
        currentPage == 'Single-completed-project'
      "
    ></app-bar>
    <side-bar
      v-if="
        currentPage == 'Dashboard' ||
        currentPage == 'News-and-activitie-end' ||
        currentPage == 'Current-projects-end' ||
        currentPage == 'Completed-projects-end' ||
        currentPage == 'Join-us-end' ||
        currentPage == 'Our-partner-end'
      "
    ></side-bar>
    <ban-ner v-if="currentPage == 'Home'"></ban-ner>

    <v-main class="main-container clearfix" id="con-tent">
      <router-view></router-view>
    </v-main>

    <foo-ter
      v-if="
        currentPage == 'Home' ||
        currentPage == 'News-and-activities' ||
        currentPage == 'Current-projects' ||
        currentPage == 'Completed-projects' ||
        currentPage == 'Join-us' ||
        currentPage == 'Our-partner' ||
        currentPage == 'Contact-us' ||
        currentPage == 'Details-join-us' ||
        currentPage == 'News-and-activities-read' ||
        currentPage == 'Single-current-project' ||
        currentPage == 'Single-completed-project'
      "
    ></foo-ter>
  </v-app>
</template>

<script>
export default {
  name: "appMain",
  data() {
    return {
      theme: "light",
    };
  },
  mounted() {
    return this.$route.name;
  },
  watch: {
    currentPage(route) {
      console.log(route);
    },
  },
  methods: {
    setTheme(data) {
      if (data) {
        this.theme = data;
      }
    },
  },
  computed: {
    currentPage() {
      console.log(this.$route.name);
      return this.$route.name;
    },
  },
};
</script>
<style scoped>
#con-tent {
  padding: 0;
}
</style>
