<template>
  <!-- Menu Bar Media-->
  <v-navigation-drawer color="#414141" v-model="drawer" location="right" temporary>
    <div class="icon-login">
      <ul class="ma-0 pa-0">
        <li><i class="fa-solid fa-screwdriver-wrench"></i></li>
        <li><i class="fa-solid fa-key"></i></li>
        <li><i class="fa-solid fa-envelope"></i></li>
      </ul>
    </div>
    <v-divider class="border-opacity-25" color="white"></v-divider>
    <div class="media-menu">
      <ul>
        <li>
          <router-link to="/">Home</router-link>
        </li>
        <li>
          <router-link
            to="/News-and-activities"
            :class="
              $route.name == 'News-and-activities-read' ? 'router-link-exact-active' : ''
            "
            >News & activities</router-link
          >
        </li>
        <li>
          <v-list class="pa-0">
            <v-list-group>
              <template v-slot:activator="{ props }">
                <span
                  v-bind="props"
                  class="text-uppercase"
                  :class="
                    $route.name == 'Current-projects' ||
                    $route.name == 'Completed-projects' ||
                    $route.name == 'Single-current-project' ||
                    $route.name == 'Single-completed-project'
                      ? 'router-link-exact-active'
                      : ''
                  "
                >
                  Our project <v-icon class="mb-1">mdi-chevron-down</v-icon></span
                >
              </template>
              <v-list-item class="submenu py-2 px-0 mt-2">
                <router-link
                  to="/Current-projects"
                  class="f-side my-2 ms-8"
                  :class="
                    $route.name == 'Single-current-project'
                      ? 'router-link-exact-active'
                      : ''
                  "
                  ><v-icon class="mb-1">mdi-chevron-right</v-icon> Current
                  Projects</router-link
                >

              <v-divider class="border-opacity-75 my-2"></v-divider>

                <router-link
                  to="/Completed-projects"
                  class="f-side my-2 ms-8"
                  :class="
                    $route.name == 'Single-completed-project'
                      ? 'router-link-exact-active'
                      : ''
                  "
                  ><v-icon class="mb-1">mdi-chevron-right</v-icon> Completed
                  projects</router-link
                >
              </v-list-item>
            </v-list-group>
          </v-list>
        </li>

        <li>
          <router-link to="/Our-partner">Our partner</router-link>
        </li>
        <li>
          <router-link
            to="/Join-us"
            :class="$route.name == 'Details-join-us' ? 'router-link-exact-active' : ''"
            >Join us</router-link
          >
        </li>
        <li>
          <router-link to="/Contact-us">Contact us</router-link>
        </li>
      </ul>
    </div>
  </v-navigation-drawer>
  <!-- Menu Bar Media End-->

  <!-- Menu Bar Web -->
  <v-app-bar height="100" id="app-bar" class="bg-false-md-and-down">
    <router-link to="/"
      ><img :src="app_url + '/images/logo.png'" alt="Logo Link innova" class="style-logo"
    /></router-link>
    <v-spacer></v-spacer>
    <div class="i-menu hidden-lg-and-up">
      <i class="fa-solid fa-bars" @click.stop="drawer = !drawer"></i>
    </div>
    
    <div class="row pe-5 hidden-md-and-down">
      <div class="col-12 icon-login text-end pe-3 mb-2">
        <ul class="ma-0">
          <li>
            <router-link to="/Login-admin">
              <i class="fa-light fa-screwdriver-wrench"></i>
              <v-tooltip activator="parent" location="start">Wed Admin</v-tooltip>
            </router-link>
          </li>
          <li>
            <router-link to="/Login-link">
              <i class="fa-light fa-key"></i>
              <v-tooltip activator="parent" location="start">Link Login</v-tooltip>
            </router-link>
          </li>
          <li>
            <router-link to="/Check-mail">
              <i class="fa-light fa-envelope"></i>
              <v-tooltip activator="parent" location="start">Check Mail</v-tooltip>
            </router-link>
          </li>
        </ul>
      </div>
      <div class="col-md-12 menu-bar text-end text-uppercase">
        <ul>
          <li>
            <router-link to="/">Home</router-link>
          </li>
          <li>
            <router-link
              to="/News-and-activities"
              :class="
                $route.name == 'News-and-activities-read'
                  ? 'router-link-exact-active'
                  : ''
              "
              >News & activities</router-link
            >
          </li>
          <li>
            <v-menu open-on-hover>
              <template v-slot:activator="{ props: menu }">
                <span
                  v-bind="mergeProps(menu, tooltip)"
                  :class="
                    $route.name == 'Current-projects' ||
                    $route.name == 'Completed-projects' ||
                    $route.name == 'Single-current-project' ||
                    $route.name == 'Single-completed-project'
                      ? 'router-link-exact-active'
                      : ''
                  "
                  >Our project <v-icon class="mb-1">mdi-chevron-down</v-icon></span
                >
              </template>
              <v-list id="dropdown-munu" class="text-uppercase p-0">
                <v-list-item>
                  <router-link
                    to="/Current-projects"
                    :class="
                      $route.name == 'Single-current-project'
                        ? 'router-link-exact-active'
                        : ''
                    "
                    ><v-icon class="mb-1">mdi-chevron-right</v-icon> Current
                    Projects</router-link
                  >
                </v-list-item>
                <hr class="m-2" />
                <v-list-item>
                  <router-link
                    to="/Completed-projects"
                    :class="
                      $route.name == 'Single-completed-project'
                        ? 'router-link-exact-active'
                        : ''
                    "
                    ><v-icon class="mb-1">mdi-chevron-right</v-icon> Completed
                    projects</router-link
                  >
                </v-list-item>
              </v-list>
            </v-menu>
          </li>
          <li>
            <router-link to="/Our-partner">Our partner</router-link>
          </li>
          <li>
            <router-link
              to="/Join-us"
              :class="$route.name == 'Details-join-us' ? 'router-link-exact-active' : ''"
              >Join us</router-link
            >
          </li>
          <li>
            <router-link to="/Contact-us">Contact us</router-link>
          </li>
        </ul>
      </div>
    </div>
  </v-app-bar>
  <!-- Menu Bar Web End-->
</template>
<script>
import { mergeProps } from "vue";

export default {
  data: () => ({
    drawer: null,
  }),
  methods: {
    mergeProps,
  },
};
</script>
<script setup>
window.addEventListener("scroll", function () {
  var header = this.document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 50);
});
</script>
<style scoped></style>
