<template>
  <v-footer class="footer">
    <v-row justify="center" no-gutters>
      <v-col lg="3" md="12" sm="12" cols="12">
        <div class="">
          <v-img
            :src="app_url + '/images/footer_logo.png'"
            class="d-block"
            alt="Logo link innova properties"
          />
        </div>
      </v-col>
      <v-col lg="5" md="12" sm="12" cols="12">
        <v-row class="txt-menu">
          <v-col class="pt-0 mb-2" md="3" sm="4" cols="12">
            <router-link to="/">Home</router-link>
          </v-col>
          <v-col class="pt-0 mb-2" md="4" sm="4" cols="12">
            <router-link to="/News-and-activities">News & activities</router-link>
          </v-col>
          <v-col class="pt-0 mb-2" md="5" sm="4" cols="12">
            <router-link
              to="/Current-projects"
              :class="
                $route.name == 'Current-projects' ||
                $route.name == 'Completed-projects' ||
                $route.name == 'Single-current-project' ||
                $route.name == 'Single-completed-project'
                  ? 'router-link-exact-active'
                  : ''
              "
              >Our project</router-link
            >
          </v-col>
          <v-col class="pt-0 mb-2" md="3" sm="4" cols="12">
            <router-link to="/Join-us">Join us</router-link>
          </v-col>
          <v-col class="pt-0 mb-2" md="4" sm="4" cols="12">
            <router-link to="/Our-partner">Our partner</router-link>
          </v-col>
          <v-col class="pt-0 mb-2" md="5" sm="4" cols="12">
            <router-link to="/Contact-us">Contact us</router-link>
          </v-col>
        </v-row>
      </v-col>
      <v-col lg="4" md="12" sm="12" cols="12" class="style-content">
        <p>
          LINK INNOVA PROPERTIES COMPANY LIMITED 50 หมู่ 2 ตำบลตลาดขวัญ อำเภอดอยสะเก็ต
          จังหวัดเชียงใหม่50220 โทรศัพท์ : 053-039191 แฟกซ์ : 053-039190
        </p>
        <div class="style-facebook">
          <p>
            <i class="fa-brands fa-facebook"> </i>
            <a
              href="https://www.facebook.com/Link.Innova.Properties.Co.LTD"
              target="_blank"
              >Link.Innova.Properties.Co.LTD</a
            >
          </p>
        </div>
      </v-col>
    </v-row>
  </v-footer>
</template>

<script>
import { mergeProps } from "vue";
export default {
  methods: {
    mergeProps,
  },
};
</script>
